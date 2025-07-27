<?php

class Task {

    public $task_name;
    public $isCompleted;

    public function __construct($task_name, $isCompleted) {
        $this->task_name = $task_name;
        $this->isCompleted = $isCompleted;
    }

}