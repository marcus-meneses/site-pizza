<!DOCTYPE html>
<html>
<head> 



  
<?php
  if (isset($this->data['facebookOG'])) {
    echo $this->data['facebookOG'];
  }
?>

<meta charset="UTF-8">
<meta http-equiv="Content-type" content="text/html; charset=UTF-8">
<meta http-equiv="Cache-control" content="public">

<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1.0, user-scalable=no">
<title><?php echo $config['appname'];?></title>

  <?php

  	$this->loadCss('bootstrap.min');

    $this->loadCss('animate');  
    //$this->loadFont('icomoon');
    //$this->loadFont('simple-line-icons');
    $this->loadFont('material');
    $this->loadFont('ufont');
 	  //$this->loadCss('bootstrap-datetimepicker.min');
    $this->loadCss('flexslider');


    //$this->loadCss('main');
    $this->loadCss('style');
    $this->loadJs('modernizr-2.6.2.min');



  ?>
<!--[if lt IE 9]><script src=https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js></script><script src=https://oss.maxcdn.com/respond/1.4.2/respond.min.js></script><![endif]-->
</head>

<body>

    <!--[if lt IE 8]>
        <p class="browserupgrade">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> to improve your experience.</p>
    <![endif]-->  

    <!-- Body main wrapper start -->
    <div class="wrapper" id="fh5co-container" >
  
       

