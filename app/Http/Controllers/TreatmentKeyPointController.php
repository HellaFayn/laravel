<?php

namespace App\Http\Controllers;

use App\Models\TreatmentKeyPoint;
use App\Http\Requests\StoreTreatmentKeyPointRequest;
use App\Http\Requests\UpdateTreatmentKeyPointRequest;
use function PHPUnit\Framework\returnArgument;

class TreatmentKeyPointController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTreatmentKeyPointRequest $request)
    {
        $treatement_key_point = new TreatmentKeyPoint();
        $treatement_key_point->disease_id = $request->disease_id;
        $treatement_key_point->title = $request->title;
        $treatement_key_point->detailed_step = $request->detailed_step;

        $treatement_key_point->save();
        return $treatement_key_point;
    }

    /**
     * Display the specified resource.
     */


    public function showByDisease(int $disease_id)
    {
        $keypoints = TreatmentKeyPoint::where('disease_id', $disease_id)->get();

        return response()->json([
            'data'=>[
                'keypoints' => $keypoints,
                'length' => $keypoints->count()
            ]
        ],200);
    }

    public function show(TreatmentKeyPoint $treatmentKeyPoint)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTreatmentKeyPointRequest $request, TreatmentKeyPoint $treatmentKeyPoint)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(TreatmentKeyPoint $treatmentKeyPoint)
    {
        //
    }
}
