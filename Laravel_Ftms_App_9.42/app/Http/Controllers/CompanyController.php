<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use App\Http\Requests\CompanyRequest;

class CompanyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $companies = Company::latest('id')->paginate(env('PAGINATION_COUNT'));
        //زي متغير عملها بالenv
        return view('admin.companies.index', compact('companies'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.companies.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CompanyRequest $request)
    {
        $path = $request->file('image')->store('/uploads', 'custom');

        // $slug = strtolower($request->name);
        // $slug = str_replace(' ', '-', $slug);

        $slug = Str::slug($request->name);

        $slugCount = Company::where('slug', 'like', $slug.'%')->count();

        if($slugCount > 0) {
            $slug = $slug . '-'.$slugCount;
        }

        Company::create([
            'name' => $request->name,
            'slug' => $slug,
            'image' => $path,
            'description' => $request->description,
            'location' => $request->location,
        ]);

        return redirect()->route('admin.companies.index')->with('msg', 'Company Created Successfully')->with('type', 'success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return $id;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Company $company)
    {
        // $company = Company::findOrFail($id);
        // dd($company);
        return view('admin.companies.edit')->with('company', $company);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CompanyRequest $request, Company $company)
    {
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

        return redirect()->route('admin.companies.index')->with('msg', 'Company Updated Successfully')->with('type', 'warning');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // File::delete(public_path())

        Company::destroy($id);
        return redirect()->route('admin.companies.index')->with('msg', 'Company Deleted Successfully')->with('type', 'danger');
    }

    /**
     * Display a trashed listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function trash()
    {
        $companies = Company::onlyTrashed()->latest('id')->paginate(env('PAGINATION_COUNT'));
        return view('admin.companies.trash', compact('companies'));
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function restore($id)
    {
        Company::onlyTrashed()->find($id)->restore();
        return redirect()->route('admin.companies.index')->with('msg', 'Company Restored Successfully')->with('type', 'info');
    }

    /**
     * Restore the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function forcedelete($id)
    {
        $company = Company::onlyTrashed()->find($id);
        File::delete(public_path($company->image));
        $company->forcedelete();
        return redirect()->route('admin.companies.trash')->with('msg', 'Company Deleted Permanently Successfully')->with('type', 'danger');
    }
}
