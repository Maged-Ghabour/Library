<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Cat;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function create(){
        $cats = Cat::select("id","name")->get();
        return view("admin.products.create" , compact("cats"));
    }


    public function index(){

        $books =  Book::paginate(5);

        return view("admin.products.index" , compact("books"));
     }

}
