<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use Illuminate\Http\Request;
use App\Models\Payment;
class PaymentController extends Controller
{
    public function index(){
        $paymentData = Payment::all();
        return response()->json($paymentData);
    }

    public function paymentUpdate(Request $request){
        try {
            $booking_id = $request->input('id');
            $booking = Booking::find($booking_id);
             // Correct way to find the payment record
            $payment = Payment::where('booking_id', $booking_id)->first();

            if ($booking && $payment) {
                $booking->status = $request->input('status');
                $booking->save();

                $payment->status = $request->input('status');
                $payment->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Payment Status Updated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Payment Status Not Found'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Somethig went wrong '.$e->getMessage()
            ]);
        }
        
    }

}
