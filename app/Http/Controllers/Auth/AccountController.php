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
    /**
     * AccountController constructor.
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function show()
    {
        return view('auth.account', [
            'user' => auth()->user()
        ]);
    }

    public function update(Request $request)
    {
        $file = $request->file('photo');

        Storage::disk('local')->put('public', $file);
        auth()->user()->update([
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
