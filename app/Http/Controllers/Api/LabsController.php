<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\Building;
use App\Lab;

class LabsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $labs = DB::table('labs')
                    ->select('*')
                    ->orderBy('number_of_computers', 'DESC')
                    ->get();

        return $labs;
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $lab = Lab::create($request->all());
        return response($lab, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $lab = Lab::findOrFail($id);
        return $lab;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $lab = Lab::findOrFail($id);
        $lab->update($request->all());
        return response($lab, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $lab = Lab::findOrFail($id);
        $lab->delete();
        return response('Lab Deleted Successfully');
    }

    public function showBuildingLabs($building_id)
    {
        $building = Building::findOrFail($building_id);
        $labs = DB::table('buildings')
                    ->join('labs', 'buildings.building_id', '=', 'labs.building_id')
                    ->select('buildings.building_name', 'labs.*')
                    ->where('buildings.building_id', $building_id)
                    ->get();

        return $labs;
    }
}
