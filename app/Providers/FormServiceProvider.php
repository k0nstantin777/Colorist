<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Collective\Html\FormFacade as Form;

class FormServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        Form::component('adminText', 'admin.components.form.text', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('adminPassword', 'admin.components.form.password', ['name', 'label' => null,  'attributes' => []]);
        Form::component('adminEmail', 'admin.components.form.email', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('adminStatic', 'admin.components.form.static', ['name', 'label' => null, 'value' => null]);
        Form::component('adminSelect', 'admin.components.form.select', ['name', 'label' => null, 'options' => [], 'selected' => null, 'attributes' => []]);
        Form::component('adminImage', 'admin.components.form.image', ['name', 'label' => null, 'image_src' => null, 'attributes' => []]);
        Form::component('adminTextarea', 'admin.components.form.textarea', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('adminTextareaCK', 'admin.components.form.textareack', ['name', 'label' => null, 'value' => null, 'attributes' => []]);
        Form::component('adminSubmit', 'admin.components.form.submit', ['name', 'attributes' => [], 'offset' => null]);
        Form::component('adminSelectBs', 'admin.components.form.selectbs', ['name', 'label' => null, 'options' => [], 'selected' => null, 'dataContent' => []]);

    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
