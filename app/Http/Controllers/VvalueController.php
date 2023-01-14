<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use Illuminate\Http\Request;

class VvalueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $criterias = Criteria::get();
        $sum_weight = 0;
        foreach ($criterias as $key => $value) {
            $sum_weight = $sum_weight + $value->weight;
        }
        $alternatives = Alternative::latest()->with('values')->get();
        $sumtotal = 0;
        foreach ($alternatives as $alternative) {
            $total = 1;
            foreach ($criterias as $criteria) {
                foreach ($alternative->values as $data) {
                    if ($data->criteria_id == $criteria->id) {
                        if ($criteria->attribute == 'cost') {
                            $total = $total * pow($data->value, ($criteria->weight / $sum_weight * -1));
                        } else {
                            $total = $total * pow($data->value, ($criteria->weight / $sum_weight * 1));
                        }
                    }
                }
                if ($alternative->values->count() == 0) {
                    $total = 0;
                }
            }
            $alternative->svalue = $total;
            // if ($total != 0) {
            //     $alternative->vvalue = $total / $sumtotal;
            // } else {
            //     $alternative->vvalue = 0;
            // }
            $sumtotal = $sumtotal + $total;
        }
        if ($request->rank) {
            $alternatives = $alternatives->sortByDesc('vvalue');
        }
        return view('v-value.index', compact('criterias','sum_weight','alternatives','sumtotal'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
