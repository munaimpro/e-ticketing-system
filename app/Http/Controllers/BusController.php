<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Bus;
use App\Models\BusFare;
use App\Models\TicketSale;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Auth;

class BusController extends Controller
{


    //Method for bus list page
    public function busList(){
        return view('pages.admin.allbus');
    }

//  Bus fares start
    // Method for getting all bus data
    public function getAllBus(){
        $busData = Bus::all();
        Log::info('Request Result', ['bus_data' => $busData->toArray()]);
        return response()->json($busData);
    }
    public function getAllBusfares(){

        $busFares= BusFare::with('bus')->get();
        return response()->json($busFares);

    }

    public function busFaresCreate(Request $request){
        try {
            $createBusFares = BusFare::create([
                'bus_id' => $request->input('bus_id'),
                'boarding_point' => $request->input('boarding_point'),
                'boarding_time' => $request->input('boarding_time'),
                'dropping_point' => $request->input('dropping_point'),
                'dropping_time' => $request->input('dropping_time'),
                'fare' => $request->input('fare'),
            ]);

            if($createBusFares){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Bus Created Successfully',
                ]);
            } else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong',
                ]);
            }
        } catch (Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'.$e->getMessage(),
            ]);
        }
    }
    public function getFares(Request $request)
    {
        try {
            $busFares = BusFare::where('id', $request->input('id'))->first();
            //Log::info('Request Result', ['bus_fares' => $busFares->toArray()]);
            if ($busFares->count() > 0) {
                return response()->json([
                    'status' => 'success',
                    'busFare' => $busFares,
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Bus Fares not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong ' . $e->getMessage()
            ]);
        }
    }

    public function busFaresUpdate(Request $request){
        try {
            $bus_fares_id = (int) $request->input('id');

            // Fetch the BusFare instance by its primary key
            $busfare = BusFare::findOrFail($bus_fares_id);
            $count=$busfare->count();
            // Ensure $busfare is not a collection before updating
            if ( $count>0) {
                 // Update the BusFare model instance
                  $busfare->update([
                'bus_id' => $request->input('bus_id'),
                'boarding_point' => $request->input('boarding_point'),
                'boarding_time' => $request->input('boarding_time'),
                'dropping_point' => $request->input('dropping_point'),
                'dropping_time' => $request->input('dropping_time'),
                'fare' => $request->input('fare'),
            ]);

                return response()->json([
                    'status' => 'success',
                    'message' => 'Bus Fare Updated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Bus Fare Id Not Found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'Exception',
                'message' => 'Something went wrong: '.$e->getMessage()
            ]);
        }
    }

    // Method for bus creation
    public function busCreate(Request $request){
        try {
            $createBus = Bus::create([
                'coach_name' => $request->input('coach_name'),
                'coach_type' => $request->input('coach_type'),
                'total_seats' => $request->input('total_seats'),
                'user_id' => Auth::user()->id,
            ]);

            if($createBus){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Bus Created Successfully',
                ]);
            } else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong',
                ]);
            }
        } catch (Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'.$e->getMessage(),
            ]);
        }
    }


    // Method for getting single bus information by id

    public function getBus(Request $request){
        try {
            $bus = Bus::where('id', $request->input('id'))->get();

            if ($bus) {
                return response()->json([
                    'status' => 'success',
                    'bus' => $bus,
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Bus not found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong '.$e->getMessage()
            ]);
        }
    }
    // Method for update bus information by id

    public function busUpdate(Request $request){
        try {
            $bus_id = $request->input('id');
            $bus = Bus::find($bus_id);

            if ($bus) {
                $bus->coach_name = $request->input('coach_name');
                $bus->coach_type = $request->input('coach_type');
                $bus->total_seats = $request->input('total_seats');
                $bus->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Bus Updated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Bus Not Found'
                ]);
            }
        } catch (Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Somethig went wrong '.$e->getMessage()
            ]);
        }

    }
    // Method for delete single bus information by id

    public function deleteBus(Request $request){
        try{
            $busDelete = Bus::where('id', $request->input('id'))->delete();

            if ($busDelete){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Bus deleted successfully'
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'message' => 'Bus not found'
            ]);

        } catch(Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }
    }


}
