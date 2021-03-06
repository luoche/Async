<?php
/**
 * author: muyizixiu@outlook.com
 * date:  2017-04-27
 */
namespace Async\Task;

use Async\Manager;
abstract class Task{
	public $task_name = '';
	protected $task = null;
	protected $manager = null;
	protected $persist = false;
	protected $process_id = 0;

	function __construct($task_name,$task,$manager,$persist){
		$this->task = $task;
		$this->task_name = $task_name;
		$this->persist = $persist;
		$this->manager = $manager;
	}
	//任务初始化动作
	protected function init(){
		return $this->manager->taskRegister($this->task_name,$this->process_id);
	}
	//任务结束动作
	protected function deinit(){
		return $this->manager->taskLogout($this->task_name,$this->process_id);
	}
	//运行
	public function run($pid){
		$this->process_id = $pid;
	}
}
