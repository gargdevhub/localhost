<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ValueError;
use Exception;

class HomeController extends Controller {

	protected $commands = [
		'Shut Down' => 'shutdown /s -t 0',
		'Restart' => 'shutdown /r -t 0',
	];

	public function index(Request $request){
		$commands = $this->commands;
		return view('home',compact('commands'));
	}

	public function command(Request $request,$command){
		try{
			shell_exec($this->commands[$command]);
			return redirect('/')->with('success',$command.' Command executed');
		}catch(ValueError | Exception $e){
			return view('error',['message'=>$e->getMessage()]);
		}
	}

}