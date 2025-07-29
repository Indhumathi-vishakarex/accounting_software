<?php

namespace App\Http\Controllers\Admin;

use App\Models\roles;
use Illuminate\Http\Request;
use App\Models\staff_members;
use Illuminate\Support\Facades\Hash;
use App\Http\Controllers\Controller;




class StaffController extends Controller
{
    public function staffList()
    {
        $staffMembers = staff_members::with('role')->get();
        $roles = roles::all();

        return view('staff_management.staff-list', compact('staffMembers', 'roles'));
    }
    public function staffProfile($id)
    {
        $staff = staff_members::with('role')->findOrFail($id);
        $roles = roles::all();
        return view('staff_management.staff-profile', compact('staff', 'roles'));
    }
    public function staffRegistration()
    {
        $roles = roles::all();
        return view('staff_management.staff-registration', compact('roles'));
    }
    public function storeStaff(Request $request)
    {
        $request->validate([
            'name' => ['required', 'string', 'regex:/^[a-zA-Z\s]+$/'],
            'email' => ['required', 'email', 'unique:staff_members,email'],
            'role_id' => ['required', 'exists:roles,id'],
            'password' => ['required', 'min:8', 'confirmed'],
        ]);

        $staff = new staff_members();
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->role_id = $request->role_id;
        $staff->password = Hash::make($request->password);
        $staff->save();

        return redirect()->back()->with('success', 'Staff member registered successfully.');
    }

    public function updateProfile(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:staff_members,email,' . $id,
            'role_id' => 'required|exists:roles,id',
            'image' => 'nullable|image|mimes:jpg,jpeg,png,gif|max:2048',
        ]);

        $staff = staff_members::findOrFail($id);
        $staff->name = $request->name;
        $staff->email = $request->email;
        $staff->role_id = $request->role_id;

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->move(public_path('assets/img/profiles'), $imageName);
            $staff->profile_image = 'assets/img/profiles/' . $imageName;
        }


        $staff->save();

        return redirect()->back()->with('success', 'Staff profile updated successfully.');
    }

    public function updatePassword(Request $request, $id)
    {
        $request->validate([
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
        
        $staff = staff_members::findOrFail($id);
        $staff->password = Hash::make($request->password);
        $staff->save();
        return redirect()->back()->with('success', 'Password updated successfully.');
    }

    public function staffDestroy($id)
    {
        $staff = staff_members::findOrFail($id);
        $staff->delete();

        return redirect()->route('staff-list')->with('success', 'Staff account deleted successfully.');
    }

    public function searchStaff(Request $request)
{
    $query = staff_members::query()->with('role'); // assuming a relationship to Role model

    if ($request->filled('email')) {
        $query->where('email', 'like', '%' . $request->email . '%');
    }

    if ($request->filled('name')) {
        $query->where('name', 'like', '%' . $request->name . '%');
    }

    if ($request->filled('role_id')) {
        $query->where('role_id', $request->role_id);
    }

    $staffMembers = $query->get();
    $roles = roles::all();

    return view('staff_management.staff-list', compact('staffMembers', 'roles'));
}

}
