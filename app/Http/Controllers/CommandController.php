<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\StringHelper;
use ValueError;
use Exception;

class CommandController extends Controller {

	public $commands = [
		'shut-down' => 'shutdown /s -t 0',
		'restart' => 'shutdown /r -t 0',
	];

	public function execute(Request $request,$command){
		try{
			shell_exec($this->commands[$command]);
			return redirect('/')->with('success',$command.' Command executed');
		}catch(ValueError | Exception $e){
			return view('error',['message'=>$e->getMessage()]);
		}
	}

	public function getCommandNames(Request $request){
		return array_keys($this->commands);
	}

}