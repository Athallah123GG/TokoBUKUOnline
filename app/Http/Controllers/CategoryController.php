<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        try{
            $search = $request->input('search'); //menangkap data pencarian dari URL
            $categories = Category::query()
            ->where('name','like',"%{$search}%")
            ->orderBy('id','asc')
            ->paginate(10)
            ->withQueryString();
        }

        catch(\Exception $e){
            dd($e->getMessage());
        }



        return view ('dashboard.category.index', compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('dashboard.category.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        try{
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string'
            ]);

            Category::create($validatedData);
            return redirect()->route('category.index')->with('message', ['alert'=>'success', 'message'=> 'Category created successfully.']);
        }

        catch(\Exception $e){
            return redirect()->route('category.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);

        }

        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('dashboard.category.edit' , compact('category')) ;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category ,$id)
    {
        try{
            // dd($request);
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'description' => 'nullable|string'
            ]);

            $category = Category::findOrFail($id);
            $category ->update($validatedData);

            return redirect()->route('category.index')->with('message', ['alert'=>'success', 'message'=> 'Category Edit successfully.']);

        }

        catch(\Exception $e){
            return redirect()->route('category.edit' ,$id)->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);

            // dd($e->getMessage());
        }



    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
