<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateCompanyRequest;
use App\Http\Requests\UpdateCompanyRequest;
use App\Http\Resources\CompanyResource;
use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function dashboard()
    {
        $companies = Company::all();

        return view("dashboard",compact("companies"));
    }

    public function create()
    {
        return view('company-create');
    }

    public function store(CreateCompanyRequest $request)
    {
        $company = Company::create($request->all());

        if ($request->hasFile('logo')) {
            $imagePath = $request->file('logo')->store('logos', 'public');
            $company->logo = $imagePath;
            $company->save(); 
        }

        return redirect()->route('dashboard')->with('success', 'Doctor created successfully!');
    }

    public function show(Company $company)
    {
        return view('company-show', compact('company'));
    }

    public function showapi(Company $company)
    {
        return $this->successResponse('Company retrieved succesfully', new CompanyResource($company));
    }

    public function update(UpdateCompanyRequest $request, Company $company)
    {
        $company->update($request->all());

        return $this->successResponse('Company detail updated',new CompanyResource($company));
    }

    public function destroy(Company $company){
        $company->delete();

        return $this->successResponse('Company deleted succesfully');
    }
}
