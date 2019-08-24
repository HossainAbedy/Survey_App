<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Exports\SurveyFormExport;
use Maatwebsite\Excel\Facades\Excel;
use App\SurveyForm;
use DB;
use Validator;

class SurveyFormController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:api');
    }

    public function index()
    {
        return SurveyForm::with('user')->latest()->paginate(5);
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
        ],[
            'org_name.required' => 'Please Provide The Valid Organizataion Name',
            'owner_name.required' => 'Please Provide The Valid Owner Name',
            'present_address.required' => 'Please Provide The Valid Present Address',
            'permanent_address.required' => 'Please Provide The Valid Permanent Address',
            'cell_no.required' => 'Please Provide The Valid Cell No',
            'concern_person.required' => 'Please Provide The Valid Concern Person',
            'org_cell_no.required' => 'Please Provide The Valid Organization Cell No',
            'bussiness_type.required' => 'Please Provide The Valid bussiness type',
            'bussiness_year.required' => 'Please Provide The Valid bussiness year',
            'one.required' => 'Please Provide The Valid Answer',
            'two.data.required' => 'Please Provide The Valid Input For Two Data',
            'three.required' => 'Please Provide The Valid',
            'four.data.required' => 'Please Provide The Valid',
            'five.required' => 'Please Provide The Valid',
            'six,data.required' => 'Please Provide The Valid',
            'seven.required' => 'Please Provide The Valid',
            'eight.required' => 'Please Provide The Valid',
            'nine.required' => 'Please Provide The Valid',
            'ten.data.required' => 'Please Provide The Valid',
            'eleven.required' => 'Please Provide The Valid Answer',
            'twelve.data.required' => 'Please Provide The Valid',
            'thirteen.data.required' => 'Please Provide The Valid',
            'forteen.data.required' => 'Please Provide The Valid',
            'fifteen.required' => 'Please Provide The Valid Answer',
            'sixteen.data.required' => 'Please Provide The Valid',
        ]);

        if($request['two']['data'] == 'yes'){
            $this->validate($request,[
                'two.extra' => 'required|string|max:191',
            ],[
                'two.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['four']['data'] == 'Any Other'){
            $this->validate($request,[
                'four.extra' => 'required|string|max:191',
            ],[
                'four.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['ten']['data'] == 'Service'){
            $this->validate($request,[
                'ten.extra' => 'required|string|max:191',
            ],[
                'ten.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['twelve']['data'] == 'yes'){
            $this->validate($request,[
                'twelve.extra' => 'required|string|max:191',
            ],[
                'twelve.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['thirteen']['data'] == 'no'){
            $this->validate($request,[
                'thirteen.extra' => 'required|string|max:191',
            ],[
                'thirteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['forteen']['data'] == 'Service'){
            $this->validate($request,[
                'forteen.extra' => 'required|string|max:191',
            ],[
                'forteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['sixteen']['data'] == 'yes'){
            $this->validate($request,[
                'sixteen.extra' => 'required|string|max:191',
            ],[
                'sixteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
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
        return SurveyForm::with('user')->find($id);
    }


    public function edit($id)
    {
        //
    }


    public function update(Request $request, $id)
    {
        //dd($request);
        $surveyform = SurveyForm::findOrFail($id);
        //dd($surveyform);
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
        ],[
            'org_name.required' => 'Please Provide The Valid Organizataion Name',
            'owner_name.required' => 'Please Provide The Valid Owner Name',
            'present_address.required' => 'Please Provide The Valid Present Address',
            'permanent_address.required' => 'Please Provide The Valid Permanent Address',
            'cell_no.required' => 'Please Provide The Valid Cell No',
            'concern_person.required' => 'Please Provide The Valid Concern Person',
            'org_cell_no.required' => 'Please Provide The Valid Organization Cell No',
            'bussiness_type.required' => 'Please Provide The Valid bussiness type',
            'bussiness_year.required' => 'Please Provide The Valid bussiness year',
            'one.required' => 'Please Provide The Valid Answer',
            'two.data.required' => 'Please Provide The Valid Input For Two Data',
            'three.required' => 'Please Provide The Valid',
            'four.data.required' => 'Please Provide The Valid',
            'five.required' => 'Please Provide The Valid',
            'six,data.required' => 'Please Provide The Valid',
            'seven.required' => 'Please Provide The Valid',
            'eight.required' => 'Please Provide The Valid',
            'nine.required' => 'Please Provide The Valid',
            'ten.data.required' => 'Please Provide The Valid',
            'eleven.required' => 'Please Provide The Valid Answer',
            'twelve.data.required' => 'Please Provide The Valid',
            'thirteen.data.required' => 'Please Provide The Valid',
            'forteen.data.required' => 'Please Provide The Valid',
            'fifteen.required' => 'Please Provide The Valid Answer',
            'sixteen.data.required' => 'Please Provide The Valid',
        ]);

        if($request['two']['data'] == 'yes'){
            $this->validate($request,[
                'two.extra' => 'required|string|max:191',
            ],[
                'two.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['four']['data'] == 'Any Other'){
            $this->validate($request,[
                'four.extra' => 'required|string|max:191',
            ],[
                'four.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['ten']['data'] == 'Service'){
            $this->validate($request,[
                'ten.extra' => 'required|string|max:191',
            ],[
                'ten.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['twelve']['data'] == 'yes'){
            $this->validate($request,[
                'twelve.extra' => 'required|string|max:191',
            ],[
                'twelve.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['thirteen']['data'] == 'no'){
            $this->validate($request,[
                'thirteen.extra' => 'required|string|max:191',
            ],[
                'thirteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['forteen']['data'] == 'Service'){
            $this->validate($request,[
                'forteen.extra' => 'required|string|max:191',
            ],[
                'forteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        if($request['sixteen']['data'] == 'yes'){
            $this->validate($request,[
                'sixteen.extra' => 'required|string|max:191',
            ],[
                'sixteen.extra.required' => 'Please Provide The Valid Input For Two Extra'
            ]);
        }

        $surveyform->org_name = $request->org_name;
        $surveyform->owner_name = $request->owner_name;
        $surveyform->present_address = $request->present_address;
        $surveyform->permanent_address = $request->permanent_address;
        $surveyform->cell_no = $request->cell_no;
        $surveyform->concern_person = $request->concern_person;
        $surveyform->org_cell_no = $request->org_cell_no;
        $surveyform->bussiness_type = $request->bussiness_type;
        $surveyform->bussiness_year = $request->bussiness_year;
        $surveyform->one = $request->one;
        $surveyform->two_data = $request->two['data'];
        $surveyform->two_extra = $request->two['extra'];
        $surveyform->three = $request->three;
        $surveyform->four_data = $request->four['data'];
        $surveyform->four_extra = $request->four['extra'];
        $surveyform->five = $request->five;
        $surveyform->six_data = $request->six['data'];
        $surveyform->six_extra = $request->six['extra'];
        $surveyform->seven = $request->seven;
        $surveyform->eight = $request->eight;
        $surveyform->nine = $request->nine;
        $surveyform->ten_data = $request->ten['data'];
        $surveyform->ten_extra = $request->ten['extra'];
        $surveyform->eleven = $request->eleven;
        $surveyform->twelve_data = $request->twelve['data'];
        $surveyform->twelve_extra = $request->twelve['extra'];
        $surveyform->thirteen_data = $request->thirteen['data'];
        $surveyform->thirteen_extra = $request->thirteen['extra'];
        $surveyform->forteen_data = $request->forteen['data'];
        $surveyform->forteen_extra = $request->forteen['extra'];
        $surveyform->fifteen = $request->fifteen;
        $surveyform->sixteen_data = $request->sixteen['data'];
        $surveyform->sixteen_extra = $request->sixteen['extra'];

        $surveyform->save();

        return ['message' => 'Updated the user info'];
    }


    public function destroy($id)
    {
        $surveyform = SurveyForm::findOrFail($id);
        $surveyform->delete();
        return ['message' => 'User Deleted'];
    }
}
