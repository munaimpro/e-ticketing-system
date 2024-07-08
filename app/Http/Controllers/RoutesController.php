<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use Illuminate\Http\Request;
use Psy\Readline\Hoa\Console;
use Symfony\Component\HttpFoundation\Response;

class RoutesController extends Controller
{
    public function index()
    {
        return view('pages.admin.allroutes');
    }

    function show()
    {
        $route = BusRoute::orderBy('id', 'desc')->get();
        return response()->json($route);
        // return response($operator);
    }
    // delete
    public function delete($id)
    {
        // Find the route by ID
        $route = BusRoute::findOrFail($id);
        $route->delete();
        return response()->json(['message' => 'Route deleted successfully'], 204);
    }

    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required',
        ]);

        $route = BusRoute::create($validation);
        return response()->json($route);
    }
    function getRouteId($id){
        $busRoute = BusRoute::findOrFail($id);
        return response()->json($busRoute);
    }
        public function update(Request $request, $id){
            $busRoute = BusRoute::findOrFail($id);

            $validatedData = $request->validate([
                'name' => 'required',
            ]);

            $busRoute->update($validatedData);
            return response()->json($busRoute);
        }

}
