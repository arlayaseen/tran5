<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Role;
use Illuminate\Http\Request;

class UserRoleController extends Controller
{
    public function index(){
        $users=User::all();
        return view('users', compact('users'));

    }
    // Show the form to assign roles to a user
    public function showAssignRolesForm(User $user)
    {
        $roles = Role::all(); // Fetch all available roles
        return view('assign-roles', compact('user', 'roles'));
    }

    // Handle role assignment
    public function assignRoles(Request $request, User $user)
    {
        $validated = $request->validate([
            'roles' => 'array|required', // Validate roles input as an array
            'roles.*' => 'exists:roles,id', // Ensure each role ID exists in the roles table
        ]);
        $user->roles()->sync($validated['roles']); // Sync roles with the user
        // $user->roles()->attach([1, 2]); // Role IDs 1 and 2
        // $user->roles()->detach(2); // Detach Role ID 2
        return redirect()->back()->with('success', 'Roles assigned successfully!');
    }
}
