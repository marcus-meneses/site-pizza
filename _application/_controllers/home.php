<?php

class Home extends Controller 
{

	public function index( array $data = null ) 
    {

		$argvars['one'] = 1;
		$argvars['two'] = 2;
		$argvars['three'] = 3;
		$argvars['four'] = 4;
 
    	$indexView = $this->loadView('index', $argvars); 
	}

 
}
