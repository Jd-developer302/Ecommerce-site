<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\User;
use Spatie\Permission\Models\Role;
use DB;
use Hash;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB as FacadesDB;
use Illuminate\Support\Facades\Hash as FacadesHash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $data = User::orderBy('id', 'DESC')->paginate(20);
        return view('users.index', compact('data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $roles = Role::pluck('name', 'name')->all();
        return view('users.create', compact('roles'));
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
            'email' => 'required|email|unique:users,email',
            'password' => 'required|same:confirm-password',
            'roles' => 'required',
            'image' => 'required',
            'base_salary' => 'required',
        ]);

        $input = $request->all();
        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        }
        if ($request->hasfile('aadhar')) {
            $file = $request->file('aadhar');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['aadhar'] = $pdfname;
        }
        if ($request->hasfile('passport')) {
            $file = $request->file('passport');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['passport'] = $pdfname;
        }
        if ($request->hasfile('emirates_id')) {
            $file = $request->file('emirates_id');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['emirates_id'] = $pdfname;
        }
        if ($request->hasfile('pancard')) {
            $file = $request->file('pancard');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['pancard'] = $pdfname;
        }
        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['cv'] = $pdfname;
        }
        if ($request->hasfile('appointment')) {
            $file = $request->file('appointment');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['appointment'] = $pdfname;
        }
        if ($request->hasfile('mutal')) {
            $file = $request->file('mutal');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['mutal'] = $pdfname;
        }
        $input['password'] = FacadesHash::make($input['password']);

        $user = User::create($input);
        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User created successfully');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $user = User::find($id);
        return view('users.show', compact('user'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = User::find($id);
        $roles = Role::pluck('name', 'name')->all();
        $userRole = $user->roles->pluck('name', 'name')->all();

        return view('users.edit', compact('user', 'roles', 'userRole'));
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
            'email' => 'required|email|unique:users,email,' . $id,
            'password' => 'same:confirm-password',
            'roles' => 'required',
            'image' => '',
            'base_salary' => 'required',
        ]);

        $input = $request->all();
        if (!empty($input['password'])) {
            $input['password'] = FacadesHash::make($input['password']);
        } else {
            $input = Arr::except($input, array('password'));
        }

        if ($image = $request->file('image')) {
            $destinationPath = 'image/';
            $profileImage = date('YmdHis') . "." . $image->getClientOriginalExtension();
            $image->move($destinationPath, $profileImage);
            $input['image'] = "$profileImage";
        } else {
            unset($input['image']);
        }
        if ($request->hasfile('aadhar')) {
            $file = $request->file('aadhar');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['aadhar'] = $pdfname;
        }
        if ($request->hasfile('passport')) {
            $file = $request->file('passport');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['passport'] = $pdfname;
        }
        if ($request->hasfile('emirates_id')) {
            $file = $request->file('emirates_id');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['emirates_id'] = $pdfname;
        }
        if ($request->hasfile('pancard')) {
            $file = $request->file('pancard');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['pancard'] = $pdfname;
        }
        if ($request->hasfile('cv')) {
            $file = $request->file('cv');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['cv'] = $pdfname;
        }
        if ($request->hasfile('appointment')) {
            $file = $request->file('appointment');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['appointment'] = $pdfname;
        }
        if ($request->hasfile('mutal')) {
            $file = $request->file('mutal');
            $pdfname = time() . '.' . $file->extension();
            $file->move(public_path() . '/files/', $pdfname);
            $input['mutal'] = $pdfname;
        }
        $user = User::find($id);
        $user->update($input);
        FacadesDB::table('model_has_roles')->where('model_id', $id)->delete();

        $user->assignRole($request->input('roles'));

        return redirect()->route('users.index')
            ->with('success', 'User updated successfully');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        User::find($id)->delete();
        return redirect()->route('users.index')
            ->with('success', 'User deleted successfully');
    }

    public function toggleStatus($id)
    {
        $user = User::findOrFail($id);
        $user->is_active = !$user->is_active;
        $user->save();

        return redirect()->route('users.index')
            ->with('success', 'User status updated successfully');
    }
}
