<?php

namespace App\Http\Controllers;

use Illuminate\Validation\ValidationException;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use ValueError;
use Exception;

class TaskManagerController extends Controller {

	protected $removable_matches = [
		'AggregatorHost',
		'amdfendrsr',
		'ApplicationFrameHost',
		'atieclxx',
		'atiesrxx',
		'audiodg',
		'backgroundTaskHost',
		'cmd.exe',
		'conhost.exe',
		'crash_handler',
		'csrss',
		'ctfmon',
		'dasHost',
		'dllhost',
		'dwm.exe',
		'explorer.exe',
		'fontdrvhost',
		'lsass',
		'Memory Compression',
		'MoUsoCoreWorker',
		'MpDefenderCoreService',
		'MsMpEng',
		'NisSrv',
		'PhoneExperienceHost',
		'plugin_host-',
		'Registry',
		'RuntimeBroker',
		'SearchHost',
		'SearchIndexer',
		'SecurityHealthService',
		'services.exe',
		'ShellExperienceHost',
		'sihost',
		'smartscreen',
		'smss',
		'spoolsv',
		'StartMenuExperienceHost',
		'svchost',
		'System',
		'System Idle Process',
		'taskhostw',
		'tasklist',
		'TextInputHost',
		'TrustedInstaller',
		'UpdateService',
		'UserOOBEBroker',
		'vdhcoapp',
		'VSSVC',
		'WidgetService',
		'Widgets',
		'wininit',
		'winlogon',
		'WmiPrvSE',
		'WUDFHost',
	];

	public function index(Request $request){
		$task_list = shell_exec('Tasklist');
		$tasks = $this->parseTaskList($task_list);
		return view('task-list',compact('tasks'));
	}

	private function parseTaskList($task_list){
		if(empty($task_list)){
			return [
				'Error Getting Tasks'
			];
		}
		$tasks = preg_split("/\R/",$task_list);
		$tasks = array_slice($tasks,3);
		return $this->filterTasks($tasks);
	}

	private function filterTasks($tasks){
		$tasks = array_values(array_filter($tasks,function($task){
			return !empty($task) && !Str::contains($task,$this->removable_matches);
		}));
		$tasks = array_map(function($task){
			$exe_position = strpos($task,'.exe');
			if($exe_position !== false){
				$task = substr($task,0,$exe_position);
			}
			return ucfirst($task);
		},$tasks);
		return array_values(array_unique($tasks));
	}

}