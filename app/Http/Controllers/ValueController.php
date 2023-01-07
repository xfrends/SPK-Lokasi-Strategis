<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use App\Models\Criteria;
use App\Models\CriteriaAlternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ValueController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $criterias = Criteria::get();
        $alternatives = Alternative::latest()->with('values')->get();
        return view('value.index', compact('criterias','alternatives'));
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
        $criterias = Criteria::get();
        $alternative = Alternative::find($id);
        foreach ($criterias as $criteria) {
            foreach ($alternative->values as $value) {
                if ($value->criteria_id == $criteria->id) {
                    $criteria->value = $value->value;
                }
            }
        }
        return view('value.edit', compact('criterias','alternative'));
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
        $form = $request->except(['_token','_method']);
        foreach ($form as $criteria_id => $value) {
            DB::beginTransaction();
            try {
                CriteriaAlternative::updateOrCreate([
                    'alternative_id' => $id,
                    'criteria_id' => $criteria_id
                ],[
                    'value' => $value
                ]);
                DB::commit();
            } catch (\Throwable $th) {
                //throw $th;
                DB::rollback();
            }
        }

        return redirect('value')->with('message', 'Update data Success');
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
