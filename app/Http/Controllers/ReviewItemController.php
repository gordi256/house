<?php

namespace App\Http\Controllers;

use App\Models\ReviewItem;
use App\Http\Requests\StoreReviewItemRequest;
use App\Http\Requests\UpdateReviewItemRequest;

class ReviewItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
    public function store(StoreReviewItemRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(ReviewItem $reviewItem)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(ReviewItem $reviewItem)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewItemRequest $request, ReviewItem $reviewItem)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(ReviewItem $reviewItem)
    {
        // TODO удаление!

    }
}
