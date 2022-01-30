<?php

namespace App\Imports;

use App\Models\client;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class clientsImport implements ToModel, WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */

    public $importedCount=0;
    public function model(array $row)
    {
        // var_dump( $row);
        $this->importedCount+=1;
        return new client([
            //
            'companyName'=>$row['entreprise'],
            'activity'=>$row['activite'],
            'adress'=>$row['adresse'],
            'city'=>$row['ville'],
            'tel1'=>$row['numero_de_telephone'],
            'tel2'=>$row['numero_de_telephone_2'],
            'fax'=>$row['fax'],
            'email'=>$row['email'],
            'website'=>$row['site_web'],

        ]);
    }
}
