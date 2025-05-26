<?php

namespace App\Http\Controllers;

use App\Models\Treatment;
use App\Http\Requests\StoreTreatmentRequest;
use App\Http\Requests\UpdateTreatmentRequest;
use App\Models\TreatmentKeyPoint;

class TreatmentController
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $treatments = Treatment::with('keypoints')->get();


        return response()->json([
            'data' => $treatments
        ],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTreatmentRequest $request)
    {
        $treatment = new Treatment();
        $treatment->disease = $request->disease;
        $treatment->short_description = $request->short_description;
        $treatment->img_url = $request->img_url;

        $treatment->save();

        $keys = $request->keypoints;

        for($i = 0; $i < count($keys); $i++ ){
            $treatement_key_point = new TreatmentKeyPoint();
            $treatement_key_point->disease_id = $treatment->id;
            $treatement_key_point->title = $keys[$i]['title'];
            $treatement_key_point->detailed_step = $keys[$i]['detailed_step'];

            $treatement_key_point->save();
        }

        return response()->json([
            'data'=> [
                'keypoints' => $keys,
                'treatment' => $treatment
            ]
        ],200);
    }

    /**
     * Display the specified resource.
     */
    public function show(Treatment $treatment)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateTreatmentRequest $request, Treatment $treatment)
    {

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Treatment $treatment)
    {
        //
    }
}
