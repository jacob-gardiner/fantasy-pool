<?php

namespace App\Http\Controllers\auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class AccountController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }


    public function show()
    {
        $user = auth()->user();
        return view('auth.account', compact('user'));
    }

    public function update(Request $request)
    {
        $user = auth()->user();
        $file = $request->file('photo');

        Storage::disk('local')->put('public', $file);
        $user->update([
            'name'  => $request->get('name'),
            'photo' => $file->hashName()
        ]);

        return back()->with('message', 'Account Updated');
    }


    public function getUserImage($filename)
    {
        $filename = auth()->user()->photo;

        $file = Storage::url($filename);
        return new Response(auth()->user()->photo);
    }
}
