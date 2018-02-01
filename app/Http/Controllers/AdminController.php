<?php

namespace App\Http\Controllers;

use Cache;
use Illuminate\Http\Request;
use Session;

class AdminController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //$this->token = bin2hex(random_bytes(10));
    }



    public function check(Request $request)
    {
        if (!Cache::has('token'))
            return false;

        return Session::get('token') === Cache::get('token');
    }

    public function index(Request $request)
    {
        return view('admin.index');
    }

    public function login(Request $request)
    {
        // Cancel if given token is not current one.
        if ($request->input('token') === Cache::get('token'))
        {
            $hash = env('PASSWORD', '');
            $password = sha1($request->input('password'));

            if ($hash !== $password)
                return $this->showLogin($request);

            Session::set('token', $request->input('token'));

            return redirect('/admin/index');
        }

        $this->showLogin($request);
    }

    public function logout(Request $resquest)
    {
        Session::clear();
        return redirect('/');
    }

    public function showLogin(Request $request)
    {
        if ($this->check($request))
            return redirect('admin');

        $token = bin2hex(random_bytes(10));

        $a = rand(1, 20);
        $b = rand(1, 20);

        $sum = $a + $b;

        Cache::set('token', $token, 10);
        Cache::set('sum', $sum, 10);

        return view('admin.login', [
            'token' => $token,
            'a' => $a,
            'b' => $b
        ]);
    }
}
