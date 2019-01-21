<?php

namespace App\Http\Controllers;

use App\Permission;
use Illuminate\Http\Request;

class PermissionsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $permissions = Permission::all();
        return view('bsd-admin.permissions.index', compact('permissions'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('bsd-admin.permissions.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        if ($request->permissiontype == 'basic') {
            $this->validate($request, [
                'display_name' => 'required|max:255',
                'name' => 'required|max:255|alphadash|unique:permissions,name',
                'description' => 'sometimes|max:255'
            ]);
            $permission = new Permission();
            $permission->display_name = $request->display_name;
            $permission->name = $request->name;
            $permission->description = $request->description;
            $permission->save();
            return redirect()->route('permissions.index')->with('success', 'Permission created successfully');

        } elseif ($request->permissiontype == 'crud') {
            $this->validate($request, [
                'resource' => 'required|max:100|alpha|min:3'
            ]);

            $crud = explode(',', $request->crud_selected);
            if( count($crud) > 0 ) {
                foreach ( $crud as $x ) {
                    $slug = strtolower($x) . '_' . strtolower($request->resource);
                    $display_name = ucwords($x . ' ' . $request->resource);
                    $description = "Allow a User to " . strtoupper($x) . ' ' . ucwords( $request->resource );

                    $permission = new Permission();
                    $permission->name = $slug;
                    $permission->display_name = $display_name;
                    $permission->description = $description;
                    $permission->save();
                }
                return redirect()->route('permissions.index')->with('success', 'Permission create successfully');
            }
            return redirect()->route('permissions.create')->with('error', 'Fix the issues');
        }
        return redirect()->route('permissions.create')->with('error', 'Fix the issues');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $permission = Permission::findOrFail($id);
        return view('bsd-admin.permissions.show', compact('permission'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $permission = Permission::findOrFail($id);
        return view('bsd-admin.permissions.edit', compact('permission'));
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
            'display_name' => 'required|min:3|max:255',
            'description' => 'required|min:3|max:255'
        ]);

        $permission = Permission::findOrFail($id);
        $permission->display_name = $request->display_name;
        $permission->description = $request->description;
        $permission->save();

        return redirect()->route('permissions.index')->with('success', 'Permission Updated Successfully!');
    }
}
