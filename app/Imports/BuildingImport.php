<?php

namespace App\Imports;

use App\Models\Building;
use Maatwebsite\Excel\Concerns\ToModel;
// use Maatwebsite\Excel\Concerns\WithHeadingRow;, WithHeadingRow

class BuildingImport implements ToModel
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {

        if ($row[0]  == "№") {
            return null;
        }
        if (!isset($row[0])) {
            return null;
        }

        $house_name = $row[1] . ' д. ' . $row[2];
        if (isset($row[3])) {
            $house_name .= ' корп. ' . $row[3];
        }

        if (isset($row[4])) {
            $house_name .= ' лит. ' . $row[4];
        }

        // TODO наименование проверка на  корпуса и литеры
        return new Building([
            //
            // 'name'     => rtrim($row[1] . ' д. ' . $row[2] . ' корп.' . $row[3] . ' лит.' . $row[4]),
            'name'     => $house_name,
            'street'     => $row[1],
            'house'    => $row[2],
            'building'    => $row[3],
            'liter'    => $row[4],
            'floors'    => $row[5],
            'entrances'    => $row[6],
            'improvement'    => $row[7],
            'organization'    => $row[8],
            'active'    => 1,

        ]);
    }
}
