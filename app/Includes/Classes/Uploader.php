<?php 
namespace App\Includes\Classes;

use App\Models\Image;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Intervention\Image\Facades\Image as ImageInt;

class Uploader
{
    protected $file,
        $request,
        $props,
        $uploadPath,
        $validationErrors = [],
        $uploadModel,
        $originalPath,
        $editionPath,
        $variantsImages,
        $storagePaths = [],
        $watermark;    
    
    const USERFILE = 'userfile';
    const IMAGE = 'image';
    const FILE = 'file';
    
    public function __construct(Image $uploadModel)
    {
        $this->uploadModel = $uploadModel;
    }
    
    public function upload(Request $request, $name = 'file', $type = self::IMAGE, $crop = [])
    {
        $rules = $this->setRules();
        $this->storagePaths = $this->getPaths($type);
        
        if ($this->validate($request, $name, $rules) && !empty($this->storagePaths)) {
            $img = ImageInt::make($this->file)->backup();
            if (!empty($crop)){
                $img->resize(400,400)->crop($crop['w'], $crop['h'], $crop['x'], $crop['y'])->backup();
            }
            
            $uploadedPath = $this->store($img);
            
            if ($uploadedPath !== false) {
                $image = $this->register($this->uploadModel);
                $this->getProps();
                return $image;
            }
            
            throw new \ErrorException('Некорретный путь загрузки файла');
            
        }
        else {
            $errors = implode(', ', $this->getErrors());
            throw new \ErrorException($errors);
            
        }

        //return $uploader->getErrors();
    }
    
    private function validate(Request $request, $file, array $rules = [])
    {
        $this->clearState();
        $validationFailed = false;
        $this->request = $request;
        if ($request->hasFile($file) && $request->file($file)->isValid()) {
            $this->file = $request->file($file);
           
            $this->fillProps();
            if (is_array($rules) && count($rules) > 0) {
                if(isset($rules['minSize'])) {
                    if ($this->props['size'] < $rules['minSize']) {
                        $validationFailed = true;
                        $this->validationErrors['minSize'] = 'Минимальный размер загружаемого файла - ' . $rules['minSize'];
                    }
                }
                if(isset($rules['maxSize'])) {
                    if ($this->props['size'] > $rules['maxSize']) {
                        $validationFailed = true;
                        $this->validationErrors['maxSize'] = 'Максимальный размер загружаемого файла - ' . $rules['maxSize'];
                    }
                }
                if(isset($rules['allowedExt']) && is_array($rules['allowedExt']) && count($rules['allowedExt']) > 0) {
                    if (!in_array($this->props['ext'], $rules['allowedExt'])) {
                        $validationFailed = true;
                        $this->validationErrors['allowedExt'] = 'Разрешены только следующие расширения: ' . implode(', ', $rules['allowedExt']);
                    }
                }
                if(isset($rules['allowedMime']) && is_array($rules['allowedMime']) && count($rules['allowedMime']) > 0) {
                    if (!in_array($this->props['mime'], $rules['allowedMime'])) {
                        $validationFailed = true;
                        $this->validationErrors['allowedMime'] = 'Разрешены только следующие MIME типы: ' . implode(', ', $rules['allowedMime']);
                    }
                }
            }
        } else {
            $validationFailed = true;
            $this->validationErrors['invalidUpload'] = 'Загрузка файла не удалась или файл поврежден';
        }
        return !$validationFailed;
    }
    
    protected function store($img)
    {
        $newName = rand(0,1000).(Image::max('id')+1).'.'.$this->props['ext'];
        
        $this->uploadPath = $newName;
                
        if (empty($this->variantsImages)){
            $img->save($this->originalPath.$newName);
        } else {
            foreach($this->variantsImages as $path => $size){
                $this->watermark = $this->getWatermarkImage()->backup();
                $img = $this->resize($img, $size);
                $img->save($this->originalPath.$path.$newName);
                $img->insert($this->watermark, 'center')->save($this->editionPath.$path.$newName);
                $img->reset();
                $this->watermark->reset();
            }
        }
                  
        return File::exists($this->storagePaths[0].$newName) ? $this->uploadPath : false;
    }
     
    public function getPaths($type)
    {
        if ($type === self::USERFILE){
            $paths[] = config('imagestorage.userFilesPath', 'userfiles/');
            $this->originalPath = config('imagestorage.userFilesPath', 'userfiles/');
        } else if ($type === self::IMAGE){
            $this->variantsImages = config('imagestorage.variantsImages');
            $this->originalPath = config('imagestorage.originalImagesPath', 'images/original/');
            $this->editionPath = config('imagestorage.editionImagesPath', 'images/editional/');
            foreach ($this->variantsImages as $variant => $size){
                $paths[] = $this->originalPath.$variant;
                $paths[] = $this->editionPath.$variant;
            }
        }  else if ($type === self::FILE){
            $paths[] = config('imagestorage.defaultPath', 'files/') ;
            $this->originalPath = config('imagestorage.defaultPath', 'files/');
        }  else {
            throw new \ErrorException('Не корректный тип файла ' . $type);
        }
        
        $i=0;
        while($i < count($paths)){
            if (!File::exists($paths[$i])) {
                if (!File::makeDirectory($paths[$i], config('imagestorage.storagePermissions', 0755), true)) {
                    throw new \ErrorException('Не могу создать директорию ' . $paths[$i]);
                }
            }
            if (!File::isDirectory($paths[$i]) && !File::isWritable($paths[$i])) {
                throw new \ErrorException('Директория ' . $paths[$i] . ' недоступна для записи');
            }
            $i++;
        }
        
        return $paths;
    } 
    
    protected function register()
    {
        return $this->uploadModel->create([
            'path' => $this->uploadPath,
            'oldname' => $this->props['oldname'],
            'size' => $this->props['size'],
            'ext' => $this->props['ext'],
            'mime' => $this->props['mime'],
            'alt' => $this->uploadPath,
        ]);
    }
    
    protected function getErrors()
    {
        return $this->validationErrors;
    }
    
    protected function getProps()
    {
        return $this->props ?? '';
    }
    
    protected function resize($img, $size)
    {
        $height = $img->height();
        $width = $img->width();
        if($width >= $height){
            $img->resize($size, null, function ($constraint) {
                $constraint->aspectRatio();
            });

            $this->watermark->resize($img->width()/4, null, function ($constraint) {
                $constraint->aspectRatio();
            }); 

        } else {
            $img->resize(null, $size, function ($constraint) {
                $constraint->aspectRatio();
            });

            $this->watermark->resize($img->height()/4, null, function ($constraint) {
                $constraint->aspectRatio();
            });
        }
        
        return $img;
    }
    
    protected function getWatermarkImage()
    {
        $watermark = config('imagestorage.watermark');

        if (!File::exists($watermark)){
            throw new \ErrorException('Некорректно указан файл водного знака в настройках: '.$watermark);
        }

        return ImageInt::make($watermark)->opacity(30);

    }
    
    protected function clearState()
    {
        unset($this->file, $this->request, $this->props);
        $this->validationErrors = [];
    }
    
    protected function fillProps()
    {
        $this->props['size'] = $this->file->getSize();
        $this->props['oldname'] = $this->file->getClientOriginalName();
        $this->props['ext'] = mb_strtolower($this->file->getClientOriginalExtension());
        $this->props['mime'] = $this->file->getMimeType();
    }
    
    /**
     * Установка правил валидации
     * @return array
     */
    protected function setRules()
    {
        return [
            'maxSize' => 20 * 1024 * 1024,
            'minSize' => 10 * 1024,
            'allowedExt' => [
                'jpeg',
                'jpg',
                'png',
                'gif',
                'bmp',
                'tiff',
                'pdf'
            ],
            'allowedMime' => [
                'image/jpeg',
                'image/png',
                'image/gif',
                'image/bmp',
                'image/tiff',
                'application/pdf'
            ],
        ];
    }
        
}
