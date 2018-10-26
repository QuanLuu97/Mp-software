<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Http\Requests\CompanyFormRequest;
use App\Http\Controllers\Controller;

class CompanyController extends Controller
{
    //
    public function index ()
    {
        $companies = Company::all();

        return view('admin.companies.index', compact('companies'));
    }

    public function create ()
    {
        return view('admin.companies.create');
    }

    public function store (CompanyFormRequest $request)
    {
        Company::createCompany($request);

        return redirect()->back()->with('status', __('key.created') );
    }

    public function edit ($id)
    {
        $company = Company::findOrFail($id);

        return view('admin.companies.edit', compact('company') );
    }

    public function update (CompanyFormRequest $request, $id)
    {
        Company::updateCompany($request, $id);

        return redirect()->back()->with('status', __('key.updated') );
    }

     public function delete ($id)
    {
        Company::deleteCompany($id);

        return redirect()->route('companies')->with('status', __('key.deleted') );
    }
}
