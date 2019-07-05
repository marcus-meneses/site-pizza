<?php

class Controller 
{
	private $name;
	private $jsCode;

	public $App; 
	
	private function __construct( $controllerName, &$parentApp, $urldata )
	{
		global $autoload;
		global $config;

		$this->urlData = $urldata;		
		$this->name = $controllerName;
		$this->App = &$parentApp;
		
		// load default services
		for ( $i = 0; $i < sizeOf( $autoload['services'] ); $i++) {
			$this->loadService( $autoload['services'][$i] );
		}
		
		// load default models
		for ( $i = 0; $i < sizeOf( $autoload['entities'] ); $i++) {
			$this->loadEntity( $autoload['entities'][$i] );
		}

		if ( $config['template']!=false ) {
			
			define( 'TEMPLATE',  	TEMPLATES .$config['template'].'/templates/' );

		}
		
		$this->afterConstruct();
	}
	
	public function __destruct()
	{
		global $config;
	
		$this->afterDestruct();
	}

	public static function create( $controllerName, $parentApp, $urlData = null ) 
	{
		return new static( $controllerName, $parentApp, $urlData );
	}

	
 
	
	public function greet()
	{
		echo "Controller <b>" . $this->name . "</b> Online <br/>";
	}
	
	public function loadView( $viewName, $data = null ) 
	{
		$viewClassName = ucfirst( $viewName );

		$fileForInclusion =  VIEWS . $this->name . '/' . $viewName . '.php' ;

		//echo $fileForInclusion;

		if ( file_exists( $fileForInclusion ) ) {
			require_once( $fileForInclusion );
			return $viewClassName::create( $viewName, $this->App, $data, $this->urlData );
		}
		else {
			$this->App->exceptionsService->raise( 'viewNotFound' );
		}

	}
	
public function loadEntity( $entityName ) 
	{
		$entityClassName = ucfirst( $entityName ).'Entity';
		$fileForInclusion = ENTITIES . $entityName . 'Entity.php';

		//print_r($facadeClassName.'</br>');
		//print_r($facadeName);

		if ( file_exists( $fileForInclusion ) ) {
			include_once( $fileForInclusion );
			$this->{$entityName.'Entity'} = $entityClassName::create( $entityName.'Entity', $this->App );
		}
		else {
			$this->App->exceptionsService->raise( 'entityNotFound' );
		}
	}
	
	public function loadService( $serviceName )
	{
		$serviceClassName = ucfirst( $serviceName );
	
		$fileForInclusion = SERVICES . '' . $serviceName . '.php';
		if ( file_exists( $fileForInclusion ) ) {
			include_once( $fileForInclusion );
			$this->{$serviceName.'Service'} = $serviceClassName::create( $this->name.'->'.$serviceName, $this->App );
		}
		else {
			$this->App->exceptionsService->raise( 'serviceNotFound' );
		}
		
	}
	
	public function stackJavaScript( $javaScriptCode ) 
	{
		$this->jsCode = $this->jsCode.$javaScriptCode;
	}
	
	public function dumpJavaScript()
	{
		echo $this->jsCode;
	}

	protected function afterConstruct()
	{
		
	}
	
	protected function afterDestruct()
	{
		
	}	
}