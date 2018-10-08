<?php

namespace App\Imports;

use App\Data;

use Illuminate\Support\Facades\Auth;

use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class DataImport implements ToCollection, WithHeadingRow
{

    // public function mapping(): array
    // {
    //     return [
    //         'depth' => 'B6',
    //         'rop' => 'C6',
    //         'rpm' => 'D6',
    //         'wob' => 'E6',
    //         'tflo' => 'F6',
    //         'stor' => 'G6',
    //         'mse' => 'H6',
    //         'mi' => 'I6',
    //     ];
    // }

    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function model(array $row)
    // {
    //     if (!isset($row)) {
    //         return new Data([
    //             'depth' => null,
    //             'rop' => null,
    //             'rpm' => null,
    //             'wob' => null,
    //             'tflo' => null,
    //             'stor' => null,
    //             'mse' => null,
    //             'mi' => null
    //             // 'well_id' => $well_id
    //         ]);
    //     };
    //     return new Data([
    //         'depth' => $row['DEPTH'],
    //         'rop' => $row['rop'],
    //         'rpm' => $row['rpm'],
    //         'wob' => $row['wob'],
    //         'tflo' => $row['tflo'],
    //         'stor' => $row['stor'],
    //         'mse' => $row['mse'],
    //         'mi' => $row['mi'],
    //         // 'well_id' => $well_id
    //     ]);
    // }

    public function collection(Collection $rows)
    {
        $response = array();
        foreach ($rows as $row) 
        {
            if (!isset($row)) {
                return new Data([
                    'depth' => null,
                    'rop' => null,
                    'rpm' => null,
                    'wob' => null,
                    'tflo' => null,
                    'stor' => null,
                    'mse' => null,
                    'mi' => null
                    // 'well_id' => $well_id
                ]);
            };
            $new_data = new Data(
                [
                    'depth' => $row['DEPTH'],
                    'rop' => $row['rop'],
                    'rpm' => $row['rpm'],
                    'wob' => $row['wob'],
                    'tflo' => $row['tflo'],
                    'stor' => $row['stor'],
                    'mse' => $row['mse'],
                    'mi' => $row['mi'],
                    // 'well_id' => $well_id
                ]
            );
            $response[] = $new_data;
        }
        return $response;
    }
}
