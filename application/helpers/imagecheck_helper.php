<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

if ( ! function_exists('img_location'))
{
 function img_location($filePath){
	
	$filename ='http://54.225.90.100/application/'.$filePath;
	$imgFile='';
	$ch = curl_init($filename);

	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	// $retcode > 400 -> not found, $retcode = 200, found.
	if($retcode == 200){
		$imgFile='http://54.225.90.100/application/'.$filePath;
	}
	else{
		$imgFile='http://www.konekt.me/'.$filePath;
	}

	curl_close($ch);
	
	return $imgFile;
	}
}
if ( ! function_exists('img_location_gallary'))
{
 function img_location_gallary($filePath){
	
	$filename ='http://54.225.90.100/application/media/entryImagesGallary/'.$filePath;
	$imgFile='';
	$ch = curl_init($filename);

	curl_setopt($ch, CURLOPT_NOBODY, true);
	curl_exec($ch);
	$retcode = curl_getinfo($ch, CURLINFO_HTTP_CODE);
	// $retcode > 400 -> not found, $retcode = 200, found.
	if($retcode == 200){
		$imgFile='http://54.225.90.100/application/media/entryImagesGallary/'.$filePath;
	}
	else{
		$imgFile='http://konekt.me/Media/entriesImages/fullscreen/'.$filePath;
	}

	curl_close($ch);
	
	return $imgFile;
	}
}