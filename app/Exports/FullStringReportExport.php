<?php

namespace App\Exports;

use App\Models\{Review, ReviewItem};

use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\WithMultipleSheets;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\WithColumnWidths;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class FullStringReportExport implements FromView, WithColumnWidths, WithStyles
{

    use Exportable;
    private $review_id;

    private $year;


    public function styles(Worksheet $sheet)
    {
        // return [
        //     // Style the first row as bold text.
        //     1    => ['font' => ['bold' => true]],

        //     // Styling a specific cell by coordinate.
        //     'B2' => ['font' => ['italic' => true]],

        //     // Styling an entire column.
        //     'C'  => ['font' => ['size' => 16]],
        // ];
    }

    public function __construct(int $review_id)
    {
        $this->review_id = $review_id;
    }


    public function query()
    {
        return ReviewItem::query()->where('review_id', $this->review_id);
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
        $items = ReviewItem::query()->where('review_id', $this->review_id)->get();
        $items->load('item', 'item.category');

        return view('export.create', [
            'items' => $items
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
