<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Console\View\Components\Alert;
use Symfony\Component\HttpFoundation\Response;

class OperatorController extends Controller
{
    public function operatorList(){
        return view('pages.admin.operators');
    }
    

    // Method for getting all bus data
    public function getAllOperators(){
        $operatorData = User::where('role',2)->get();
        return response()->json($operatorData);
    }
    public function operatorCreate(Request $request){
        try {
            $createBus = User::create([
                'name' => $request->input('operatorName'),
                'email' => $request->input('operatorEmail'),
                'role'=>2,
            ]);

            if($createBus){
                return response()->json([
                    'status' => 'success',
                    'message' => 'Operator Created Successfully',
                ]);
            } else{
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Something went wrong',
                ]);
            }  
        } catch (\Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'.$e->getMessage(),
            ]);
        }
    }
    public function operatorData(Request $request){
        try {
            $operator= User::where('id', $request->input('id'))->get();

            if ($operator) {
                return response()->json([
                    'status' => 'success',
                    'operator' => $operator,
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Bus not found'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong '.$e->getMessage()
            ]);
        }
    }

    public function operatorUpdate(Request $request){
        try {
            $operator_id = $request->input('id');
            $operator= User::where('id',$operator_id)->first();

            if ($operator) {
                $operator->name = $request->input('operator_name');
                $operator->email = $request->input('operator_email');
                $operator->save();

                return response()->json([
                    'status' => 'success',
                    'message' => 'Operator Updated Successfully'
                ]);
            } else {
                return response()->json([
                    'status' => 'failed',
                    'message' => 'Operator Not Found'
                ]);
            }
        } catch (\Exception $e) {
            return response()->json([
                'status' => 'failed',
                'message' => 'Somethig went wrong '.$e->getMessage()
            ]);
        }
        
    }

    public function deleteOperator(Request $request){
        try{
            $userDelete = User::where('id', $request->input('id'))->delete();
        
            if ($userDelete){
                return response()->json([
                    'status' => 'success', 
                    'message' => 'Operator deleted successfully'
                ]);
            }

            return response()->json([
                'status' => 'failed',
                'message' => 'Operator not found'
            ]);

        } catch(\Exception $e){
            return response()->json([
                'status' => 'failed',
                'message' => 'Something went wrong'
            ]);
        }
    }

}
