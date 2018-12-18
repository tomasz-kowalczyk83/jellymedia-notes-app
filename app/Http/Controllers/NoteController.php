<?php

namespace App\Http\Controllers;

use App\Note;
use Illuminate\Http\Request;


class NoteController extends Controller
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
     * Display a listing of the notes.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $notes = \Auth::user()->notes;

        return view('notes.index', compact('notes'));
    }

    /**
     * Show the form for creating a new note.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('notes.create');
    }

    /**
     * Store a newly created rnote
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        \Auth::user()
             ->notes()
             ->create([
                 'title'   => $request->title,
                 'body'    => $request->body
             ]);

        return redirect()
                    ->route('notes.index')
                    ->with('status', 'Note Created!');
    }

    /**
     * Show the form for editing the note
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Note $note)
    {
        return view('notes.edit', compact('note'));
    }

    /**
     * Update the specified note
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  Note   $note
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Note $note)
    {
        $note->title = $request->title;
        $note->body = $request->body;

        $note->save();

        return redirect()
                    ->route('notes.index')
                    ->with('status', 'Note Updated!');
    }

    /**
     * Remove the specified note
     *
     * @param  Note   $note
     * @return \Illuminate\Http\Response
     */
    public function destroy(Note $note)
    {
        $note->forceDelete();

        return redirect()
                    ->route('notes.index')
                    ->with('status', 'Note Deleted!');
    }

    /**
     * Archive the specified note
     * @param  Note   $note
     * @return \Illuminate\Http\Response
     */
    public function archive(Note $note)
    {
        $note->delete();

        return redirect()
                    ->route('notes.index')
                    ->with('status', 'Note Archived!');
    }

    /**
     * Restore archived note
     * @param  int   $id     Note id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        $note = Note::onlyTrashed()->findOrFail($id);

        $note->restore();

        return redirect()
                    ->route('notes.index')
                    ->with('status', 'Note Restored!');
    }

    /**
     * Display a listing of all archived notes.
     * @return \Illuminate\Http\Response
     */
    public function archived()
    {
        $notes = Note::onlyTrashed()->where('user_id', \Auth::id())->get();

        return view('notes.index', compact('notes'));
    }

}
