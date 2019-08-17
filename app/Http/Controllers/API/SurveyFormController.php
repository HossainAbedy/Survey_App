<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\SurveyForm;
use Validator;

class SurveyFormController extends Controller
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
        //dd($request->form['two']['extra']);
        $this->validate($request,[
            'form.org_name' => 'required|string|max:191',
            'form.owner_name' => 'required|string|max:191',
            'form.present_address' => 'required|string|max:191',
            'form.permanent_address' => 'required|string|max:191',
            'form.cell_no' => 'required|string|max:191',
            'form.concern_person' => 'required|string|max:191',
            'form.org_cell_no' => 'required|string|max:191',
            'form.bussiness_type' => 'required|string|max:191',
            'form.bussiness_year' => 'required|string|max:191',
            'form.one' => 'required|string|max:191',
            'form.two.data' => 'required|string|max:191',
            'form.three' => 'required|string|max:191',
            'form.four.data' => 'required|string|max:191',
            'form.five' => 'required|string|max:191',
            'form.six.data' => 'required|string|max:191',
            'form.seven' => 'required|string|max:191',
            'form.eight' => 'required|string|max:191',
            'form.nine' => 'required|string|max:191',
            'form.ten.data' => 'required|string|max:191',
            'form.eleven' => 'required|string|max:191',
            'form.twelve.data' => 'required|string|max:191',
            'form.thirteen.data' => 'required|string|max:191',
            'form.forteen.data' => 'required|string|max:191',
            'form.fifteen' => 'required|string|max:191',
            'form.sixteen.data' => 'required|string|max:191',
        ]);
        
        if($request->form['two']['data'] == 'yes'){
            $this->validate($request,[
                'form.two.extra' => 'required|string|max:191',        
            ]);
        }

        if($request->form['four']['data'] == 'Any Other'){
            $this->validate($request,[
                'form.four.extra' => 'required|string|max:191',        
            ]);
        }

        if($request->form['ten']['data'] == 'Service'){
            $this->validate($request,[
                'form.ten.extra' => 'required|string|max:191',        
            ]);
        }

        if($request->form['twelve']['data'] == 'yes'){
            $this->validate($request,[
                'form.twelve.extra' => 'required|string|max:191',        
            ]);
        }

        if($request->form['thirteen']['data'] == 'no'){
            $this->validate($request,[
                'form.thirteen.extra' => 'required|string|max:191',        
            ]);
        }

        // if($request->form['forteen']['data'] == 'Service'){
        //     $this->validate($request,[
        //         'form.forteen.extra' => 'required|string|max:191',        
        //     ]);
        // }

        if($request->form['sixteen']['data'] == 'yes'){
            $this->validate($request,[
                'form.sixteen.extra' => 'required|string|max:191',        
            ]);
        }



        return SurveyForm::create([
            'user_id' => Auth::id(),
            'org_name' => $request->form['org_name'],
            'owner_name' => $request->form['owner_name'],
            'present_address' => $request->form['present_address'],
            'permanent_address' => $request->form['org_name'],
            'cell_no' => $request->form['cell_no'],
            'concern_person' => $request->form['concern_person'],
            'org_cell_no' => $request->form['org_cell_no'],
            'bussiness_type' => $request->form['bussiness_type'],
            'bussiness_year' => $request->form['bussiness_year'],
            'one' => $request->form['one'],
            'two_data' => $request->form['two']['data'],
            'two_extra' => $request->form['two']['extra'],
            'three' => $request->form['three'],
            'four_data' => $request->form['four']['data'],
            'four_extra' => $request->form['four']['extra'],
            'five' => $request->form['five'],
            'six_data' => $request->form['six']['data'],
            'six_extra' => $request->form['six']['extra'],
            'seven' => $request->form['seven'],
            'eight' => $request->form['eight'],
            'nine' => $request->form['nine'],
            'ten_data' => $request->form['ten']['data'],
            'ten_extra' => $request->form['ten']['extra'],
            'eleven' => $request->form['eleven'],
            'twelve_data' => $request->form['twelve']['data'],
            'twelve_extra' => $request->form['twelve']['extra'],
            'thirteen_data' => $request->form['thirteen']['data'],
            'thirteen_extra' => $request->form['thirteen']['extra'],
            'forteen_data' => $request->form['forteen']['data'],
            'forteen_extra' => $request->form['forteen']['extra'],
            'fifteen' => $request->form['fifteen'],
            'sixteen_data' => $request->form['sixteen']['data'],
            'sixteen_extra' => $request->form['sixteen']['extra'],
        ]);
    }

   
    public function show($id)
    {
        // org_name:'',
        // owner_name:'',
        // present_address:'',
        // permanent_address:'',
        // cell_no:'',
        // concern_person:'',
        // org_cell_no:'',
        // bussiness_type:'',
        // bussiness_year:'',
        // one:'',
        // two:{
        //     data:'',
        //     extra:''
        // },
        // three:'',
        // four:{
        //     data:'',
        //     extra:''
        // },
        // five:'',
        // six:{
        //     data:'',
        //     extra:''
        // },
        // seven:'',
        // eight:'',
        // nine:'',
        // ten:{
        //     data:'',
        //     extra:''
        // },
        // eleven:'',
        // twelve:{
        //     data:'',
        //     extra:''
        // },
        // thirteen:{
        //     data:'',
        //     extra:''
        // },
        // forteen:{
        //     data:'',
        //     extra:''
        // },
        // fifteen:'',
        // sixteen:{
        //     data:'',
        //     extra:''
        // },
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
