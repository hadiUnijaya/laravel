<?php

namespace App\Http\Controllers;
use DB;
use Illuminate\Http\Request;
use App\Imports\CsvImport;
use Maatwebsite\Excel\Facades\Excel;

use App\Post;

class importController extends Controller
{
    public function index()
    {
        
        $data = DB::table('posts')->orderBy('id','DESC')->get();
        return view('posts.importexcel', compact('data'));
    }

    function import(Request $request)
    {
        $this->validate($request, [
        'select_file'  => 'required|mimes:xls,xlsx'
        ]);

        $path1 = $request->file('select_file')->store('temp'); 
        $path=storage_path('app').'/'.$path1;  
        $data = \Excel::import(new CsvImport,$path);
        
        return back()->with('success', 'Excel Data Imported successfully.');
    }
}

