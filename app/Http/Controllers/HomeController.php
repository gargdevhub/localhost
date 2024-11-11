<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\CommandController;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Helpers\StringHelper;
use ValueError;
use Exception;

class HomeController extends Controller {

	public function index(Request $request){
		$commands = (new CommandController())->getCommandNames($request);
		return view('home',compact('commands'));
	}

}