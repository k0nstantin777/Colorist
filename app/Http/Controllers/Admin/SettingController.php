<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Krucas\Settings\Facades\Settings;
use App\Models\Setting;

class SettingController extends Controller
{
    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit()
    {
        $this->authorize('update', Setting::class);

        return view('admin.layouts.primary', [
            'page' => 'admin.pages.setting.edit',
            'title' => 'Настройки',
            'MAIL_FROM_NAME' => settings('MAIL_FROM_NAME'),
            'MAIL_TO' => settings('MAIL_TO'),
            'MAIL_HOST' => settings('MAIL_HOST'),
            'MAIL_PORT' => settings('MAIL_PORT'),
            'MAIL_ENCRYPTION' => settings('MAIL_ENCRYPTION'),
            'MAIL_USERNAME' => settings('MAIL_USERNAME'),
            'MAIL_PASSWORD' => settings('MAIL_PASSWORD'),
            'TIMEZONE' => settings('TIMEZONE'),
            'USE_WATERMARK' => settings('USE_WATERMARK'),

        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {
        $this->authorize('update', Setting::class);

        $this->validate($request, [

            'MAIL_FROM_NAME' => 'required|min:3|max:255',
            'MAIL_HOST' => 'required|min:3|max:255',
            'MAIL_PORT' => 'required|integer',
            'MAIL_ENCRYPTION' => 'required|min:3|max:255',
            'MAIL_USERNAME' => 'required|min:3|max:255',
            'MAIL_PASSWORD' => 'nullable|min:3|max:255',
            'TIMEZONE' => 'required|timezone'
        ]);

        $this->saveSetting('MAIL_FROM_ADDRESS', $request->input('MAIL_TO'));
        $this->saveSetting('MAIL_FROM_NAME', $request->input('MAIL_FROM_NAME'));
        $this->saveSetting('MAIL_HOST', $request->input('MAIL_HOST'));
        $this->saveSetting('MAIL_TO', $request->input('MAIL_TO'));
        $this->saveSetting('MAIL_PORT', $request->input('MAIL_PORT'));
        $this->saveSetting('MAIL_ENCRYPTION', $request->input('MAIL_ENCRYPTION'));
        $this->saveSetting('MAIL_USERNAME', $request->input('MAIL_USERNAME'));
        $password = $request->input('MAIL_PASSWORD', null);
        if($password) {
            $this->saveSetting('MAIL_PASSWORD', $password);
        }
        $this->saveSetting('USE_WATERMARK', $request->input('USE_WATERMARK'));

        return redirect()->route('admin.setting.edit')->with('success', 'Изменения сохранены!');
    }

    private function saveSetting($key, $value){
        if ($value !== settings($key)){
            Settings::forget($key);
            Settings::set($key, $value);
        }
    }
}
