<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Redirect;
use Session;
use Validator;

class EmployeeController extends Controller {
	public function __construct() {

	}

	public function index() {

	}
	public function CreateEmp() {
		return view('create_emp');
	}

	public function viewEmp($id) {
		$Readonly = true;
		$user = User::where('id', base64_decode($id))->first();
		return view('put_view_emp', compact('Readonly', 'user'));
	}

	public function postEmp(Request $request) {
		try {

			$validator = Validator::make($request->all(), [
				'email' => 'required|string|email|max:255',
				'password' => 'required|min:6|confirmed',

			], [
				'email.required' => 'Please enter e-mail address.',
				'email.email' => 'Please enter a valid e-mail address.',
				'email.string' => 'Please enter a valid e-mail address.',
				'email.max' => 'Please enter a valid e-mail address.',
				'password.required' => 'Please enter a password.',
				'password.min' => 'Please enter a valid password.',
				'password.confirmed' => 'Please enter a same password.',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			//dd($request->all());

			$emp = User::create([
				'name' => '',
				'email' => $request->email,
				'password' => bcrypt($request->password),
				'location' => '1',
				'mobile_no' => '',
				'area' => '',
				'native_place' => '',
				'isadmin' => 0,
			]);

			if ($emp) {
				//flash('Employee created successfully')->success();
				return redirect()->route('home');
			} else {
				//flash('Employee create fail')->error()->important();
				return redirect()->route('home');
			}

			//Session::flash('emp_msg', "Employee added successfully");
			return redirect()->route('home');

		} catch (Exception $e) {
			return Redirect::to('error')->with('err_msg', ' Sorry something went worng. Please try again.');

		}
	}

	public function putEmp(Request $request) {

		try {

			$validator = Validator::make($request->all(), [
				'name' => 'required|string|min:2|max:20',
				'mobile_no' => 'required|max:10',
				'area' => 'required',
				'native_place' => 'required',
				'location' => 'required',

			], [
				'name.required' => 'Please enter name.',
				'name.string' => 'Please enter character.',
				'name.min' => 'At least 2 characters required.',
				'name.max' => 'Maximum 20 characters allowed',
				'mobile_no.required' => 'Please enter a mobile number.',
				'mobile_no.max' => 'Maximum 10 characters allowed',
				'area.required' => 'Please enter a area.',
				'native_place.required' => 'Please enter a native place.',
				'location.required' => 'Please enter a location.',
			]);

			if ($validator->fails()) {
				return redirect()->back()->withErrors($validator)->withInput();
			}
			//dd($request->all());

			$emp = User::where('id', $request->emp_id)->update(['name' => $request->name, 'location' => $request->location, 'mobile_no' => $request->mobile_no, 'area' => $request->area, 'native_place' => $request->native_place, 'isadmin' => 0,
			]);

			if ($emp) {
				//flash('Employee created successfully')->success();
				return redirect()->route('home')->with('success', 'Form Submitted !');
			} else {
				//flash('Employee create fail')->error()->important();
				return redirect()->route('home');
			}

			//Session::flash('emp_msg', "Employee added successfully");
			return redirect()->route('home');

		} catch (Exception $e) {
			return Redirect::to('error')->with('err_msg', ' Sorry something went worng. Please try again.');

		}
	}

	public function addNewEmployee(Request $request) {
		try {
			//echo "okk";
			$data = $request->all();

			$image = $request->file('image');
			$fileName = 'Img-' . date('YmdHsi') . '.' . $image->getClientOriginalExtension();
			$destinationPath = base_path() . '/public/profile_photos/';
			$image->move($destinationPath, $fileName);

			$pro_img = 'public/profile_photos/' . $fileName;

			$emp = User::create([
				'name' => $data['name'],
				'email' => $data['email'],
				'password' => bcrypt($data['password']),
				'department' => $data['department'],
				'dob' => $data['dob'],
				'address' => $data['address'],
				'email' => $data['email'],
				'image' => $pro_img,
				'hobby' => implode(",", $data['hobby']),
				'gender' => $data['gender'],
				'salary' => $data['salary'],
			]);

			Session::flash('emp_msg', "Employee added successfully");
			return redirect()->route('home');

		} catch (\Exception $e) {
			return Redirect::to('/error')->with('err_msg', ' Sorry something went worng. Please try again.');

		}
	}
}