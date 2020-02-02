<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class Pdfs extends Model
{
    public static function createPDF($pdfName)
    {
        $pdfs = DB::table('pdfs')->insert(['pdf' => $pdfName]);
        return $pdfs;
    }
}
