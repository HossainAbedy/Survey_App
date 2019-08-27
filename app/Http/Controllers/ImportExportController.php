<?php

namespace App\Http\Controllers;

use App\Exports\SurveyFormExport;
use App\Imports\SurveyFormImport;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Http\Request;
use Session;
use Mail;

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
        Session::flash('message-download', 'Your document has been downloaded!');
        return Excel::download(new SurveyFormExport, 'SurveyFormExport.xlsx');
        // return redirect()->back()->with('flash_success', 'Your document has been downloaded.');
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import()
    {
        Excel::import(new SurveyFormImport, request()->file('file'));

        return back();
    }

    public function uploadDocument(Request $request) {
        $title = $request->file('title');

        // Get the uploades file with name document
        $document = $request->file('document');

        // Required validation
        $request->validate([
            'title' => 'required|max:255',
            'document' => 'required'
        ]);

        // Check if uploaded file size was greater than
        // maximum allowed file size
        if ($document->getError() == 1) {
            $max_size = $document->getMaxFileSize() / 1024 / 1024;  // Get size in Mb
            $error = 'The document size must be less than ' . $max_size . 'Mb.';
            return redirect()->back()->with('flash_danger', $error);
        }

        $data = [
            'document' => $document
        ];

        // If upload was successful
        // send the email
        $to_email = 'abedy.ewu@gmail.com';
        \Mail::to($to_email)->send(new \App\Mail\Upload($data));
        Session::flash('message-gmail', 'Your document has been sent to admin!');
        return redirect()->back()->with('flash_success', 'Your document has been sent to admin!');
    }

    public function sendgmail(Request $request)
    {
        $data = array('name'=>"Hardik Parsania", "body" => "Gmail from Laravel");
        $files = $request->file('files');
        Mail::send('gmailview', $data, function($message) use($data, $files) {
            $message->to('abedy.ewu@gmail.com', 'John Doe')
            ->subject('From Laravel With Gmail');
            $message->from('abedy.ewu@gmail.com',' Jesal Mithani');
            if(count($files > 0)) {
                foreach($files as $file) {
                    $message->attach($file->getRealPath(), array(
                        'as' => $file->getClientOriginalName(), // If you want you can chnage original name to custom name
                        'mime' => $file->getMimeType())
                    );
                }
            }
          });

          if (Mail::failures()) {
            return response()->Fail('Sorry! Please try again latter');
          }else{
            return response()->json('Yes, You have sent email to GMAIL from LARAVEL 5.8 !!');
          }
   }
}
