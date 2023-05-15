<?php

namespace App\Exports;

use App\Models\{Review ,ReviewItem};

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\FromQuery;

class ReviewExport implements FromView, WithColumnWidths, FromQuery
{

    use Exportable;

    public function forReview(int $review)
    {
        $this->review = $review;

        return $this;
    }

    public function query()
    {
        return Review::query()->where('id', $this->review);
    }

    public function columnWidths(): array
    {
        return [
            'A' => 6,
            'B' => 55,
            'C' => 15,
            'D' => 12,
            'E' => 19,
            'F' => 30,
            'G' => 45,
            'H' => 15,
            'I' => 15,
        ];
    }

    public function view(): View
    {
        return view('export.create', [
            //  'invoices' => Invoice::all()
        ]);
    }




    // public function sheets(): array
    // {
    //     $sheets = [];

    //     for ($month = 1; $month <= 12; $month++) {
    //         $sheets[] = new InvoicesPerMonthSheet($this->year, $month);
    //     }

    //     return $sheets;
    // }
}
