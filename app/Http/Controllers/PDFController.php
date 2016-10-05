<?php

namespace App\Http\Controllers;

use App\Campus;
use App\Course;
use App\Event;
use App\Faculty;
use App\Student;
use App\User;
use Illuminate\Support\Facades\Auth;
use PhpParser\PrettyPrinter\Standard;

class PDFController extends Controller
{
    public function invoice() 
    {
        $data = $this->getData();
        $date = date('Y-m-d');
        $invoice = "2222";
        $view =  \View::make('pdf.invoice', compact('data', 'date', 'invoice'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);
        return $pdf->stream('invoice');
    }
 
    public function getData() 
    {
        $data =  [
            'quantity'      => '1' ,
            'description'   => 'some ramdom text',
            'price'   => '500',
            'total'     => '500'
        ];
        return $data;
    }

    public function pdfEvento($event_id) 
    {
        $evento = Event::where('id', $event_id)->first();
        $view =  \View::make('pdf.eventoPDF', compact('evento'))->render();
        $pdf = \App::make('dompdf.wrapper');
        $pdf->loadHTML($view);

        return $pdf->stream('eventoPDF');
    }
}