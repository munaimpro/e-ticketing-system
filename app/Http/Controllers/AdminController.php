<?php

namespace App\Http\Controllers;

use Exception;
use Carbon\Carbon;
use App\Models\Bus;
use App\Models\User;
use App\Models\Booking;
use App\Models\BusFare;
use App\Models\BusRoute;
use App\Models\TicketSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function index()
    {
        // Getting dashboard information
        $totalCustomer = User::where('role', 2)->count();
        $totalAdmin = User::where('role', 1)->count();
        $totalOperator = User::where('role', 3)->count();
        $totalBus = Bus::count();
        $totalRoute = BusRoute::count();
        $totalBooking = TicketSale::sum('seat');
        $totalSeat = Bus::sum('total_seats');
        $availableSeat = $totalSeat - TicketSale::sum('seat');
        $todaysSales = TicketSale::whereDate('created_at', '=', Carbon::today())->sum('seat');
        // this month
        $totalSalesThisMonth = TicketSale::whereMonth('created_at', '=', Carbon::now()->month)->sum('seat');
        // week
        $toalSalesThisWeek = TicketSale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('seat');
        // total
        $totalSales = TicketSale::sum('seat');

        //total revenue
        $totalRevenue = TicketSale::sum('amount');
        //revenue this month
        $revenueThisMonth = TicketSale::whereMonth('created_at', '=', Carbon::now()->month)->sum('amount');
        //revenue this week
        $revenueThisWeek = TicketSale::whereBetween('created_at', [Carbon::now()->startOfWeek(), Carbon::now()->endOfWeek()])->sum('amount');
        //revenue today
        $revenueToday = TicketSale::whereDate('created_at', '=', Carbon::today())->sum('amount');



        // return response()->json([
        //     'totalCustomer' => $totalCustomer,
        //     'totalAdmin' => $totalAdmin,
        //     'totalBus' => $totalBus,
        //     'totalRoute' => $totalRoute,
        //     'totalBooking' => $totalBooking,
        //     'totalSeat' => $totalSeat,
        //     'availableSeat' => $availableSeat,
        //     'todaysSales' => $todaysSales,
        // ]);

        if (Auth::user()->role == 1 ||  Auth::user()->role == 2) {
            return view('pages.admin.dashboard', compact(['totalCustomer', 'totalAdmin','totalOperator', 'totalBus', 'totalRoute', 'totalBooking', 'totalSeat', 'availableSeat', 'todaysSales', 'totalSalesThisMonth', 'toalSalesThisWeek', 'totalSales', 'totalRevenue','revenueThisMonth','revenueThisWeek','revenueToday']));
        } else {
            return redirect()->route('purchase_history');
        }
    }

    public function purchaseHistory()
    {
        $id = Auth::user()->id;
        $getTicketInfo = TicketSale::where('user_id', $id)->get();
        return view('pages.purchase_history', compact('getTicketInfo'));
    }
    // Ticket Salse History
    public function TicketSale()
    {
        try {
            // Getting ticket salese history with user and bus details
            $ticketSaleHistory = TicketSale::with('user', 'bus')->get();

            if ($ticketSaleHistory) {
                return response()->json([
                    'sale' => $ticketSaleHistory
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong' . $e->getMessage()
            ]);
        }
    }

    // Ticket Booking List
    public function TicketBookingList()
    {
        try {
            // Getting ticket salese history with user and bus details
            $ticketBookingList = Booking::with('user', 'bus')->get();

            if ($ticketBookingList) {
                return response()->json([
                    'bookings' => $ticketBookingList
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong' . $e->getMessage()
            ]);
        }
    }

    // Booking page
    public function BookingsPage()
    {
        return view('pages.admin.bookings');
    }

    // Salse History page
    public function SalseHistoryPage()
    {
        return view('pages.admin.salse-history');
    }
    //sales history this month


}
