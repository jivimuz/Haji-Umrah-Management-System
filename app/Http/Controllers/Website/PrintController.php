<?php

namespace App\Http\Controllers\Website;

use App\Http\Controllers\Controller;
use App\Models\Payment;
use PDF;
use Illuminate\Http\Request;

class PrintController extends Controller
{
    public function kwitansi($id)
    {
        $decodedId = base64_decode($id);

        if ($decodedId === false) {
            echo "Error Unique code";
        }

        $id =  htmlspecialchars($decodedId, ENT_QUOTES, 'UTF-8');
        $data = Payment::select(['t_payment.*', 't_jamaah.nama as jamaah', 'm_paket.nama as paket'])
            ->join('t_jamaah', 't_jamaah.id', 't_payment.jamaah_id')
            ->join('m_paket', 'm_paket.id', 't_jamaah.paket_id')
            ->where('t_payment.id', $id)
            ->orderBy('id', 'desc')->first();

        $pdf = PDF::loadView('print/kwitansi', array('data' =>  $data))
            ->setPaper('a5', 'landscape');

        return $pdf->stream();
    }
}
