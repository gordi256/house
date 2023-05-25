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
use Maatwebsite\Excel\Events\AfterSheet;
use Maatwebsite\Excel\Concerns\WithEvents;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use PhpOffice\PhpSpreadsheet\Cell\DataType;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;

class FullStringReportExport implements FromView,    WithColumnWidths,    WithStyles,    WithEvents
{
    use Exportable;
    private $review_id;



    public function styles(Worksheet $sheet)
    {
        return [
            // Style the first row as bold text.
            4    => ['font' => ['bold' => true], 'alignment' => ['wrapText' => true]],

            //     // Styling a specific cell by coordinate.
            //     'B2' => ['font' => ['italic' => true]],

            //     // Styling an entire column.
            //  'A'  => ['font' => ['size' => 14]],
        ];
    }

    public function __construct(int $review_id)
    {
        $this->review_id = $review_id;
    }


    public function query()
    {
        return ReviewItem::query()->where('review_id', $this->review_id)->orderBy('id', 'desc');
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
        //$items = ReviewItem::query()->where('review_id', $this->review_id)->where('check', 'Да')->get();

        $items = ReviewItem::query()->where('review_id', $this->review_id)->orderBy('id', 'desc')->get();
        $review = Review::find($this->review_id)->first();
        $items->load('item', 'item.category');

        return view('export.create', [
            'items' => $items,
            'review' => $review,

        ]);
    }

    /**
     * Write code on Method
     *
     * @return response()
     */
    public function registerEvents(): array
    {
        return [
            AfterSheet::class    => function (AfterSheet $event) {

                $event->sheet->getDelegate()->getStyle('A4:I4')
                    ->getAlignment()
                    ->setVertical(\PhpOffice\PhpSpreadsheet\Style\Alignment::VERTICAL_TOP)
                    ->setHorizontal(\PhpOffice\PhpSpreadsheet\Style\Alignment::HORIZONTAL_CENTER_CONTINUOUS);
                $event->sheet->getRowDimension(4)->setRowHeight(50);

                // $event->sheet->getStyle('A4:A84')
                //     ->getNumberFormat()
                //     ->setFormatCode(
                //         \PhpOffice\PhpSpreadsheet\Cell\DataType::TYPE_STRING2
                //     );
                //     $event->sheet ->getDelegate()->getStyle('A4:A94')->setType( \PhpOffice\PhpSpreadsheet\Cell\DataValidation::TYPE_WHOLE );

            },
        ];
    }

    // public function columnFormats(): array
    // {
    //     return [
    //         'A' => NumberFormat::FORMAT_TEXT,

    //     ];
    // }
}
