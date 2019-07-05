<?php

class Entity
{
	

	
	public function afterConstruct()
	{
		
	}
	
	public function afterDestruct()
	{
		
	}


	private function __construct( $entityName, &$parentApp )
	{
		$this->name = $entityName;
		$this->App = &$parentApp;


        $this->loadDataAccessService(); 
		$this->afterConstruct(); // nothing will happen
	}


	public static function create( $entityName, $parentApp ) 
	{
		return new static( $entityName, $parentApp );
	}



	private function loadDataAccessService()
	{
		$serviceName = 'dataAccess';
		$serviceClassName = ucfirst( $serviceName );
	
		$fileForInclusion = SERVICES . '' . $serviceName . '.php';
		if ( file_exists( $fileForInclusion ) ) {
			include_once( $fileForInclusion );
			//$this->{$serviceName} = $serviceClassName::create( $this->name.'->'.$serviceName, $this->App );
			$this->dataAccess = $serviceClassName::create( $this->name.'->'.$serviceName, $this->App );
		}
		else {
			$this->App->exceptionsService->raise( 'serviceNotFound' );
		}
		
	}

		
}