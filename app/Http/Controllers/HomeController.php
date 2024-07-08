<?php

namespace App\Http\Controllers;

use App\Models\AvailableSeat;
use App\Models\BusFare;
use Illuminate\Http\Request;
use App\Models\BusRoute;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\Booking;
use App\Models\TicketSale;
use App\Models\Payment;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
     $busStops = BusRoute::pluck('name');

    return view('pages.home', compact('busStops'));

    }
    public function busInformation(Request $request)
    {
        // Your logic to handle the form submission goes here
        $busStops = BusRoute::pluck('name');
        // You can access form data like this:
        $from = $request->input('from');
        $to = $request->input('to');
        $doj = $request->input('doj');

        $dhakaTime = Carbon::now('Asia/Dhaka');
        // Format the time as 'H:i:s'
        $formattedDhakaTime = $dhakaTime->format('H:i:s');
       //dd($formattedDhakaTime);

        $busInfoResults = DB::table('buses')
        ->join('bus_fares', 'buses.id', '=', 'bus_fares.bus_id')
        //->join('bus_info', 'buses.id', '=', 'bus_info.id') // Adjust based on your actual relationship
        ->where('bus_fares.boarding_point', $from)
        //->where('bus_fares.boarding_time', $formattedDhakaTime)
        ->where('bus_fares.dropping_point', $to)
        ->select('buses.*', 'bus_fares.*')
        ->get();
        // Seats Available
        $total_ticket_sold = DB::table('ticket_sales')
        ->where('doj', $doj)
        ->sum('seat');

        //dd ( $busInfoResults);
         $total_no = $busInfoResults->count();

         return view('pages.bus_details', compact('busStops','busInfoResults', 'total_no', 'from', 'to', 'doj','total_ticket_sold'));
    } 

    public function all_buses_list()
    {
        $busStops = BusRoute::pluck('name');
        $dhakaTime = Carbon::now('Asia/Dhaka');
        // Format the time as 'H:i:s'
        $formattedDhakaTime = $dhakaTime->format('H:i:s');
       //dd($formattedDhakaTime);

        $busInfoResults = DB::table('buses')
        ->join('bus_fares', 'buses.id', '=', 'bus_fares.bus_id')
        //->join('bus_info', 'buses.id', '=', 'bus_info.id') // Adjust based on your actual relationship
        ->select('buses.*', 'bus_fares.*')
        ->get();
        //dd($busInfoResults);
        // Seats Available
        $total_ticket_sold = DB::table('ticket_sales')
        ->sum('seat');

        //dd ( $busInfoResults);
         $total_no = $busInfoResults->count();

         return view('pages.all_bus_list', compact('busStops','busInfoResults', 'total_no','total_ticket_sold'));
    }
    public function seatsLayout(Request $request)
    {
        $bus_id=  $request->bus_id;
        $coach_name=  $request->coach_name;
        $type=  $request->coach_type;
        $boarding_point=  $request->boarding_point;
        $dropping_point=  $request->dropping_point;

        $doj=  $request->doj;
        $new_date=  $request->doj;
        $from=  $request->from;
        $to=  $request->to;
        $fare=  $request->fare;
        $available_seat=  $request->available_seat;
     //dd($request);
    //  $busStops = BusRoute::pluck('name');
        $sold_seats = [];

        $sold_seat_records = AvailableSeat::where('bus_id', $bus_id)
                                        ->where('doj', $doj)
                                        ->get();

        foreach ($sold_seat_records as $record) {
            $seats = json_decode($record->seats, true);
            $sold_seats = array_merge($sold_seats, $seats);
        }
    

    return view('pages.seat_layout_details', compact('bus_id','coach_name','type','boarding_point','dropping_point','new_date','doj','from','to','fare','available_seat','sold_seats'));

    }
   public function check_outTicket(Request $request)
{
    \Log::info('Received request:', ['request' => $request->all()]);

    // Encode the array to JSON
    $arraydSeatsJson = json_encode($request->arraydSeats);

    DB::beginTransaction();

    try {
        $ticket_sale = TicketSale::create([
            $id = Auth::user()->id,
            'user_id' => $id ,
            'bus_id' => $request->bus_id,
            'from' => $request->boarding_point,
            'to' => $request->dropping_point,
            'doj' => $request->doj,
            'seat' => $request->seats,
            'seats' => $arraydSeatsJson,
            'fare' => $request->seats_fare,
            'amount' => $request->total_fare,
        ]);

        $booking = Booking::create([
            'user_id' => 1,
            'bus_id' => $request->bus_id,
            'doj' => $request->doj,
            'seats' => $arraydSeatsJson,
        ]);

        $payment = Payment::create([
            'user_id' => 1,
            'bus_id' => $request->bus_id,
            'booking_id' => $booking->id,
            'payment_get' => $request->paymentGet,
            'transaction_id' => $request->transaction_id,
            'amount' => $request->total_fare,
        ]);
        $availableSeats = AvailableSeat::create([
            'bus_id' => $request->bus_id,
            'doj' => $request->doj,
            'seats' => $arraydSeatsJson,
        ]);

        DB::commit();

        return response()->json(['message' => 'Ticket checked out successfully'], 200);
    } catch (\Exception $e) {
        DB::rollBack();
        \Log::error('Error checking out ticket:', ['error' => $e->getMessage()]);
        return response()->json(['message' => 'Failed to check out ticket'], 500);
    }
}


    // New Added
    public function contactUs(){
        return view('pages.contact_us');
    } 
}
