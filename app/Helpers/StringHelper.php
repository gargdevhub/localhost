<?php

namespace App\Helpers;
use Illuminate\Support\Str;

class StringHelper {

	public static function snakeToWordCase($string){
		$new_string_array = [];
		$old_string_array = explode('_',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = ucfirst(strtolower($item));
			}
			$string = implode(' ',$new_string_array);
		}else{
			$string = ucfirst(strtolower($string));
		}
		return $string;
	}

	public static function kebabToWordCase($string){
		$new_string_array = [];
		$old_string_array = explode('-',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = ucfirst(strtolower($item));
			}
			$string = implode(' ',$new_string_array);
		}else{
			$string = ucfirst(strtolower($string));
		}
		return $string;
	}

	public static function kebabToSnakeCase($string){
		$new_string_array = [];
		$old_string_array = explode('-',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = strtolower($item);
			}
			$string = implode('_',$new_string_array);
		}else{
			$string = strtolower($string);
		}
		return $string;
	}

	public static function snakeToKebabCase($string){
		$new_string_array = [];
		$old_string_array = explode('_',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = strtolower($item);
			}
			$string = implode('-',$new_string_array);
		}else{
			$string = strtolower($string);
		}
		return $string;
	}

	public static function wordToSnakeCase($string){
		$new_string_array = [];
		$old_string_array = explode(' ',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = strtolower($item);
			}
			$string = implode('_',$new_string_array);
		}else{
			$string = strtolower($string);
		}
		return $string;
	}

	public static function wordToKebabCase($string){
		$new_string_array = [];
		$old_string_array = explode(' ',$string);
		if(count($old_string_array) > 1){
			foreach($old_string_array as $item){
				$new_string_array[] = strtolower($item);
			}
			$string = implode('-',$new_string_array);
		}else{
			$string = strtolower($string);
		}
		return $string;
	}

	public static function pathToDiskLetter($path){
		$colon_position = strpos($path,':');
		if($colon_position !== false){
			$path = substr($path,0,$colon_position);
		}
		$path = preg_replace('/[^A-Z]/','',$path);
		return $path;
	}

	public static function makePath($base_path,$content){
		if(!Str::endsWith($base_path,'/')){
			$base_path = $base_path.'/';
		}
		return $base_path.$content;
	}

}