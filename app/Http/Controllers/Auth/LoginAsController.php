<?php

namespace App\Http\Controllers\Auth;

use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class LoginAsController extends Controller
{
    /**
     * LoginAsController constructor.
     */
    public function __construct()
    {
        $this->middleware(['auth', 'role:super-user']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('auth.login-as.index', [
            'users' => User::all()
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        Auth::loginUsingId($id);
        return redirect('/fantasy-pool');
    }
}
