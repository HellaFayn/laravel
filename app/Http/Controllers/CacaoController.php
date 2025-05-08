<?php

namespace App\Http\Controllers;

use App\Models\Cacao;
use Illuminate\Http\Request;

class CacaoController
{

    public function store(Request $request)
    {
        $cacaoData = json_decode($request->input('cacao'), true);

        $cacao = new Cacao();
        $cacao->label = $cacaoData['label'];
        $cacao->confidence = $cacaoData['confidence'];
        $cacao->date_analyzed = $cacaoData['date_analyzed'];
        $cacao->caption = $cacaoData['caption'];
        $cacao->uploaderId = $cacaoData['uploaderId'];

        if ($request->hasFile('photo')) {
            $photoPath = $request->file('photo')->store('cacao-photos');
            $cacao->photo = "https://cacaocare.s3.ap-southeast-2.amazonaws.com/" . $photoPath;
        }
        $cacao->save();

        return response()->json([
            'message' => 'Cacao entry created successfully!',
            'data' => $cacao
        ], 201);
    }
    //Retrieve
    //getMany
    public function index(string $order, string $filter, Request $request)
    {
        $status = ['Black Pod Rot', 'Frosty Pod Rot', 'Healthy Pod'];
        switch(strtoupper($filter)){
            case 'HEALTHY': $status = ['Healthy Pod'];
            break;
            case 'DISEASED': $status = ['Black Pod Rot', 'Frosty Pod Rot'];
            break;
            default : ['Black Pod Rot', 'Frosty Pod Rot', 'Healthy Pod'];
        }

        if($request->username){
            $cacao = Cacao::select('cacaos.*', 'users.username', 'users.profile', 'users.city', 'users.barangay')
                            ->join('users', 'users.id', '=', 'cacaos.uploaderId')
                            ->orderBy('cacaos.created_at', $order)
                            ->whereIn('cacaos.label', $status)
                            ->where('users.username', $request->username)
                            ->paginate(6);
        }else{
            $cacao = Cacao::select('cacaos.*', 'users.username', 'users.profile', 'users.city', 'users.barangay')
                            ->join('users', 'users.id', '=', 'cacaos.uploaderId')
                            ->orderBy('cacaos.created_at', $order)
                            ->whereIn('cacaos.label', $status)
                            ->paginate(6);
        }

        return response()->json([
            'data' => $cacao,
            'meta' => [
                'current_page' => $cacao->currentPage(),
                'total_pages' => $cacao->lastPage(),
                'per_page' => $cacao->perPage(),
                'total' => $cacao->total(),
            ]
        ], 200);

    }

    //getOne
    public function show(string $id)
    {
        $cacao = Cacao::where('uploaderId', $id)->first();
        if(!$cacao){
            return response()->json([], 404);
        }
        return response()->json([
            'data' => $cacao
        ],200);
    }

    //getUploadedTodayCount
    public function getUploadedTodayCount(){
        $count = Cacao::where('created_at', '>=' ,now()->subHours(24))->count();
        return response()->json([
            'data'=>$count
        ], 200);
    }

    //Get the highest count of disease within this week
    public function getHighestDiseaseWithinTheWeek(){
        $cacaoStats = Cacao::selectRaw('cacaos.label, users.city, COUNT(*) as count')
                ->join('users', 'users.id', '=', 'cacaos.uploaderId')
                ->where('cacaos.created_at', '>=', now()->subDays(7))
                ->where('cacaos.label', '!=', 'Healthy Pod')
                ->groupBy('cacaos.label', 'users.city')
                ->orderByRaw('COUNT(*) DESC')
                ->get();

            $maxCount = $cacaoStats->max('count');

            $filteredResults = $cacaoStats->where('count', $maxCount);

            return response()->json(['data' => ['cacao' => $filteredResults]], 200);
    }

    public function getStatusCount(){
        $healthy = Cacao::where('label', 'Healthy Pod')->count();
        $diseased = Cacao::where('label', '!=' , 'Healthy Pod')->count();
        return response()->json([
            'data' => [
                'healthy' => $healthy,
                'diseased' => $diseased,
                'all' => $healthy + $diseased
            ]
            ], 200);
    }

    //getRecentPodScans
    public function getRecent(){
        $cacao = Cacao::select('cacaos.*', 'users.username', 'users.profile', 'users.city', 'users.barangay')
                    ->join('users', 'users.id', '=', 'cacaos.uploaderId')
                    ->latest('cacaos.created_at')
                    ->limit(3)
                    ->get();
        return response()->json([
            "data" => [
                "cacao" => $cacao
            ]
        ],200);
    }

    //Get uploaded count by the user
    public function getUploadCountByUser(string $id) {
        $healthy = Cacao::where('label', 'Healthy Pod')
                        ->where('uploaderId', (int)$id)
                        ->count();
        $diseased = Cacao::where('label', '!=' , 'Healthy Pod')
                        ->where('uploaderId', (int)$id)
                        ->count();

        return response()->json([
            'data' => [
                'all' => $healthy + $diseased,
                'healthy' => $healthy,
                'diseased' => $diseased
            ]
        ],200);
    }

    //Delete
    public function destroy(Cacao $cacao)
    {
        //
    }
}
