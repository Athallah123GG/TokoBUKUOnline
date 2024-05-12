<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Category;
use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\StoreBookRequest;
use App\Http\Requests\UpdateBookRequest;

class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search'); //menangkap data pencarian dari URL

        $books = Book::select([
            'books.id',
            'books.title',
            'price',
            'books.description',
            'books.created_at',
            'books.book_cover',
            'publishers.name as publisher_name',
            'categories.name as category_name',
        ])
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        ->where('title' ,'like' ,"%{$search}%")
        ->orWhere('categories.name' ,'like' ,"%{$search}%")
        ->orWhere('publishers.name' ,'like' ,"%{$search}%")
        ->orderBy('id', 'desc')
        ->paginate(12);

        // $books = Book::query()->paginate(10);
        return view('dashboard.book.index' , compact('books'));


    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $publishers = Publisher::all();
        $categories = Category::all();
        return view('dashboard.book.create' ,compact('publishers','categories'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreBookRequest $request)
    {

        try{
            // dd($request);
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'numeric|required',
                'description' => 'required|string',
                'publisher_id' => 'required',
                'category_id'=>'required',
                'book_cover' =>'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            if ($request->hasFile('book_cover')) {
                $file = $request->file('book_cover');
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/books/book_covers', $fileName);
            } else {
                $fileName = 'not_set.png'; // Jika tidak ada gambar yang diunggah, gunakan gambar default
            }
            $validatedData['book_cover'] = $fileName;

            Book::create($validatedData);

            return redirect()->route('book.index')->with('message', ['alert'=>'success', 'message'=> 'Category created successfully.']);

        }

        catch(\Exception $e){
            // dd($e->getMessage());
            return redirect()->route('book.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);

        }

    }

    /**
     * Display the specified resource.
     */
    public function show(Book $book ,$id)
    {

        $book = Book::select([
            'books.id',
            'books.title',
            'book_cover',
            'price',
            'books.description',
            'publishers.name as publisher_name',
            'categories.name as category_name',
        ])
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        // ->orderBy('id', 'asc')
        ->where('books.id','=' , $id)
        ->first();

        return view('dashboard.book.detail', compact('book'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Book $book ,$id)
    {


        $book = Book::select([
            'books.id',
            'books.title',
            'book_cover',
            'price',
            'books.description',
            'publishers.name as publisher_name',
            'categories.name as category_name',
        ])
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        // ->orderBy('id', 'asc')
        ->where('books.id','=' , $id)
        ->first();

        $publishers = Publisher::all();
        $categories = Category::all();
        return view('dashboard.book.edit', compact('book','publishers' ,'categories'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBookRequest $request, Book $book ,$id)
    {
        try{

            $book = Book::findOrFail($id);

            // dd($request);
            $validatedData = $request->validate([
                'title' => 'required|string|max:255',
                'price' => 'numeric|required',
                'description' => 'required|string',
                'publisher_id' => 'required',
                'category_id'=>'required',
                'book_cover' =>'image|mimes:jpeg,png,jpg|max:2048'
            ]);

            $fileName = $book->book_cover; // kalau book_cover tidak diedit, maka namanya sama
            if ($request->hasFile('book_cover')) { // kalau  book_cover diedit
                $file = $request->file('book_cover'); //menampung nilai requestr file
                // Ganti spasi dengan strip dan hapus karakter khusus lainnya
                $fileName = time() . '_' . str_replace([' ', '%', '#', '@', '+', '=', '?', '&', '$', '^'], '-', $file->getClientOriginalName());
                $file->storeAs('public/books/book_covers', $fileName);
                //untuk mengetahui apakah file lama perlu dihapus
                if ($book->book_cover != $file->getClientOriginalName() && $book->book_cover != 'not_set.png' && $book->book_cover == $book->book_cover ) {
                    unlink(storage_path('app/public/books/book_covers/' . $book->book_cover));
                }
            }
            $validatedData['book_cover'] = $fileName;

            $book ->update($validatedData);

            return redirect()->route('book.index')->with('message', ['alert'=>'success', 'message'=> 'Book Edited successfully.']);

        }

        catch(\Exception $e){
            // dd($e->getMessage());
            return redirect()->route('book.edit' ,$id)->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);

        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Book $book ,$id)
    {
        $book = Book::findOrFail($id);

        $book->delete();
        return redirect()->route('book.index')->with('message', ['alert'=>'success', 'message'=> 'Book Deleted successfully.']);

    }

    public function datatable(Book $book){
        $books = Book::select([
            'books.id',
            'books.title',
            'price',
            'books.description',
            'books.created_at',
            'books.book_cover',
            'publishers.name as publisher_name',
            'categories.name as category_name',
        ])
        ->join('publishers', 'publishers.id', '=', 'books.publisher_id')
        ->join('categories', 'categories.id', '=', 'books.category_id')
        ->orderBy('id', 'desc')
        ->get();

        return view('dashboard.book.datatable', compact('books'));

    }
}
