<?php

namespace App\Http\Controllers\Admin;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserFormRequest;
use App\Http\Controllers\Controller;
use App\Models\Role;
use Illuminate\Support\Facades\Auth;
use App\Models\Image;
use App\Models\Profile;
use Illuminate\Support\Facades\File;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $users = User::all();
        if (Auth::user()->role->id !== 4){
            //скрываем суперадмина для всех           
            $users = $users->reject(function($item){
                return ($item->id === 2);
            });
        }
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.user.index',
            'title' => 'Пользователи',
            'users_active' => $users->where('is_active',1),
            'users_disable' => $users->where('is_active',0)
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $this->authorize('create', User::class);

        $roles = Role::all();
        //скрываем роль суперадмина для всех
        if (Auth::user()->role->id !== 4){
            $roles->pop();
        }
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.user.create',
            'title' => 'Создание пользователя',
            'roles' => $roles,
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(UserFormRequest $request)
    {
        $this->authorize('create', User::class);

        $user = User::create([
            'name' => strtolower($request->input('login')),
            'role_id' => $request->input('role'),
            'email' => $request->input('email'),
            'password' => bcrypt($request->input('password')),
        ]);
                        
        Profile::create([
            'user_id' => $user->id,
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name', null),
            'age' => $request->input('age', null),
            'birthdate' => $request->input('birthdate') ? date('Y-d-m', strtotime($request->input('birthdate'))) : null,
            'sex' => $request->input('sex', null),
            'phone' => $request->input('phone', null),
        ]);
        
        if ($request->file('file')){
            $this->saveImageProfile($request, $user);
        }
        
        return redirect()->route('admin.user.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        //закрываем доступ к профилю суперадмина
        if ($user->id === 2 && Auth::user()->id !== 2){
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }
        
        if ($user->profile->image_id !== null){
            $imageProfile = config('imagestorage.userFilesPath', 'userfiles/').Image::find($user->profile->image_id)->path;
        } else {
            $imageProfile = config('imagestorage.defaultUserImage');
        }
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.user.show',
            'title' => 'Профиль '.$user->name,
            'user' => $user,
            'imageProfile' => $imageProfile,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        $this->authorize('update', User::class);


        //закрываем доступ к профилю суперадмина
        if ($user->id === 2 && Auth::user()->id !== 2){
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }
        
        $roles = Role::all();
        if (Auth::user()->role->id !== 4){
            $roles->pop();
        }
        
        if ($user->profile->image_id !== null){
            $imageProfile = config('imagestorage.userFilesPath', 'userfiles/').Image::find($user->profile->image_id)->path;
        } else {
            $imageProfile = config('imagestorage.defaultUserImage');
        }
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.user.edit',
            'title' => 'Редактирования профиля '.$user->name,
            'roles' => $roles,
            'user' => $user,
            'imageProfile' => $imageProfile,
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(UserFormRequest $request, User $user)
    {
        $this->authorize('update', User::class);

        $user->update([
            'name' => $request->input('login'),
            'role_id' => $request->input('role'),
            'email' => $request->input('email'),
        ]);
        
        if ($request->input('password') !== null){
            $user->update([
                'password' => bcrypt($request->input('password')),
            ]);
        }
        
        $user->profile->update([
            'first_name' => $request->input('first_name'),
            'last_name' => $request->input('last_name'),
            'age' => $request->input('age'),
            'birthdate' => $request->input('birthdate') ? date('Y-d-m', strtotime($request->input('birthdate'))) : null,
            'sex' => $request->input('sex'),
            'phone' => $request->input('phone'),
        ]);
        
        if ($request->file('file')){
            $this->saveImageProfile($request, $user);
        }
        
        return redirect()->route('admin.user.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
        $this->authorize('delete', User::class);

        //закрываем доступ к профилю суперадмина
        if ($user->id === 2 && Auth::user()->id !== 2){
            throw new \Symfony\Component\HttpKernel\Exception\NotFoundHttpException;
        }
        
        Profile::find($user->id)->delete();
        
        $user->delete();
        
        return redirect()->back();
    }
    
    public function activate(User $user)
    {
        $this->authorize('update', User::class);

        $user->is_active = !$user->is_active;
        $user->save();
        
        return redirect()->back();
    }
    
    private function saveImageProfile($request, $user)
    {
        $image_id = $user->profile->image_id;
        if ($image_id !== null){
            $image = Image::find($image_id);
            if (File::exists(config('imagestorage.userFilesPath').$image->path)){
                File::delete(config('imagestorage.userFilesPath').$image->path);
            } 
            $image->delete();
        }

        $crop = [];
        if ($request->input('w') !== null){
            $crop = [
                'w' => $request->input('w'),
                'h' => $request->input('h'),
                'x' => $request->input('x'),
                'y' => $request->input('y'),
            ];
        }
        
        $uploader = resolve('App\Includes\Classes\Uploader');
        try {
            $img = $uploader->upload($request, 'file', 'userfile', $crop);
        } catch (\ErrorException $e){
            return redirect()->back()->with('errorUpload', $e->getMessage());
        }    
            
        $user->profile->update([
            'image_id' => $img->id,
        ]);
    }
}
