<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Company extends Model
{
    //
    protected $guarded = ['id'];

    public function scopeCreateCompany($query, $company)
    {
        Company::create([
            'name' => $company->get('name'),
            'phone' => $company->get('phone'),
            'email' => $company->get('email'),
            'address' => $company->get('address'),
        ]);
    }

    public function scopeUpdateCompany ($query, $request, $id)
    {
        $company = Company::findOrFail($id);
        $company->name = $request->get('name');
        $company->phone = $request->get('phone');
        $company->email = $request->get('email');
        $company->address = $request->get('address');
        $company->save();
    }

    public function scopeDeleteCompany($query, $id)
    {
        $company = Company::findOrFail($id);
        $company->delete();
    }
}
