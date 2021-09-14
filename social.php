<?php

/*
$usmap = 'test.svg';
$usmap = '05-02-2021.svg';


try {
	$im = new Imagick();
	$im->setResolution(288,288);
	$im->setBackgroundColor(new ImagickPixel('transparent')); 

	$svg = file_get_contents($usmap);
	
	//$im->setFont("Roboto-Regular.ttf");
	$im->readImageBlob($svg);
	$im->setImageFormat("JPEG");
	$im->writeImage('png/percent.jpeg');

	header('Content-type: image/jpeg');
	echo $im;
} catch (ImagickException $e) 
{
	var_dump($e);
}
//echo $svg;

/*
$im->setImageFormat("png24");
$im->resizeImage(720, 445, imagick::FILTER_LANCZOS, 1); 

$im->writeImage('blank-us-map.png');

header('Content-type: image/png');
echo $im;

$im->clear();
$im->destroy();*/