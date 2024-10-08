<?php

namespace App\Http\Controllers;

use App\Models\Warehouse;
use Illuminate\Http\Request;

class WarehouseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $warehouse = Warehouse::all();
        return $warehouse;
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            "name"=>"required|string",
        ]);

        $validated["department_id"]=auth()->user()->department_id;
        $warehouses = Warehouse::create($validated);
        return $warehouses;
    }



    /**
     * Display the specified resource.
     */
    public function show(Warehouse $warehouse)
    {
        return $warehouse;
    }

    public function restore($id)
    {
        $warehouse = Warehouse::withTrashed()->find($id);
        $warehouse->restore();
        return $warehouse;

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Warehouse $warehouse)
    {
        $validated = $request->validate([
            "name"=>"required|string",
            ]);
            $warehouse -> update($validated);
            return $warehouse;
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Warehouse $warehouse)
    {
        $warehouse ->delete();
        return response()->json([
            "message"=> "Successfully Deleted"
            ]);
    }
}
