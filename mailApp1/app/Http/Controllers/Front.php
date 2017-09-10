<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Mail\Newsletter;
use App\Order;
use Mail;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;
use File;

class Front extends Controller
{
	public function sendMail(){
		$data = array('name' => 'Controller');
		$emails = DB::table('emails')->get();
		Mail::to('mr.vishnu37@gmail.com')->cc($emails)->queue(new Newsletter($data));
		echo "Email sent Successfully cc";
	}

	public function store(Request $request){
		DB::table('emails')->insert(['email' => $request->input('email'), 'name' => $request->input('name')]);
		return Redirect::away('thank');
	}

	public function tableData(){
		$users = DB::table('emails')->get();
		return Response::json(array('details' => $users));
	}
	public function sendSubMail(Request $request){
		$data = ['text' => $request->input('message'), 'sub' => $request->input('subject')];
		$emails = DB::table('emails')->get();
		Mail::to('mr.vishnu37@gmail.com')->cc($emails)->queue(new Newsletter($data));
		return view('emailSent', ['sub' => 'Emails successfully sent']);
	}

	public function saveCSV(Request $request){
		$file = $request->file('csvFile');
		if($request->hasFile('csvFile') && $file->getClientOriginalExtension() == 'txt'){
			$file->move('uploads/',$file->getClientOriginalName());
			$contents = File::get('uploads/'.$file->getClientOriginalName());
			$emails = preg_split('/, ?/', $contents);
			for ($i=0; $i < count($emails); $i++) { 
				DB::table('emails')->insert(['email' => $emails[$i], 'name' => 'Unknown']);
			}
			return view('emailSent', ['sub' => 'Data Uploaded']);
		}
		else{
			echo "error";
		}
	}
}
