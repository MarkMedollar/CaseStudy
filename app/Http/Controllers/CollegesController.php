<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\College;
use App\Http\Requests\CollegeRequest;

class CollegesController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    // public function index()
    // {
    //     $colleges = College::query()->get();
    //     return view('colleges.index',['colleges'=> $colleges]);
    // }

    // functional
    public function index(Request $request)
    {
    $viewType = $request->input('view', 'table'); // Default to 'table'
    $colleges = College::query()->get(); // Replace with your actual data fetching logic

    return view('colleges.index', compact('colleges', 'viewType'));
    }
    //end try

    // public function index(Request $request)
    // {
    // $viewType = $request->input('view', 'table'); // Default to 'table'

    // // Fetch all college data including coordinates
    // $colleges = College::select('name', 'latitude', 'longitude', 'address')->get();

    // return view('colleges.index', compact('colleges', 'viewType'));
    // }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('colleges.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CollegeRequest $request)
    {
        College::query()->create([
            'name'=>$request->name,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'website'=>$request->website,
            'contact_number'=>$request->contact_number,
        ]); //connection to database from form
        return redirect('/colleges'); //redirecting to books page after creating a new book
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // $colleges = College::query()->get();
        // return view('colleges.map',['colleges'=> $colleges]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $college = College::query()->find($id);
        return view('colleges.edit',['college'=> $college]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CollegeRequest $request, string $id)
    {
        $college = College::query()->find($id);

        $college->update([
            'name'=>$request->name,
            'address'=>$request->address,
            'latitude'=>$request->latitude,
            'longitude'=>$request->longitude,
            'website'=>$request->website,
            'contact_number'=>$request->contact_number,
        ]);

        return redirect()->back()->withInput();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        College::query()->find($id)->delete();

        return redirect()->back();
    }

    public function map()
    {
        return view('colleges.map');
    }
}
