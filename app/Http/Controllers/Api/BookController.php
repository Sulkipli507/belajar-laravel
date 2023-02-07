<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function index(Request $request){
        $books = Book::with("category")->paginate(5);

        return response()->json([
            "succes" => true,
            "message" => "succes get data book",
            "data" => $books
        ],200);
    }

    public function store(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ]);

       $book = Book::create($request->all());
       return response()->json([
        "succes" => true,
        "message" => "succes create data book",
        "data" => $book
    ],200);
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();

        return response()->json([
        "succes" => true,
        "message" => "succes delete data book",
    ],200);
    }

    public function update(Request $request, $id){
       $book = Book::where("id", $id)->first();
        $book->update($request->all());

        return response()->json([
        "succes" => true,
        "message" => "succes update data book",
        "data" => $request->all()
    ],200);
    }

    public function show($id){
        $book = Book::where("id", $id)->with("category")->first();

        return response()->json([
            "succes" => true,
            "message" => "succes get data book",
            "data" => $book
        ],200);
    }
}