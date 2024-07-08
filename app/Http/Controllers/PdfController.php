<?php

namespace App\Http\Controllers;

use App\Models\TicketSale;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
class PdfController extends Controller
{
    public function pdfGenerate(Request $request)
    {

        $id = $request->query('id');

        $ticketSale = TicketSale::with('bus')->findOrFail($id);
        $html = view('components.pdf-genetate.bookingPdf', compact('ticketSale'))->render();

    $dompdf = new Dompdf();

    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'portrait');

    $dompdf->render();

    return $dompdf->stream('BooakingId:' . $id . '.pdf');
    }

}
