<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function filterFile(Request $request)
    {
        $request->validate([
            'csv_file' => 'required|mimes:csv'
        ]);

        $path = $request->file('csv_file')->getRealPath();
        $data = array_map('str_getcsv', file($path));

        for ($i = 1; $i < count($data); $i++) {
            $path = public_path('File/'.$data[$i][1].'.pdf');
            if(file_exists($path)){
                // if directory not exists then create new one
                if (!file_exists($data[$i][0])) {
                    mkdir($data[$i][0], 0777, true);
                }
                // copy pdf by company name folder
                copy($path, $data[$i][0].'/'.$data[$i][1].'.pdf');
                // unlink previous pdf from File folder
                unlink($path);
            }
        }

        session()->flash('message', 'CSV filtered successfully !');
        return back();
    }
}
