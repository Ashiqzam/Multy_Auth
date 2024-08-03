<?php

namespace App\Http\Controllers;
namespace App\Models\User;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
//    public function index()
//    {
//        return view('home');
//    }

    public function adminHome()
    {
        return view('admin.dashboard');
    }

    public function user_list()
    {
        $users = User::all();
        return view('admin.user.list', compact('users'));
    }

    public function user_add()
    {
        return view('admin.user.add');
    }

    public function user_store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:8|confirmed',
            'phone' => 'required|numeric',
            'role' => 'required|string|in:admin,manager,user',
        ]);

        $user = new User();
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = Hash::make($request->password);
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->status = 'active';
        $user->save();

        return redirect()->route('admin.user.list')->with('success', 'User created successfully!');
    }

    public function user_edit($id)
    {
        $user = User::findOrFail($id);
        return view('admin.user.edit', compact('user'));
    }

    public function user_update(Request $request, $id)
    {
        $user = User::findOrFail($id);

        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email,'.$user->id,
            'password' => 'nullable|string|min:8|confirmed',
            'phone' => 'required|numeric',
            'role' => 'required|string|in:admin,manager,user',
        ]);

        $user->name = $request->name;
        $user->email = $request->email;
        if ($request->password) {
            $user->password = Hash::make($request->password);
        }
        $user->phone = $request->phone;
        $user->role = $request->role;
        $user->save();

        return redirect()->route('admin.user.list')->with('success', 'User updated successfully!');
    }

    public function user_delete($id)
    {
        $user = User::findOrFail($id);
        $user->delete();
        return redirect()->route('admin.user.list')->with('success', 'User deleted successfully!');
    }

    public function user_status($id)
    {
        $user = User::findOrFail($id);
        $user->status = $user->status === 'active' ? 'inactive' : 'active';
        $user->save();
        return redirect()->route('admin.user.list')->with('success', 'User status updated successfully!');
    }



}
