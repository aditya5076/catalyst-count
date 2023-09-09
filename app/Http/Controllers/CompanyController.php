<?php

namespace App\Http\Controllers;

use App\Company;
use App\Jobs\ProcessCSVFile;
use Illuminate\Http\Request;

class CompanyController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'file' => 'required|mimes:csv,txt|max:1024000', // 1GB limit
        ]);

        if ($request->hasFile('file')) {
            $file = $request->file('file');

            // Generate a unique filename for storage
            $filename = uniqid() . '.' . $file->getClientOriginalExtension();

            // Store the file in a temporary location
            $path =  $file->storeAs('csv', $filename, 'local');

            ProcessCSVFile::dispatch($filename);
        }

        return redirect()->to('/home')->with('success', 'You have successfully uploaded the file.');
    }

    public function index(Request $request)
    {

        $companies = Company::query();

        if ($request->has('name')) {
            $filter = $request->input('name');

            $columns = [
                'company_name',
                'domain',
                'year_founded',
                'industry',
                'size_range',
                'locality',
                'country',
                'linkedin_url',
                'current_employee_estimate',
                'total_employee_estimate'
            ];

            foreach ($columns as $column) {
                $companies->orWhere($column, 'LIKE', '%' . $filter . '%');
            }

            $count = count($companies->get());

            $companies = $companies->paginate(10);

            return view('index', compact('count', 'companies'));
        }

        $companies = Company::paginate(10);

        return view('index', compact('companies'));
    }
}
