<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\Request;

class CompanyController extends Controller
{
    public function index()
    {
        return view('companies.index', [
            'companies' => Company::latest()->get()
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ]);

        Company::create($request->only([
            'name',
            'vat_number',
            'registration_number',
            'address',
            'currency'
        ]));

        return response()->json([
            'message' => 'Company berhasil ditambahkan'
        ]);
    }

    public function show(Company $company)
    {
        return response()->json($company);
    }

    public function update(Request $request, Company $company)
    {
        $request->validate([
            'name' => 'required'
        ]);

        $company->update($request->only([
            'name',
            'vat_number',
            'registration_number',
            'address',
            'currency'
        ]));

        return response()->json([
            'message' => 'Company berhasil diupdate'
        ]);
    }

    public function destroy(Company $company)
    {
        $company->delete();

        return response()->json([
            'message' => 'Company berhasil dihapus'
        ]);
    }
}