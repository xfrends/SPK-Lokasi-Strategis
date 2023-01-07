<?php

namespace App\Http\Controllers;

use App\Models\Criteria;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CriteriaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Criteria::latest()->get();
        $sum_weight = 0;
        foreach ($datas as $key => $value) {
            $sum_weight = $sum_weight + $value->weight;
        }
        return view('criteria.index', compact('datas','sum_weight'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('criteria.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'name' => 'required|string|max:155',
            'weight' => 'required',
            'attribute' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Criteria::create([
                'name' => $request->name,
                'weight' => $request->weight,
                'attribute' => $request->attribute
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }

        return redirect('criteria')->with('message', 'Insert data Success');
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
        $data = Criteria::where('id', $id)->first();
        return view('criteria.edit', compact('data'));
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
        $this->validate($request, [
            'name' => 'required|string|max:155',
            'weight' => 'required',
            'attribute' => 'required',
        ]);

        DB::beginTransaction();
        try {
            Criteria::where('id', $id)
            ->update([
                'name' => $request->name,
                'weight' => $request->weight,
                'attribute' => $request->attribute
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }

        return redirect('criteria')->with('message', 'Update data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Criteria::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Delete data Success');
    }
}
