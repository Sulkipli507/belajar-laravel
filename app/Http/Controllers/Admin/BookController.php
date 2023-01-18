<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class BookController extends Controller
{
    public function create(){
        return view('admin.book.create');
    }

    public function store(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
        ],[
            "name"=> "harus disi"
        ]);

       Book::create($request->all());
       //return redirect()->route("book-index");
    }

    public function index(){
        $books = Book::all();
        //return response()->json($books);
        return view('admin.book.index', compact("books"));
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();
        return redirect()->route("book-index");
    }

    public function edit($id){
        $book = Book::where("id", $id)->first();
        return view("admin.book.edit", compact("book"));
    }

    public function update(Request $request, $id){
        $book = Book::where("id", $id)->first();
        $book->update($request->all());
        return redirect()->route("book-index");
    }
}
