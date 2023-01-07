<?php

namespace App\Http\Controllers;

use App\Models\Alternative;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AlternativeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Alternative::latest()->get();
        return view('alternative.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('alternative.create');
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
        ]);

        DB::beginTransaction();
        try {
            Alternative::create([
                'name' => $request->name
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }

        return redirect('alternative')->with('message', 'Insert data Success');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Alternative::where('id', $id)->first();
        return view('alternative.edit', compact('data'));
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
        ]);
        
        DB::beginTransaction();
        try {
            Alternative::where('id', $id)
            ->update([
                'name' => $request->name
            ]);
            DB::commit();
        } catch (\Throwable $th) {
            //throw $th;
            DB::rollback();
        }

        return redirect('alternative')->with('message', 'Update data Success');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Alternative::where('id', $id)->delete();

        return redirect()->back()->with('message', 'Delete data Success');
    }
}
