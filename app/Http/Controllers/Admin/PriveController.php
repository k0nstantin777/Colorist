<?php

namespace App\Http\Controllers\Admin;

use App\Models\Prive;
use App\Models\Role;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class PriveController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $this->authorize('update', Prive::class);

        $roles = Role::all();
        if (Auth::user()->role->id !== 4){
            $roles->pop();
        }
        
        $prives = Prive::all();
        if (Auth::user()->role->id !== 4){
            //скрываем суперадмина для всех
            $prives = $prives->reject(function($item){
                return ($item->id === 1);
            });
        }
        
        return view('admin.layouts.primary', [
            'page' => 'admin.pages.prive.index',
            'title' => 'Управление правами',
            'roles' => $roles,
            'prives' => $prives,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        throw new NotFoundHttpException();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Prive  $prive
     * @return \Illuminate\Http\Response
     */
    public function show(Prive $prive)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Prive  $prive
     * @return \Illuminate\Http\Response
     */
    public function edit(Prive $prive)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Prive  $prive
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prive $prive)
    {
        throw new NotFoundHttpException();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Prive  $prive
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prive $prive)
    {
        throw new NotFoundHttpException();
    }
    
    public function rolesUpdate(Request $request)
    {
        $this->authorize('update', Prive::class);

        $prives=[];
        $rules = $request->input('rules');
        $roles = Role::all()->pluck('id')->toArray();
             
        for ($i=0; $i<count($rules); $i++){
            $array = explode('.', $rules[$i]);
            $prives[$array[0]][] = $array[1];
        }
        
        foreach ($prives as $role => $prives){
            Role::find($role)->prives()->sync($prives);
            $key = array_search($role, $roles);
            unset($roles[$key]);
        }
                        
        if (!empty($roles)){
            foreach($roles as $role){
                Role::find($role)->prives()->sync([]);
            }
        }
                        
        return redirect()->back()->with('success', 'Изменения сохранены');
    }
}
