<?php

namespace App\Http\Controllers;

use App\Models\Publisher;
use Illuminate\Http\Request;
use App\Http\Requests\StorePublisherRequest;
use App\Http\Requests\UpdatePublisherRequest;

class PublisherController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {

        $search = $request->input('search'); //menangkap data pencarian dari URL


        $publishers = Publisher::query()
        ->where('name','like' ,"%{$search}%")
        ->orWhere('address','like' ,"%{$search}%")
        ->orderBy('id','asc')
        ->paginate(10)
        ->withQueryString();
        return view ('dashboard.publisher.index' ,compact('publishers'));

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('dashboard.publisher.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePublisherRequest $request)
    {
        try{
            //Validasi
            $validatedData = $request->validate([
                'name' => 'required|string|max:100',
                'address' => 'required|string|max:255',
                'phone' => 'required|string'
            ]);

            // dd($validatedData);
            //Store
            Publisher::create($validatedData);

            return redirect()->route('publisher.index')->with('message', ['alert'=>'success', 'message'=> 'Publisher created successfully.']);
        }

        catch(\Exception $e){
            return redirect()->route('publisher.create')->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);

            // dd($e->getMessage());
        }



        //Validasi
        //Store
        //Handling
        // dd($request);
    }

    /**
     * Display the specified resource.
     */
    public function show(Publisher $publisher)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $publisher = Publisher::findOrFail($id);
        return view('dashboard.publisher.edit' , compact('publisher'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePublisherRequest $request ,$id)
    {

        try{
            $validatedData = $request->validate([
            'name' => 'required|string|max:100',
            'address' => 'required|string|max:255',
            'phone' => 'required|string'
        ]);

            $publisher = Publisher::findOrFail($id);
            $publisher ->update($validatedData);
            return redirect()->route('publisher.index')->with('message', ['alert'=>'success', 'message'=> 'Publisher Edit successfully.']);


        }catch(\Exception $e){

            return redirect()->route('publisher.edit' ,$id)->with('message', ['alert'=>'danger', 'message'=> $e->getMessage()]);
        }




        dd($request);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Publisher $publisher)
    {
        //
    }
}
