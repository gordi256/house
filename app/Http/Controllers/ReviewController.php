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
use App\Exports\FullStringReportExport;
use App\Exports\TestExport;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Zip;

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
            $review_item->description =  "";
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


    public function report_download(Review $review)
    {
        // попробуем показать отчет  только с заполненными строками
        $bad_symbols = array(".", ",", "%");
        $file_name =  str_replace($bad_symbols, "_", $review->building->name) . '.xlsx';
        return (new TestExport($review->id))->download($file_name);
        // return Excel::forReview($review->id)->download(new ReviewExport, 'test.xlsx');
    }


    /**
     * Display the specified resource.
     */
    public function report_download_all(Review $review)
    {
        // попробуем показать отчет  со всеми строками
        $bad_symbols = array(".", ",", "%");
        $file_name =  str_replace($bad_symbols, "_", $review->building->name) . '.xlsx';
        return (new FullStringReportExport($review->id))->download($file_name);

        // return Excel::forReview($review->id)->download(new ReviewExport, 'test.xlsx');
    }



    public function download_photo(Review $review)
    {
        // попробуем показать фото  
        $temp_dir_name = 'temp_' . $review->id;
        Storage::createDirectory($temp_dir_name);

        $bad_symbols = array(".", ",", "%", " ", " _");
        $items  = $review->item;

        foreach ($items as $item) {
            // получим фото
            $temp_medias = $item->getMedia('images');

            if (count($temp_medias) > 0) {
                $temp_file_name =  str_replace($bad_symbols, "_", $item->item->name);
                foreach ($temp_medias as $temp_media) {
                    $ext = pathinfo($temp_media->getPath(), PATHINFO_EXTENSION);
                    $copy_file_name = $temp_file_name . '_' . $temp_media->order_column . '.' . $ext;
                    $file = public_path('media' . DIRECTORY_SEPARATOR . $temp_media->id . DIRECTORY_SEPARATOR . $temp_media->file_name);
                    $destination =  $temp_dir_name . DIRECTORY_SEPARATOR . $copy_file_name;
                    $contents = Storage::disk('media')->get(DIRECTORY_SEPARATOR . $temp_media->id . DIRECTORY_SEPARATOR . $temp_media->file_name);
                    Storage::put($destination, $contents);
                }
            }
        }

        $files = Storage::allFiles($temp_dir_name);
        // добавим в архив
        $temp_zip_name =  str_replace($bad_symbols, "_", $review->building->name);
        $zip =    Zip::create($temp_zip_name . '.zip');
        foreach ($files as $file) {
            $zip->add(storage_path('/app/' . $file));
        }
        return $zip;


        // TODO удалим архив


    }

    public function confirm(Review $review)
    {
        // установим confirmed!
        $review->confirmed = 1;
        $review->save();
        return redirect(route('review.edit', ['review' => $review]));
    }

    /**
     * Display the specified resource.
     */
    public function show(Review $review)
    {
        // попробуем показать отчет 
        $review->load('building', 'creator');
        $data = [
            'title' => 'Отчет № ' .  $review->id . ' от ' . $review->created_at,
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
            'title' => 'Анкета  № ' .  $review->id . ' от ' . $review->created_at,
            'review' => $review,
        ];

        return view('review.edit_last', $data);
    }
    /**
     * Update the specified resource in storage.
     */
    public function insert_data(Request $request)
    {
        //
        // dd($request->all());

        $item = ReviewItem::find($request->id);
        if ($request->field === 'check') {
            $item->check = $request->value;
        }
        $item->save();
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
