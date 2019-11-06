<?php

namespace FrameworkAULA\Routing;

use \Klein\Klein as Klein;

class Route extends Klein
{
	//"App\\Controllers\\Controller@Action"

	public function get($route, $call){
		if(is_string($call)){

			$explode = explode("@", $call);
			$controller = "App\\Controllers\\".$explode[0]."Controller";
			$action = $explode[1];
			$class = new $controller();
			$this->respond("GET", $route, function() use ($controller, $action) {
				return $class->action();
			});

		}else{
			$this->respond("GET", $route, $call);
		}
	}

	public function post($route, $call){

	}
}