<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Mail;
use DB;
use App\Http\Requests;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

class MailController extends Controller {
   public function basic_email(){
      $data = array('name'=>"Virat Gandhi");

      Mail::send(['text'=>'mail'], $data, function($message) {
         $message->to('mr.vishnu37@gmail.com', 'Tutorials Point')->subject
         ('Laravel Basic Testing Mail');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Basic Email Sent. Check your inbox.";
   }

   public function html_email(){
      $data = array('name'=>"Virat Gandhi", 'subject' => 'This is subject');      
      Mail::send('mail', $data, function ($message) {

        $message->from('yourEmail@domain.com', 'Learning Laravel');

        $message->to('mr.vishnu37@gmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";
   }
   
   public function attachment_email(){
      $data = array('name'=>"Virat Gandhi");
      Mail::send('mail', $data, function($message) {
         $message->to('abc@gmail.com', 'Tutorials Point')->subject
         ('Laravel Testing Mail with Attachment');
         $message->attach('C:\laravel-master\laravel\public\uploads\image.png');
         $message->attach('C:\laravel-master\laravel\public\uploads\test.txt');
         $message->from('xyz@gmail.com','Virat Gandhi');
      });
      echo "Email Sent with attachment. Check your inbox.";
   }

   public function store(Request $request){
   	DB::table('emails')->insert(['email' => $request->input('email'), 'name' => $request->input('name')]);
   	return Redirect::away('thank');
   }

   public function tableData(){
      $users = DB::table('emails')->get();
      return Response::json(array('details' => $users));
   }
}