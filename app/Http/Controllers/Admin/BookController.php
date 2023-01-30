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
        ]);

       Book::create($request->all());
       return redirect()->route("book-index")->with('status', 'Sukses insert data book');
    }

    public function index(Request $request){
        $books = Book::paginate(5);
        $filterKeyword = $request->get('name');
        if($filterKeyword){
            $books = Book::where("name", "LIKE",
           "%$filterKeyword%")->paginate(5);
        }


        //return response()->json($books);
        return view('admin.book.index', compact("books"));
    }

    public function destroy($id){
        $book = Book::where("id", $id)->first();
        $book->delete();
        return redirect()->route("book-index")->with('status', 'Sukses delete data book');
    }

    public function edit($id){
        $book = Book::where("id", $id)->first();
        return view("admin.book.edit", compact("book"));
    }

    public function update(Request $request, $id){
        $book = Book::where("id", $id)->first();
        $book->update($request->all());
        return redirect()->route("book-index")->with('status','Sukses edit data book');
    }
}