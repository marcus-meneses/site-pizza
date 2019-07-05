<?php

class Index extends View 
{
	public function afterConstruct()
	{
	 
	$this->loadTemplateComponent('header');
	
	$this->loadWidget('fold_one');
	$this->loadWidget('about');
	$this->loadWidget('featured');
	$this->loadWidget('menus');
	$this->loadWidget('fold_last');

	$this->loadTemplateComponent('footer');
	
	}
}
