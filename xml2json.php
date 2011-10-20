<?php 
/**
 * @author Matt Null - http://mattnull.com
 * Simple script to convert an XML API to a jsonp response
 */
 
//get params
$url = $_REQUEST['url'];
$callback = $_REQUEST['callback'];

//make cURL call
$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, $url);
curl_setopt($ch, CURLOPT_HEADER, 0);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
$buffer = curl_exec($ch);
curl_close($ch);
$xml_obj = simplexml_load_string($buffer);
echo $callback.'('.json_encode($xml_obj).');';
?>