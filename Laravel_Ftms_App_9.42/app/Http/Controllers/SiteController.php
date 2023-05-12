<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\AppliedEvaluation;
use App\Models\AvailableTime;
use App\Notifications\AppliedNotification;
use App\Models\Company;
use App\Models\User;
use App\Models\Course;
use App\Models\Evaluation;
use App\Models\Expert;
use App\Models\Payment;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {
        // $companies = Company::whereHas('courses')->latest('id')->get();
        // $companies = Company::all();

        //---------------------------------------------------------------------------------
        $companies = Company::whereHas('courses', function(Builder $query) {
            $query->whereDate('start_date', '>=', date('Y-m-d') );
            // عشان يعرض  الشركات اللي دوراتها ما بدت او اليوم بتبدا
        })->latest('id')->get();

        $experts = Expert::whereHas('available', function(Builder $query) {
            $query->where('status', 1 )->whereDate('date', '>=', date('Y-m-d') );
        })->latest('id')->get();
        //---------------------------------------------------------------------------------
        // $experts = DB::select("select * from experts");
        // })->latest('id')->dd();

        // dd($experts);
        return view('site.index', compact('companies', 'experts'));
        // return view('site.index');
    }

    // public function company($slug)
    public function company($id)
    {
        // $company = Company::with('courses')->whereSlug($slug)->firstOrFail();
        // return view('site.company', compact('company'));
        $company = Company::with('courses')->findOrFail($id);
        return view('site.company', compact('company'));
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('site.course', compact('course'));
    }

    public function course_apply(Request $request, $id)
    {
        // dd($request->all());
        $application = Application::create([
            'company_id' => $request->company_id,
            'user_id' => $request->user()->id,
            'course_id' => $id,
            'reason' => $request->reason
        ]);

        $user = User::where('company_id', $request->company_id)->first();

        // dd($user);
        // dd($request->company_id);
        // dd($application);

        $user->notify( new AppliedNotification($application) );

        return redirect()->back()->with('msg', 'Your application has been submitted successfully');
    }

    public function expert($id)
    {
        $expert = Expert::findOrFail($id);

        return view('site.expert', compact('expert'));
    }

    public function book_time(Request $request)
    {
        $time = AvailableTime::findOrFail($request->time_id);

        // dd($time->price ? $time->price : $time->expert->hour_price);
        $amount = $time->price ? $time->price : $time->expert->hour_price;

        $url = "https://eu-test.oppwa.com/v1/checkouts";
        $data = "entityId=8a8294174b7ecb28014b9699220015ca" .
                    "&amount=$amount" .
                    "&currency=USD" .
                    "&paymentType=DB";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
                    'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if(curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $id = $responseData['id'];

        return view('site.book_time', compact('time', 'id'));

    }

    // public function book_time_status(Request $request, $time_id)
    // {
    //     // dd($request->all());
    //     $time = AvailableTime::findOrFail($time_id);

    //     $resourcePath = $request->resourcePath;

    //     $url = "https://eu-test.oppwa.com$resourcePath";
    //     $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

    //     $ch = curl_init();
    //     curl_setopt($ch, CURLOPT_URL, $url);
    //     curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    //                 'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='));
    //     curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
    //     curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false);// this should be set to true in production
    //     curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    //     $responseData = curl_exec($ch);
    //     if(curl_errno($ch)) {
    //         return curl_error($ch);
    //     }
    //     curl_close($ch);
    //     $responseData = json_decode($responseData, true);

    //     $id = $responseData['id'];
    //     $amount = $responseData['amount'];
    //     $code = $responseData['result']['code'];

    //     if($code == '000.100.110') {

    //         DB::beginTransaction();
    //         try {
    //             AvailableTime::find($time_id)->update(['status' => 0]);

    //             // send notifation to expert

    //             Payment::create([
    //                 'user_id' => Auth::id(),
    //                 'time_id' => $time_id,
    //                 'total' => $amount,
    //                 'transaction_id' => $id
    //             ]);

    //             DB::commit();
    //         }catch(Exception $e) {

    //             DB::rollBack();
    //             throw new Exception($e->getMessage());
    //         }

    //         return redirect()->route('ftms.expert', $time->expert_id)->with('msg', 'Session Booked Successfully');

    //     }else {

    //     }
    // }

    // public function course_cancel($id)
    // {
    //     Application::destroy($id);
    //     return redirect()->back()->with('msg', 'Course Canceld Successfully');
    // }

    // public function evaluation($id)
    // {
    //     $evaluation = Evaluation::findOrFail($id);

    //     // if( date('d-m-Y') > '04-12-2022' ) {
    //     //     dd('Expire');
    //     // }

    //     if($evaluation->type != Auth::user()->type && Auth::user()->type != 'super-admin') {
    //         abort(403, 'You are not Authorize');
    //     }

    //     // dd(Auth::user());

    //     return view('site.evaluation', compact('evaluation'));
    // }

    // public function evaluation_applied(Request $request, $id)
    // {
    //     // dd($request->all());
    //     AppliedEvaluation::create([
    //         'user_id' => Auth::id(),
    //         'evualtion_id' => $id,
    //         'data' => json_encode($request->answer)
    //     ]);

    //     return redirect()->route('ftms.index');
    // }

}
