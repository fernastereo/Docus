<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\typedocument;

class ReportController extends Controller
{
    public function receivedDocuments(){
        $typedocuments = Typedocument::get();
        return view('reports.receiveddocuments', ['typedocuments' => $typedocuments]);
    }
}
