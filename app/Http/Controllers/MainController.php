<?php

namespace App\Http\Controllers;

use App\Models\Book;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function index(){
        $books = Book::select([
            'books.id',
            'books.title',
            'book_cover',
            'price',
            'publishers.name as publisher_name',
            'categories.name as category_name',
        ])
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        ->orderBy('id', 'asc')
        ->paginate(12);
        // dd($books);


        return view('welcome.index' , [
            'books' => $books
        ]);
    }

    public function features(){
        return view ('welcome.features');
    }

    public function pricing(){
        return view('welcome.pricing');
    }


}
