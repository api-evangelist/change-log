<?php
$route = '/change-log/:change_log_id/';
$app->delete($route, function ($change_log_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$change_log_id = prepareIdIn($change_log_id,$host);
	$change_log_id = mysql_real_escape_string($change_log_id);

	$Add = 1;
	$ReturnObject = array();

 	$request = $app->request();
 	$_POST = $request->params();

	$query = "DELETE FROM change_log WHERE change_log_id = " . $change_log_id;
	//echo $query . "<br />";
	mysql_query($query) or die('Query failed: ' . mysql_error());

	});
?>
