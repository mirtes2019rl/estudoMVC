<?php

namespace frameworkAULA;


class System
{
	private $_url;
	private $_controller;
	private $_action;

	public function __construct(){
		$this->setUrl($_GET);
		$this->setController();
		$this->setAction();
	}

	public function getUrl(){
  		
	}

	public function setUrl($url){
		$this->url = $url;
	}

	public function getController(){
		return $controller;
	}

	public function setController(){
		$this->_controller = empty($this->url["controller"]) ? "Index" : 
		$this->url["controller"];
	}

	public function getAction(){
		return $action;
	}

	public function setAction(){
		$this->_action = empty($this->url["action"]) ? "Index" :
		$this->url["action"];
	}

	public function run(){
		$controller = "App\\Controllers\\".$this->_controller."Controller";
		$action = $this->_action;
		$instance = new $controller();
		$instance->$action();
	}

}