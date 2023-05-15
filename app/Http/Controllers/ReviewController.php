<?php

namespace App\Http\Controllers;

use App\Models\Review;
use App\Http\Requests\StoreReviewRequest;
use App\Http\Requests\UpdateReviewRequest;
use App\Models\Building;
use App\Models\Item;
use App\Models\ReviewItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;


use Maatwebsite\Excel\Facades\Excel;
use App\Exports\ReviewExport;
use App\Exports\TestExport;

class ReviewController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = [
            'title' =>  "Отчеты по зданиям",
        ];

        return view('review.index', $data);
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        //
        if (!Gate::allows('create review')) {
            return abort(401);
        }

        $building = false;
        if ($request->filled('building_id')) {
            $building = Building::find($request->building_id);
            # TODO проверим были ли недавние отчеты по зданию...
            $building->load('review');
        }
        $buildings = Building::all()->pluck('name', 'id');
        
        $data = [
            'title' => 'Новый отчет',
            'building' => $building,
            'buildings' => $buildings
        ];
        return view('review.create', $data);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreReviewRequest $request)
    {
        //TODO  вынести в сервис!
        $review = new Review;
        $review->building_id = $request->building_id;
        $review->user_id =  Auth::id();
        $review->save();
        // dd($request->all(), Auth::id(), $review);

        $review_id = $review->id;
        $items = Item::all();
        foreach ($items as $item) {
            $review_item = new ReviewItem;
            $review_item->review_id =  $review_id;
            $review_item->item_id =  $item->id;
            $review_item->rate =  $item->rate;
            $review_item->rating =  0;
            $review_item->save();
        }
        return redirect(route('review.edit', ['review' => $review]));
    }
    /**
     * Display the specified resource.
     */
    public function report(Review $review)
    {
        // попробуем показать отчет файл
        dd($review);
    }

    /**
     * Display the specified resource.
     */
    public function report_download(Review $review)
    {
        // попробуем показать отчет  
        // dd($review);
        // $file_name = $review->building->name . '.xlsx';

        $bad_symbols = array(".", ",", "%");

        $file_name =  str_replace($bad_symbols, "_", $review->building->name) . '.xlsx';
        return (new TestExport($review->id))->download($file_name);

        // return Excel::forReview($review->id)->download(new ReviewExport, 'test.xlsx');
    }


    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        // попробуем показать отчет 
        $review->load('building', 'creator');
        $data = [
            'title' => ' ТЕСТ  отчет',
            'review' => $review,
        ];

        return view('review.show', $data);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Review $review)
    {
        $review->load('building', 'creator');
        $data = [
            'title' => 'Отчет № ' .  $review->id . ' от ' . $review->created_at,
            'review' => $review,
        ];

        return view('review.edit', $data);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateReviewRequest $request, Review $review)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Review $review)
    {
        //
    }
}
