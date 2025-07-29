<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

use App\Http\Controllers\Controller;

use App\Models\Admin;
use App\Models\roles;
use App\Models\User;
use App\Models\staff_members;





class AdminController extends Controller
{
    // public function admin()
    // {
    //     $admins = Admin::all(); 
    //     return view('sample', compact('admins'));
    // }

    public function adminDashboard()
    {
        $staffMembers = staff_members::with('role')->get();
        $clients = User::latest()->take(5)->get(); 

        return view('dashboard.admin-dashboard',compact('staffMembers','clients'));
    }

    public function adminProfile()
    {
        $admin = Auth::user();
        return view('dashboard.admin-profile', compact('admin'));
    }

    public function manageRoles()
    {
        $roles = roles::all();
       
        return view('roles.manage-roles', compact('roles'));
    }

   public function editRoles($id) {
    $role = roles::findOrFail($id); 
    return view('roles.edit-roles', compact('role'));
}




    public function createRole()
    {
        return view('roles.create-roles');
    }
    public function storeRole(Request $request)
    {
        
        // Manual validator to enforce case-sensitive uniqueness
        $validator = Validator::make($request->all(), [
            'rolename' => 'required|string|max:255',
            'permissions' => 'required|array',
            'permissions.*' => 'in:view,create,edit,delete',
            'status' => 'required|in:active,inactive',
        ]);

        $validator->after(function ($validator) use ($request) {
            // Case-sensitive check for existing role
            if (roles::whereRaw('BINARY rolename = ?', [$request->rolename])->exists()) {
                $validator->errors()->add('rolename', 'The role name already exists.');
            }
        });

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Store the role
        $permissions = [
            'can_view' => in_array('view', $request->permissions) ? 1 : 0,
            'can_create' => in_array('create', $request->permissions) ? 1 : 0,
            'can_edit' => in_array('edit', $request->permissions) ? 1 : 0,
            'can_delete' => in_array('delete', $request->permissions) ? 1 : 0,
        ];

        $role = new roles();
        $role->rolename = $request->rolename;
        $role->can_view = $permissions['can_view'];
        $role->can_create = $permissions['can_create'];
        $role->can_edit = $permissions['can_edit'];
        $role->can_delete = $permissions['can_delete'];
        $role->status = $request->status;
        $role->save();

        return redirect()->back()->with('success', 'Role created successfully!');
    }


    public function updateRole(Request $request, $id)
    {
        $role = roles::findOrFail($id);

        // Validation (all fields nullable)
        $validated = $request->validate([
            'rolename'    => 'nullable|string|max:255',
            'can_view'    => 'nullable|in:on',
            'can_create'  => 'nullable|in:on',
            'can_edit'    => 'nullable|in:on',
            'can_delete'  => 'nullable|in:on',
            'status'      => 'nullable|in:active,inactive',
        ]);

        // Update only fields that are sent
        $role->rolename    = $request->input('rolename', $role->rolename);
        $role->can_view    = $request->has('can_view') ? 1 : 0;
        $role->can_create  = $request->has('can_create') ? 1 : 0;
        $role->can_edit    = $request->has('can_edit') ? 1 : 0;
        $role->can_delete  = $request->has('can_delete') ? 1 : 0;
        $role->status      = $request->input('status', $role->status);
        $role->save();

        return redirect()->route('manage-roles')->with('success', 'Role updated successfully.');

    }

    public function destroyRole($id)
    {
        $role = roles::findOrFail($id);
        $role->delete();

        return redirect()->back()->with('success', 'Role deleted successfully.');
    }

    public function subscription(){
        return view('subscription.manage-plans');
    }
    public function createPlan()
    {
        return view('subscription.create-plan');
    }
    public function invoiceView()
    {
        return view('payments.invoice-view');
    }
    public function billsOversight()
    {
        return view('bills.bill-oversights');
    }
    public function billTypes()
    {
        return view('bills.bill-types');
    }
    public function autoCategory(){
        return view('bills.auto-category');
    }
   
}
