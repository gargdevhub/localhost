<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use ValueError;
use Exception;

class HomeController extends Controller {

	protected $commands = [
		'ShutDown' => 'shutdown /s -t 0',
		'Restart' => 'shutdown /r -t 0',
	];

	public function index(Request $request){
		$accordians = [
			'Commands' => [
				'links' => array_map(function($command){
					return [
						'text' => $command,
						'href' => url('command/'.$command),
					];
				},array_keys($this->commands))
			],
			'Tools' => [
				'links' => [
					[
						'text' => 'Task List',
						'href' => url('task-list'),
					]
				]
			]
		];
		return view('home',compact('accordians'));
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