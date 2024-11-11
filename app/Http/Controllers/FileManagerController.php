<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use App\Helpers\StringHelper;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ValueError;
use Exception;

class FileManagerController extends Controller {

	protected $base_path = null;

	public function index(Request $request){
		$target_path = null;
		$files = $folders = $disks = [];
		if(!empty($request->query('path'))){
			$target_path = $request->query('path');
			$this->base_path = $target_path;
			$target_contents = scandir($target_path);
			$folders = $this->onlyFolders($target_contents);
			$files = $this->onlyFiles($target_contents);
		}else{
			$disk_list = shell_exec('wmic logicaldisk get caption');
			$disks = $this->parseDiskList($disk_list);
		}
		return view('file-manager',compact('target_path','disks','folders','files'));
	}

	private function parseDiskList($disk_list){
		if(empty($disk_list)){
			return [
				'Error Getting Disks'
			];
		}
		$disks = preg_split("/\R/",$disk_list);
		return $this->filterDisks($disks);
	}

	private function filterDisks($disks){
		$disks = array_values(array_filter($disks,function($disk){
			return !empty($disk) && !Str::contains($disk,'Caption');
		}));
		$disks = array_map(function($disk){
			return StringHelper::pathToDiskLetter($disk);
		},$disks);
		return array_values(array_unique($disks));
	}

	private function onlyFolders($contents){
		return array_values(array_filter($contents,function($content){
			return !empty($content) && !in_array($content,['.','..']) && is_dir(StringHelper::makePath($this->base_path,$content));
		}));
	}

	private function onlyFiles($contents){
		return array_values(array_filter($contents,function($content){
			return !empty($content) && !in_array($content,['.','..']) && !is_dir(StringHelper::makePath($this->base_path,$content));
		}));
	}

}