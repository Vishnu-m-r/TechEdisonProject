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
use Illuminate\Bus\Queueable;
use GuzzleHttp\Client;


class Front extends Controller
{

	public function store(Request $request){
		try {
			DB::table('emails')->insert(['email' => $request->input('email'), 'name' => $request->input('name')]);
			return Redirect::away('thank');
		} catch (\Exception $e) {
			echo "Already Subscribed";
		}
		
	}

	public function tableData(){
		$users = DB::table('emails')->get();
		return Response::json(array('details' => $users));
	}
	public function sendSubMail(Request $request){
		$data = ['text' => $request->input('message'), 'subject' => $request->input('subject')];
		$emails = DB::table('emails')->get();
		for ($i=0; $i < count($emails); $i++) { 
			try {
				Mail::to($emails[$i])->queue(new Newsletter($data));
			} catch (Exception $e) {
				
			}
			
		}
		
		return view('emailSent', ['sub' => 'Emails successfully sent']);
	}

	public function saveCSV(Request $request){
		$file = $request->file('csvFile');
		if($request->hasFile('csvFile') && $file->getClientOriginalExtension() == 'txt' && !File::exists('uploads/'.$file->getClientOriginalName())){
			$file->move('uploads/',$file->getClientOriginalName());
			$contents = File::get('uploads/'.$file->getClientOriginalName());
			$emails = preg_split('/, ?/', $contents);
			for ($i=0; $i < count($emails); $i++) { 
				$res = DB::table('emails')->where('email', $emails[$i])->get();
				if(count($res)==0){
					DB::table('emails')->insert(['email' => $emails[$i], 'name' => 'Unknown']);
				}
			}
			$sub = 'Data Uploaded';
		}
		else{
			$sub = 'Duplicate File - Upload Cancelled';
		}
		return view('emailSent', ['sub' => $sub]);
	}

	public function getStatsData(){
		$client = new Client();
        $res = $client->request('GET', 'https://api.sendgrid.com/api/stats.get.json?api_user=teched&api_key=123abc12&days=1');
        //echo $res->getStatusCode();
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();
        //Response::json($res->getBody());
	}

	public function test(){
		$client = new Client();
        $res = $client->request('GET', 'https://api.sendgrid.com/api/stats.get.json?api_user=teched&api_key=123abc12&days=1');
        echo $res->getStatusCode()."<br>";
        // "200"
        //echo $res->getHeader('content-type');
        // 'application/json; charset=utf8'
        echo $res->getBody();	
    }

}
