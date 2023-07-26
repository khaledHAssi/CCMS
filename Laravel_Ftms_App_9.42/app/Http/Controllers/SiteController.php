<?php

namespace App\Http\Controllers;

use App\Models\Application;
use App\Models\AvailableTime;
use App\Notifications\AppliedNotification;
use App\Models\Company;
use App\Models\User;
use App\Models\Course;
use App\Models\EvaluationAnswer;
use App\Models\Expert;
use App\Models\Payment;
use App\Models\Report;
use Exception;
use Illuminate\Contracts\Database\Eloquent\Builder;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class SiteController extends Controller
{
    public function index()
    {

        //---------------------------------------------------------------------------------
        $companies = Company::whereHas('courses', function (Builder $query) {
            $query->whereDate('start_date', '>=', date('Y-m-d'));
            // عشان يعرض  الشركات اللي دوراتها ما بدت او اليوم بتبدا
        })->latest('id')->get();
        $counts = [
            'coursesCount' => Course::where('status', 0)->count(),
            'studentsCount' => User::where('type', 'student')->count(),
            'companiesCount' => Company::count(),
            'expertsCount' => Expert::count(),
        ];
        $experts = Expert::whereHas('AvailableTimes', function (Builder $query) {
            $query->where('status', 0)->whereDate('date', '>=', date('Y-m-d'));
        })->latest('id')->get();
        //---------------------------------------------------------------------------------
        //{{-- Wanna Add Social media to expert cards  --}}
        return view('site.index', compact('companies', 'experts', 'counts'));
    }

    public function company($slug)
    {
        $company = Company::with('courses')->whereSlug($slug)->firstOrFail();
        $studentEvaluations = Auth::user()->evaluationAnswers->pluck('evaluation_id');
        // --------------------------------
        $evaluations = $company->company_evaluations()
            ->whereDate('start_date', '<=', date('Y-m-d'))
            ->whereDate('end_date', '>', date('Y-m-d'))
            ->whereNotIn('evaluations.id', $studentEvaluations)
            ->get();

        // dd($company, $studentEvaluations, $evaluations);
        return view('site.companies.company', compact(['company', 'evaluations']));
    }

    public function company_evaluation(Request $request)
    {
        $evaluationAnswer = new EvaluationAnswer();
        $evaluationAnswer->evaluation_id = $request->evaluation_id;
        $evaluationAnswer->company_id = $request->company_id;
        $evaluationAnswer->user_id = Auth::id();
        $evaluationAnswer->rate = $request->rate;
        $evaluationAnswer->note = $request->note;
        $saved = $evaluationAnswer->save();
        if($saved){
            return redirect()->back()->with('msg', 'The company has been successfully evaluated')->with('type', 'success');
        }else{
            return redirect()->back()->with('msg', 'The company has not been evaluated')->with('type', 'warning');
        }
    }


    public function companies()
    {
        $companies = Company::select('id', 'name', 'description', 'slug', 'image')->get();
        $companies = $companies->load('courses');


        return view('site.companies.index', compact('companies'));
    }

    public function course($id)
    {
        $course = Course::findOrFail($id);
        return view('site.courses.course', compact('course'));
    }
    public function courses()
    {
        $courses = Course::all();
        return view('site.courses.courses', compact('courses'));
    }
    public function course_apply(Request $request, $id)
    {
        $application = Application::create([
            'company_id' => $request->company_id,
            'user_id' => $request->user()->id,
            'course_id' => $id,
            'reason' => $request->reason
        ]);
        $user = User::where('company_id', $request->company_id)->first();
        $user->notify(new AppliedNotification($application));
        return redirect()->back()->with('msg', 'Your application has been submitted successfully');
    }

    public function expert($id)
    {
        $expert = Expert::findOrFail($id);
        return view('site.experts.expert', compact('expert'));
    }
    public function experts()
    {
        $experts = Expert::all();
        $experts = $experts->load('availableTimes');
        return view('site.experts.index', compact('experts'));
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
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_POST, 1);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);
        $id = $responseData['id'];

        return view('site.experts.book_time', compact('time', 'id'));
    }

    public function book_time_status(Request $request, $time_id)
    {
        // dd($request->all());
        $time = AvailableTime::findOrFail($time_id);

        $resourcePath = $request->resourcePath;

        $url = "https://eu-test.oppwa.com$resourcePath";
        $url .= "?entityId=8a8294174b7ecb28014b9699220015ca";

        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL, $url);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array(
            'Authorization:Bearer OGE4Mjk0MTc0YjdlY2IyODAxNGI5Njk5MjIwMDE1Y2N8c3k2S0pzVDg='
        ));
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, 'GET');
        curl_setopt($ch, CURLOPT_SSL_VERIFYPEER, false); // this should be set to true in production
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $responseData = curl_exec($ch);
        if (curl_errno($ch)) {
            return curl_error($ch);
        }
        curl_close($ch);
        $responseData = json_decode($responseData, true);

        $id = $responseData['id'];
        $amount = $responseData['amount'];
        $code = $responseData['result']['code'];

        if ($code == '000.100.110') {

            DB::beginTransaction();
            try {
                AvailableTime::find($time_id)->update(['status' => 1]);

                // send notification to expert
                if (Auth::user()) {
                    Payment::create([
                        'user_id' => Auth::id(),
                        'time_id' => $time_id,
                        'total' => $amount,
                        'transaction_id' => $id
                    ]);
                } else {
                    return redirect('login');
                }

                DB::commit();
            } catch (Exception $e) {

                DB::rollBack();
                throw new Exception($e->getMessage());
            }
            return redirect()->route('site.expert', $time->expert_id)->with('msg', 'Session Booked Successfully');
        } else {
        }
    }

    public function course_cancel($id)
    {
        Application::destroy($id);
        return redirect()->back()->with('msg', 'Course Canceled Successfully');
    }

    public function site_profile()
    {
        $user = User::with(['student_courses', 'profile', 'payments', 'payments.availableTime', 'payments.availableTime.expert'])
            ->findOrFail(Auth::id());
        return view('site.profile', compact('user'));
    }
    public function authError()
    {
        return view('auth.error');
    }
    public function contact()
    {
        return view('site.contact');
    }
    public function store_contact(Request $request)
    {
        // 'image' => 'nullable|required_if:type,doctor,companyManager|mimes:jpg,png',
        // $validator = validator($request->all(), [
        $request->validate([
            'name' => 'required|string|min:3|max:20',
            'email' => 'required|string|email',
            'description' => 'required|string|min:10',
            'type' => 'required',
            "link" =>  $request->input('type') !==  'companyManager' || $request->input('type') ==  'doctor' ? 'nullable' : 'required|url',
            'hour_price' => $request->input('type') !==  'doctor' ? 'nullable' : 'required|int',
            'image' => $request->input('type') !==  'companyManager' || $request->input('type') ==  'doctor' ? 'nullable' : 'required|mimes:jpg,png',
            'content' => $request->input('type') !==  'companyManager' || $request->input('type') ==  'doctor' ? 'nullable' : 'required|file|mimes:pdf,doc,docx,txt',
        ]);

        $report = new Report();
        if (Auth::user() != null) {
            $report->user_id = Auth::user()->id;
        }
        $report->name = $request->input('name');
        $report->email = $request->input('email');
        $report->description = $request->input('description');
        $report->type = $request->input('type');

        // if ($request->input('type') == 'companyManager' || $request->input('type') == 'doctor') {
        if (in_array($report->type, ['companyManager', 'doctor'])) {

            $report->link = $request->input('link');
            if ($request->type == 'doctor') {
                $report->hour_price = $request->input('hour_price');
            }
            if ($request->hasFile('image')) {
                $reportImg = $request->file('image');
                $imageName = time() . '_image' . $report->name . '.' . $reportImg->getClientOriginalExtension();
                $reportImg->storePubliclyAs('reports/images', $imageName, ['disk' => 'public']);
                $report->image = 'imgReports/' . $imageName;
            }
            if ($request->hasFile('content')) {
                $reportContent = $request->file('content');
                $contentName = time() . '_content' . $report->name . '.' . $reportContent->getClientOriginalExtension();
                $reportContent->storePubliclyAs('reports/files', $contentName, ['disk' => 'public']);
                $report->content = 'filesReports/' . $contentName;
            }
        }

        $saved = $report->save();
        if ($saved) {
            return redirect()->back()->with('msg', 'submitted Successfully')->with('type', 'success');
        } else {
            return redirect()->back()->with('msg', 'submitted Failed')->with('type', 'warning');
        }
    }
}
