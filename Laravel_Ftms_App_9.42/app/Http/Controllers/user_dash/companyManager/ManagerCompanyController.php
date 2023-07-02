<?php

namespace App\Http\Controllers\user_dash\companyManager;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use App\Http\Requests\CompanyRequest;
use Illuminate\Support\Facades\File;
use App\Models\Company;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ManagerCompanyController extends Controller
{
    public function index()
    {
        $company = Company::findOrFail(Auth::user()->company_id);
        //زي متغير عملها بالenv
        return response()->view('user_dash.companyManager.index' , compact('company'));
    }

    // public function master()
    // {
    //     return view('user_dash.companyManager.master');
    // }


    public function edit($id)
    {
        $company = Company::find($id);

        return view('user_dash.companyManager.edit' , compact('company'));
    }

    public function create(){}
    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, $id)
    {
        $company = Company::findOrFail($id);

        $path = $company->image;
        if($request->hasFile('image')) {
            File::delete(public_path($company->image));
            $path = $request->file('image')->store('/uploads', 'custom');
        }

        $company->update([
            'name' => $request->name,
            'image' => $path,
            'description' => $request->description,
            'location' => $request->location,
        ]);
        return redirect()->route('user_dash.cmCompany.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }



}
