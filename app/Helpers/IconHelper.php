<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class IconHelper {

	public static function forFile($file_name){
		return url('assets/img/file.png');
	}

}