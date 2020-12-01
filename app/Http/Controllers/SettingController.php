<?php

namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;

class SettingController extends Controller
{
    public function index()
    {
        $setting = Setting::firstOrNew();

        return view('settings.index', compact('setting'));
    }

    public function store(Request $request)
    {
        $attributes = $this->validate($request, [
            'story' => 'required',
            'vision' => 'required',
            'mission' => 'required',
            'facebook_url' => 'nullable',
            'twitter_url' => 'nullable',
            'instagram_url' => 'nullable',
        ]);

        $settings = Setting::firstOrNew();
        $settings->fill($attributes);
        $settings->save();

        $request->session()->flash('success', 'Pengaturan berhasil disimpan.');
        return redirect()->back();
    }
}
