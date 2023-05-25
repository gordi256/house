<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Http\Requests\{StoreCategoryRequest, UpdateCategoryRequest};
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' =>  "Расценки",
        ];
        return view('category.index', $data);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

        $data = [
            'title' =>  "Новая категория",
        ];
        return view('category.create',    $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreCategoryRequest $request)
    {

        $category  = Category::create($request->validated());
        session()->flash('success', 'Категория успешно создана');

        return redirect(route('category.edit', ['category' => $category]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        $data = [
            'title' =>  "Категория " . $category->name,
            'category' => $category
        ];

        return view('category.show',   $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Category $category)
    {
        if (!Gate::allows('manage item')) {
            return abort(401);
        }

        $data = [
            'title' =>  "Редактирование категории " . $category->name,
            'category' => $category
        ];

        return view('category.edit',   $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateCategoryRequest $request, Category $category)
    {

        $input = $request->all();
        // isset($input['active']) ? $input['active'] = '1' : $input['active'] = '0';
        $item = $category->update($input);
        session()->flash('success', 'Категория успешно обновлена');

        return redirect(route('category.edit', ['category' => $category]));
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Category $category)
    {
        //
        // TODO удаление!

    }
}
