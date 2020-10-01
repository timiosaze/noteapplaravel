<?php

namespace App\Http\Controllers;

use App\Note;
use Auth;
use DB;
use Illuminate\Http\Request;

class NoteController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        // return Auth::id();
        $notes = Note::where('user_id',Auth::id())->orderBy('id', 'desc')->paginate(15);

        return view('note.index', ['notes' => $notes])->with('success', 'Welcome to your Notes');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        request()->validate([
            'body' => 'required'
        ]);
        $note = new Note();
        $note->body = request('body');
        $note->user_id = Auth::id();

        if($note->save()){
            return redirect('/notes')->with('success', 'New Note saved');
        } else {
            return redirect('/notes')->with('failure', 'Note not saved');
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Note  $note
     * @return \Illuminate\Http\Response
     */
    public function show(Note $note)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        return view('note.edit', ['note' => $note]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function update($id)
    {
        //
        $note = Note::where('user_id', Auth::id())->findOrFail($id);
        request()->validate([
            'body' => 'required'
        ]);
        $note->body = request('body');

        if($note->save()){
            return redirect('/notes')->with('success', 'Note updated successfully');
        } else {
            return redirect('/notes')->with('failure', 'Note not updated');
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $note = Note::where('user_id', Auth::id())->findOrFail($id);

        if($note->delete()){
            return redirect('/notes')->with('success', 'Note deleted successfully');
        } else {
            return redirect('/notes')->with('failure', 'Note not deleted');
        }
    }
}
