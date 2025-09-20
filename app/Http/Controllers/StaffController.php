<?php

namespace App\Http\Controllers;

use App\Models\staff;
use Illuminate\Http\Request;

class StaffController extends Controller
{
    public function index(){
        $staff = staff::all();
        return view('staffView', compact('staff'));
    }

    public function create(){
        return view('staff.create');
    }

    public function store(Request $request){
        $validateData = $request->validate([
            'name'=> 'required|string|max:225',
            'email'=> 'required|email|unique:staff,email',
            'role' => 'required|string|max:225',
            'pin' => 'required|string|min:4|max:4'
        ]);

        staff::create([
            'name' => $validateData['name'],
            'email' => $validateData['email'],
            'role' => $validateData['role'],
            'pin' => $validateData['pin'],

        ]);

       return redirect()->route('staff.index')->with([
            'flash.banner' => 'Staff member created successfully!',
            'flash.bannerStyle' => 'success'
        ]);
    }

    public function delete(){

    }
}
