<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class ApiBookController extends Controller
{
  public function index(){
    $books = Book::get();
    return response()->json($books);
  }

  public function show($id){
    $book = Book::findOrFail($id);
    return response()->json($book);
  }



  public function store(Request $request){


   $validator = Validator::make($request->all(),[
        "title" => "required|string|max:100|min:3",
        "desc"  => "required|string|min:3",
        "img"   => "required|image",
        "cat_ids"  => "required",
        "cat_is.*" =>"exists:cats,id"
   ]);

   if($validator->fails()){
    $errors = $validator->errors();
    return response()->json($errors);
   }


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

    $success = "Data Added Successfully...!";
    return response()->json($success);

}




public function update($id , Request $request){
    $validator = Validator::make($request->all(),[
            "title" => "required|string|max:100|min:3",
            "desc"  => "required|string|min:3",
            "img"  => "nullable|image"
    ]);

    if($validator->fails()){
        $errors = $validator->errors();
        return response()->json($errors);
    }


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


    $success = "Book Update successfully...!";

    return response()->json($success);
}




public function delete($id){

    $book = Book::findOrFail($id);
    unlink(public_path("uploads/").$book->img);

    $book->cats()->sync([]);
    $book->delete();
    $success = "Book Deleted Successfully ... !";
    return response()->json($success);
}
















}
