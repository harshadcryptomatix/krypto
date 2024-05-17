<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Admin::orderBy('id','DESC')->paginate(10);
        return view('admin.admin-users.list',compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.admin-users.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:admins',
            'password' => 'required|string|min:8',
        ]);

       
        $admin = new Admin;
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->status = ($request->status == 1) ? 1 : 0;
        $admin->password = Hash::make($request->password);
        $admin->save();
        return redirect()->route('admin.admin-list')->with('success','Create Successfully.');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       $data =  Admin::findOrFail($id);
       return view('admin.admin-users.edit',compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:admins,email,' . $id,
            'password' => 'nullable|string|min:8',
        ]);

        $adminUser = Admin::findOrFail($id);
        $adminUser->name = $request->name;
        $adminUser->email = $request->email;
        $adminUser->status = ($request->status) == 1 ? 1 : 0;
        if ($request->filled('password')) {
            $adminUser->password = Hash::make($request->password);
        }

        $adminUser->save();

        return redirect()->route('admin.admin-list')->with('success', 'Admin updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $adminUser = Admin::findOrFail($id);
         $adminUser->delete();
         return redirect()->route('admin.admin-list')->with('success', 'Admin deleted successfully');
    }
}
