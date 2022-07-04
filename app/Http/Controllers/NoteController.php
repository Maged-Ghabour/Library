<?php

namespace App\Http\Controllers;

use App\Models\Note;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Mockery\Matcher\Not;

class NoteController extends Controller
{
    public function index(){
        return view("notes.index");
    }

    public function create(){

        return view("notes.create");
    }

    public function store(Request $request){

        $request->validate([
            "content" => "required|string"
        ]);
        Note::create([
            "content" => $request->content,
            "user_id" => Auth::user()->id
        ]);
        return back();
    }

    public function delete($id){

        $note = Note::findOrFail($id);
        $note->delete();

        return back();
    }
}
