<?php

namespace App\Http\Controllers;

use App\CoWorkingSpaceApplication;
use App\CWRecommendation;
use Illuminate\Http\Request;
use App\Jobs\CWSRecommendation;
class CWRecommendationController extends Controller
{
    // CWSRecommendation
    public function recommendation($id, $type)
    {
        CWSRecommendation::dispatch($type, $id)->delay(now()->addSeconds(3));

        return redirect()->back();
    }

    public function show($id, $type)
    {
        $cwspce = CoWorkingSpaceApplication::find($id);
        if($type > 1)
        {
            $type-=1;
        }
        $rec = $cwspce->recommendation()->where('type', $type)->get()->sortByDesc('created_at')-> first();
        return view('form.registration.co_working_space.rec_form',['cwspce' => $cwspce, 'recID' => $rec->id, 'type' => $type]);
    }

    public function update(Request $request)
    {
        $rec = CWRecommendation::find($request-> recID);
        $rec-> recommendation = $request-> recommendation;
        $rec-> comments = $request-> recommendationComment;
        $rec->save();
        CWSRecommendation::dispatch($rec-> type+1, $request->cwsID)->delay(now()->addSeconds(5));
        return dd($request);

        return redirect('/');
    }
}
