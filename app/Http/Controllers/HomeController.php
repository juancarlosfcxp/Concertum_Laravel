<?php

namespace App\Http\Controllers;
use App\evento;
use Illuminate\Http\Request;
use MongoDB\Driver\Session;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       // $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index(Request $request)
    {
        $request->session()->remove('manager');
        $eventos = evento::all();
        return view("home",compact('eventos'));
    }

    public function indexManager(Request $request)
    {
        $request->session()->put(['manager' => 'true']);

        $eventos=evento::query()
            ->select()
            ->where('user_id', auth()->id())->get();

        return view("home",compact('eventos'));
    }
}
