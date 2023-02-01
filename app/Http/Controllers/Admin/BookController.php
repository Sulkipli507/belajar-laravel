<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Book;
use App\Models\Category;
use Illuminate\Http\Request;
use PhpParser\Node\Expr\Cast\Bool_;

class BookController extends Controller
{
    public function create(){
        $category = Category::all();
        return view('admin.book.create', compact("category"));
    }

    public function store(Request $request){
        $this->validate($request , [
            'name' => 'required',
            'author' => 'required',
            'year' => 'required',
            'category_id' => 'required',
        ]);

       Book::create($request->all());
       return redirect()->route("book-index")->with('status', 'Sukses insert data book');
    }

    public function index(Request $request){
        $books = Book::with("category")->paginate(5);
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
        $category = Category::all();
        $book = Book::where("id", $id)->first();
        return view("admin.book.edit", compact("book","category"));
    }

    public function update(Request $request, $id){
        $book = Book::where("id", $id)->first();
        $book->update($request->all());
        return redirect()->route("book-index")->with('status','Sukses edit data book');
    }

    public function show($id){
        $book = Book::where("id", $id)->with("category")->first();
        return view('admin.book.show', compact("book"));
    }

}
