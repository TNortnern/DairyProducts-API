<?php

namespace App\Http\Controllers;

use App\Pdfs;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PdfsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $pdfs = DB::table('pdfs')->orderBy('id', 'desc')->first()->pdf;
        return response()->json($pdfs);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
 
        $file = $request->file('pdf');
        $id = uniqid();
        $name = $id . $file->getClientOriginalName();
        $path = $file->move(public_path('/uploads'), $name);
        $pdfname = $name;
        // return $pdfname;
        // $pdfs = DB::table('pdfs')->insert(['pdf' => $pdfName]);
        $pdfCreate = Pdfs::createPDF($pdfname);
        return response()->json($pdfCreate);
    }


    public function download()
    {
        $pdf = DB::table('pdfs')->orderBy('id', 'desc')->first()->pdf;
        $file= public_path(). "/uploads/$pdf";
        $headers = [
            'Content-Type' => 'application/pdf',
         ];

        return response()->download($file, $pdf, $headers);
    }

    public function update(Request $request, Pdfs $pdfs)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Pdfs  $pdfs
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pdfs $pdfs)
    {
        //
    }
}
