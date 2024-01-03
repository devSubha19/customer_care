<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\FetchedDataExport;

class ExcelController extends Controller
{
    public function exportData(Request $request)
    {
        $data = $request->result;

        return Excel::download(new FetchedDataExport($data), 'output_file.xlsx');
    }
}
