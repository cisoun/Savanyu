<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Cache;
use Session;
use App\Artwork;

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
        if (!Cache::has('token') || !Cache::has('sum'))
            return false;

        return  Session::get('token') === Cache::get('token') &&
                Session::get('sum') === Cache::get('sum');
    }

    public function edit(Request $request, $id)
    {
        $artwork = Artwork::find($id);
        $uploads = $artwork->images;
        for ($i = 0; $i < count($uploads); $i++)
        {
            $uploads[$i]['name'] = upload($uploads[$i]['name']);
        }
        $artwork['uploads'] = $uploads;
        return view('admin.artwork', compact('artwork'));
    }

    public function new(Request $request)
    {
        return view('admin.artwork', ['artwork' => new Artwork]);
    }

    public function index(Request $request)
    {
        return view('admin.index', ['artworks' => Artwork::all()]);
    }

    public function login(Request $request)
    {
        // Cancel if given token is not current one.
        if ($request->input('token') === Cache::get('token') &&
            $request->input('sum') == Cache::get('sum'))
        {
            // Check password.
            $hash       = env('PASSWORD', '');
            $password   = hash('sha256', $request->input('password'));

            // Return to login if wrong.
            if ($hash !== $password)
                return $this->showLogin($request);

            // Keep token client side and redirect to index.
            Session::set('token', $request->input('token'));

            return redirect('/admin/index');
        }

        return $this->showLogin($request);
    }

    public function logout(Request $resquest)
    {
        Session::clear();
        return redirect('/');
    }

    public function showLogin(Request $request)
    {
        if ($this->check($request))
            return redirect('/admin/login');

        // Compute a new token and two values.
        $token  = bin2hex(random_bytes(10));
        $a      = rand(1, 20);
        $b      = rand(1, 20);
        $sum    = $a + $b; // Sum the user has to find.

        // Keep 'em for later.
        Cache::set('token', $token, 10);
        Cache::set('sum', $sum, 10);

        // Show login.
        return view('admin.login', [
            'token' => $token,
            'a' => $a,
            'b' => $b
        ]);
    }
}
