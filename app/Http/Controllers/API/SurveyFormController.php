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
            'org_name' => 'required|string|max:191',
            'owner_name' => 'required|string|max:191',
            'present_address' => 'required|string|max:191',
            'permanent_address' => 'required|string|max:191',
            'cell_no' => 'required|string|max:191',
            'concern_person' => 'required|string|max:191',
            'org_cell_no' => 'required|string|max:191',
            'bussiness_type' => 'required|string|max:191',
            'bussiness_year' => 'required|string|max:191',
            'one' => 'required|string|max:191',
            'two.data' => 'required|string|max:191',
            'three' => 'required|string|max:191',
            'four.data' => 'required|string|max:191',
            'five' => 'required|string|max:191',
            'six.data' => 'required|string|max:191',
            'seven' => 'required|string|max:191',
            'eight' => 'required|string|max:191',
            'nine' => 'required|string|max:191',
            'ten.data' => 'required|string|max:191',
            'eleven' => 'required|string|max:191',
            'twelve.data' => 'required|string|max:191',
            'thirteen.data' => 'required|string|max:191',
            'forteen.data' => 'required|string|max:191',
            'fifteen' => 'required|string|max:191',
            'sixteen.data' => 'required|string|max:191',
        ]);

        if($request['two']['data'] == 'yes'){
            $this->validate($request,[
                'two.extra' => 'required|string|max:191',
            ]);
        }

        if($request['four']['data'] == 'Any Other'){
            $this->validate($request,[
                'four.extra' => 'required|string|max:191',
            ]);
        }

        if($request['ten']['data'] == 'Service'){
            $this->validate($request,[
                'ten.extra' => 'required|string|max:191',
            ]);
        }

        if($request['twelve']['data'] == 'yes'){
            $this->validate($request,[
                'twelve.extra' => 'required|string|max:191',
            ]);
        }

        if($request['thirteen']['data'] == 'no'){
            $this->validate($request,[
                'thirteen.extra' => 'required|string|max:191',
            ]);
        }

        if($request['forteen']['data'] == 'Service'){
            $this->validate($request,[
                'forteen.extra' => 'required|string|max:191',
            ]);
        }

        if($request['sixteen']['data'] == 'yes'){
            $this->validate($request,[
                'sixteen.extra' => 'required|string|max:191',
            ]);
        }

        return SurveyForm::create([
            'user_id' => Auth::id(),
            'org_name' => $request['org_name'],
            'owner_name' => $request['owner_name'],
            'present_address' => $request['present_address'],
            'permanent_address' => $request['org_name'],
            'cell_no' => $request['cell_no'],
            'concern_person' => $request['concern_person'],
            'org_cell_no' => $request['org_cell_no'],
            'bussiness_type' => $request['bussiness_type'],
            'bussiness_year' => $request['bussiness_year'],
            'one' => $request['one'],
            'two_data' => $request['two']['data'],
            'two_extra' => $request['two']['extra'],
            'three' => $request['three'],
            'four_data' => $request['four']['data'],
            'four_extra' => $request['four']['extra'],
            'five' => $request['five'],
            'six_data' => $request['six']['data'],
            'six_extra' => $request['six']['extra'],
            'seven' => $request['seven'],
            'eight' => $request['eight'],
            'nine' => $request['nine'],
            'ten_data' => $request['ten']['data'],
            'ten_extra' => $request['ten']['extra'],
            'eleven' => $request['eleven'],
            'twelve_data' => $request['twelve']['data'],
            'twelve_extra' => $request['twelve']['extra'],
            'thirteen_data' => $request['thirteen']['data'],
            'thirteen_extra' => $request['thirteen']['extra'],
            'forteen_data' => $request['forteen']['data'],
            'forteen_extra' => $request['forteen']['extra'],
            'fifteen' => $request['fifteen'],
            'sixteen_data' => $request['sixteen']['data'],
            'sixteen_extra' => $request['sixteen']['extra'],
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
