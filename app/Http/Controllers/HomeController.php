<?php

namespace App\Http\Controllers;

use Auth;
use DB;
use Illuminate\Http\Request;
use Redirect;

class HomeController extends Controller {
	/**
	 * Create a new controller instance.
	 *
	 * @return void
	 */
	public function __construct() {
		$this->middleware('auth');
	}

	/**
	 * Show the application dashboard.
	 *
	 * @return \Illuminate\Http\Response
	 */
	public function index() {

		try {

			$user_id = Auth::user()->id;

			$user = DB::table('users as u')->where('id', $user_id)->first();

			if ($user->isadmin == 1) {
				$myusers = DB::table('users as u')->where('isadmin', 0)->get();
				return view('home', compact('myusers'));
			} else {
				$Readonly = false;
				return view('put_view_emp', compact('user', 'Readonly'));
			}

		} catch (Exception $e) {
			return Redirect::to('error')->with('err_msg', ' Sorry something went worng. Please try again.');
		}
	}

	public function editEmployee(Request $request) {
		try {

			$empid = $request->id;
			$empdata = DB::table('users')->where('id', base64_decode($empid))->get();
			return view('editemployee', compact('empdata'));
		} catch (\Exception $e) {
			return Redirect::to('/error')->with('err_msg', ' Sorry something went worng. Please try again.');
		}
	}

}
