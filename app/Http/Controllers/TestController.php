<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\StoreCategoryRequest;
use App\Http\Requests\UpdateCategoryRequest;
use Maatwebsite\Excel\Facades\Excel;
use App\Imports\BuildingImport;

class TestController extends Controller
{
    /**
     * test a listing of the resource.
     */
    public function test()
    {
        //
        return view('test_table');
    }

    public function test2()
    {
        //
        return view('test_table2');
    }

    /**
     * Display a listing of the resource.
     */
    public function import()
    {
        //
        // Excel::import(new BuildingImport, '111.xls');
        Excel::import(new BuildingImport, '111.xls', 'public');

        return redirect('/dashboard')->with('success', 'All good!');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {
        //
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
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
    }
}
