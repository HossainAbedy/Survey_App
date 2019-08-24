<?php

namespace App\Imports;

use App\SurveyForm;
use Maatwebsite\Excel\Concerns\ToModel;

class SurveyFormImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new SurveyForm([
            'name'     => $row[0],
            'email'    => $row[1], 
        ]);
    }
}
