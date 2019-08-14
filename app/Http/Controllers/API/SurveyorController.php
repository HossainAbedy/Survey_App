<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SurveyorController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }
   
    public function index()
    {
        //
    }

  
    public function create()
    {
        //
    }

    
    public function store(Request $request)
    {
        
        
     
    }

   
    public function show($id)
    {
        //
    }

   
    public function edit($id)
    {
        //
    }

    
    public function update(Request $request, $id)
    {
        //
    }

  
    public function destroy($id)
    {
        //
    }
}
