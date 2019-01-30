<?php

namespace App\Http\Controllers;

use App\Client;
use Illuminate\Http\Request;

class ClientsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $clients = Client::orderBy('id')->get();
        return view('bsd-admin.clients.index', compact('clients'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bsd-admin.clients.create');
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
            'name' => 'required',
            'email' => 'required|email',
            'client_source' => 'required',
        ]);

        $client = new Client();
        $client->name = $request->name;
        $client->email = $request->email;
        $client->client_source = $request->client_source;
        $client->business_type = $request->business_type;
        $client->country = $request->country;
        $client->skype = $request->skype;
        $client->whatsapp = $request->whatsapp;
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client Added Successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $client = Client::findOrFail($id);
        return view('bsd-admin.clients.edit', compact('client'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $client = Client::findOrFail($id);
        return view('bsd-admin.clients.edit', compact('client'));
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
            'name' => 'required',
            'email' => 'required|email',
            'client_source' => 'required',
        ]);

        $client = Client::findOrFail($id);
        $client->name = $request->name;
        $client->email = $request->email;
        $client->client_source = $request->client_source;
        $client->business_type = $request->business_type;
        $client->country = $request->country;
        $client->skype = $request->skype;
        $client->whatsapp = $request->whatsapp;
        $client->save();
        return redirect()->route('clients.index')->with('success', 'Client updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        if(Client::findOrFail($id)->delete()) {
            return redirect()->route('clients.index')->with('success', 'Client deleted successfully');
        }
    }
}
