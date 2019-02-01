<?php

namespace App\Http\Controllers;

use App\Expence;
use Illuminate\Http\Request;

class ExpencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $expences = Expence::orderBy('id', 'desc')->get();
        return view('bsd-admin.expences.index', compact('expences'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bsd-admin.expences.create');
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
            'date' => 'required',
            'name' => 'required',
            'total' => 'required'
        ]);

        $expence = new Expence();
        $expence->date = $request->date;
        $expence->name = $request->name;
        $expence->details = $request->details;
        $expence->total = $request->total;
        $expence->save();
        return redirect()->route('expences.index')->with('success', 'Expence added successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $expence = Expence::findOrFail($id);
        return response()->json($expence);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $expence = Expence::findOrFail($id);
        return view('bsd-admin.expences.edit', compact('expence'));
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
            'date' => 'required',
            'name' => 'required',
            'total' => 'required'
        ]);

        $expence = Expence::findOrFail($id);
        $expence->date = $request->date;
        $expence->name = $request->name;
        $expence->details = $request->details;
        $expence->total = $request->total;
        $expence->save();
        return redirect()->route('expences.index')->with('success', 'Expence updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Expence::whereId($id)->delete();
        return redirect()->route('expences.index')->with('success', 'Expence deleted successfully');
    }
}
