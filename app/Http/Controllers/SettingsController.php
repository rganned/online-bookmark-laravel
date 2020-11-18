<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;

class SettingsController extends Controller
{

    public function __construct() 
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $user = Auth::user();
        
        //
        return view('dashboard.settings')->with('user', $user);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update_bookmark(Request $request)
    {
        //
        $validatedData = [
            'bookmark_per_page' => 'required|integer|min:1|max:20',
            'bookmark_return' => 'required',
        ];

        $customMessages = [
            'required' => 'This field cannot be blank.',
            'min' => 'This field must be at least 1.',
            'max' => 'This field must be at most 20.',
        ];
        $this->validate($request, $validatedData, $customMessages);

        //
        $user = Auth::user();

        //
        $get_bookmark_per_page = $request->bookmark_per_page;
        $get_bookmark_return = $request->bookmark_return;

        //
        $user->bookmark_per_page = $get_bookmark_per_page;
        $user->bookmark_return = $get_bookmark_return;
        $user->save();

        //
        return redirect()->back()->withSuccess('The changes have been saved.');
    }

    public function update_account(Request $request)
    {
        //
        $user = Auth::user();
        
        //
        $validatedData = [
            'user_email' => 'required|unique:users,email,'.$user->id
        ];

        $customMessages = [
            'required' => 'This field cannot be blank.',
        ];
        $this->validate($request, $validatedData, $customMessages);

        //
        $get_new_email = $request->user_email;

        //
        $user->email = $get_new_email;
        $user->save();

        //
        return redirect()->back()->withSuccess('The changes have been saved.');
    }
}
