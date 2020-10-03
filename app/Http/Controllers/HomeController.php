<?php

namespace App\Http\Controllers;

use App\Note;
use Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $notes = Note::where('user_id',Auth::id())->orderBy('id', 'desc')->paginate(15);

        return view('note.index', ['notes' => $notes])->with('success', 'Welcome to your Notes');
    }
    
}
