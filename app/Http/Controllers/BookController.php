<?php

namespace App\Http\Controllers;

use App\Book;
use App\Author;
use App\Genre;
use App\AuthorBook;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;


class BookController extends Controller{

    public function welcome() {
        $message = session()->get('message');
        return view('welcome', ['message' => $message]);
    }

    public function addbook(){
        $request = request()->post();

        $genre_name = $request['genre'];
        $g = Genre::where('genre', $genre_name)->first();
        if(!$g){
            $g = new Genre();
            $g->genre = $genre_name;
        }
        $g->save();

        $book_name = $request['book_name'];
        //Creating book if it not exist; else - modifying book
        $b = Book::where('book_name', $book_name)->first();
        if(!$b){
            $b = new Book();
            $b->book_name = $book_name;
            $b->genre_id = $g->id;
        }
        $b->save();

        $author_names = explode(";", $request['author']);
        foreach ($author_names as $author_name) {
            $author = Author::where('author', $author_name)->first();
            if(!$author){
                $author = new Author();
                $author->author = $author_name;
                $author->save();
            }
            //with author, create reference to book and author
            $reference = new AuthorBook();
            $reference->author_id = $author->id;
            $reference->book_id = $b->id;
            $reference->save();
        }

        return redirect()->to('/')->with(['message' => "Книгу успішно занесено на склад: $book_name"]);
    }

    public function getbook($id) {
        $book = Book::find($id);
        if(!$book){
            abort(404, 'Book not found.');
        }
        return view('bookdescription', ['book' => $book]);
    }

    public function getbooks($id) {
        $genre = Genre::find($id);
        return view('booklist', ['genre' => $genre]);
    }

    public function getauthors($id) {
        $author = Author::find($id);
        return view('authorbooklist', ['author' => $author]);
    }
}

?>
