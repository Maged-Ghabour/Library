<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;

class bookController extends Controller
{
    public function index(){

       $books =  Book::get();

       return view("books.index" , compact("books"));
    }

    public function search(Request $request){
        $keyword = $request->keyword;
       $book =  Book::where("title","like","%$keyword%")->get();
       return response()->json($book);
    }

    public function show($id){
        $book = Book::findOrfail($id);
        return view("books.show",compact("book"));
    }

    public function create(){
        $cats = Cat::select("id","name")->get();
        return view("books.create" , compact("cats"));
    }

    public function store(Request $request){



        $request->validate([
            "title" => "required|string|max:100|min:3",
            "desc"  => "required|string|min:3",
            "img"   => "required|image",
            "cat_ids"  => "required",
            "cat_is.*" =>"exists:cats,id"

        ]);

        // dd($request->all());


        $img = $request->file("img");
        $ext = $img->getClientOriginalExtension();
        $imgName = uniqid() . ".$ext";

        $img->move(public_path("uploads/") , $imgName);




       $book =  Book::create([
            "title" => $request->title,
            "desc"  => $request->desc,
            "img"   =>$imgName,

        ]);

        $book->cats()->sync($request->cat_ids);

        return redirect(route("books.index"));

    }


    public function edit($id){

        $book = Book::findOrFail($id);
        return view("books.edit" , compact("book"));
    }



    public function update($id , Request $request){
        $request->validate([
            "title" => "required|string|max:100|min:3",
            "desc"  => "required|string|min:3",
            "img"  => "nullable|image"
        ]);


        $book = Book::findOrFail($id);
        $name = $book ->img;                 # From DB

        if($request->hasFile("img")){

            if($name !== null){
                unlink(public_path("uploads/").$name);
            }



        $img = $request->file("img");
        $ext = $img->getClientOriginalExtension();
        $name = uniqid() . ".$ext";
        $img->move(public_path("uploads/") , $name);


    }


        $book->update([
            "title" => $request->title,
            "desc"  => $request->desc,
            "img"   => $name
        ]);

        return redirect( route("books.index"));
    }

    public function delete($id){

        $book = Book::findOrFail($id);
        unlink(public_path("uploads/").$book->img);

        $book->cats()->sync([]);
        $book->delete();

        return redirect(route("books.index"));
    }






















}
