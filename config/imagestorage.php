<?php


return [
    //Путь для сохранения оригинальных изображений при Upload
    'originalImagesPath' => 'images/original/',
    
    //Путь для сохранения фотографий с водным знаком при Upload
    'editionImagesPath' => 'images/edition/',
    
    //Путь для рендеринга оригинальных изображения 
    'originalRenderPath' => 'images/original/',
        
    //Фотографии с водным знаком
    'originalRenderPath' => 'images/edition/',
    
    //Варианты сохранения изображений с указанием длины большей стороны (высоты или ширины) в пикселях
    'variantsImages' => [
        'big/' => 1500,
        'medium/' => 700,
        'small/' => 400,
        'extra_small/' => 150,
    ],
    
    //путь для хранения пользовательских изображений
    'userFilesPath' => 'userfiles/',
    
    'defaultPath' => 'files/',
    'imageUploadSection' => 'images',
    'docsUploadSection' => 'docs',
    'imageDefaultPath' => 'img-post.jpg',
    'storagePermissions' => 0755,
    'imageCacheTime' => 86400,
    'userImagesPath' => 'userfiles/images/',
    
    //Изображение, используемое для водного знака
    'watermark' => public_path('images/watermarks/colorist.png'),
    
    //Дефолтное изображение юзера
    'defaultUserImage' => 'images/default_user.png',

];
