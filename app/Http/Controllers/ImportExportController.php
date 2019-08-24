<?php

namespace App\Http\Controllers;

use App\Exports\SurveyFormExport;
use App\Imports\SurveyFormImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;

class ImportExportController extends Controller
{
    public function importExport()
    {
       return view('ImportExport');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function export() 
    {
        return Excel::download(new SurveyFormExport, 'SurveyFormExport.xlsx');
    }
    
    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        Excel::import(new SurveyFormImport, request()->file('file'));
            
        return back();
    }
}
