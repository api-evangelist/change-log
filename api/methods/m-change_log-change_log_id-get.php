<?php
$route = '/change-log/:change_log_id/';
$app->get($route, function ($change_log_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$change_log_id = prepareIdIn($change_log_id,$host);
	$change_log_id = mysql_real_escape_string($change_log_id);

	$ReturnObject = array();
 	$Query = "SELECT * FROM change_log WHERE change_log_id = " . $change_log_id;
 	$DatabaseResult = mysql_query($Query) or die('Query failed: ' . mysql_error());

 	while ($Database = mysql_fetch_assoc($DatabaseResult))
 		{

 		$change_log_id = $Database['change_log_id'];
 		$title = $Database['title'];
 		$image = $Database['image'];
 		$header = $Database['header'];
 		$footer = $Database['footer'];

 		$HistoryQuery = "SELECT * from change_log_history k";
 		$HistoryQuery .= " WHERE change_log_id = " . $change_log_id;
 		$HistoryQuery .= " ORDER BY title ASC";
 		$HistoryResults = mysql_query($HistoryQuery) or die('Query failed: ' . mysql_error());

 		$change_log_id = prepareIdOut($change_log_id,$host);

 		$F = array();
 		$F['change_log_id'] = $change_log_id;
 		$F['title'] = $title;
 		$F['image'] = $image;
 		$F['header'] = $header;
 		$F['footer'] = $footer;

 		// Keys
 		$F['history'] = array();
 		while ($History = mysql_fetch_assoc($HistoryResults))
 			{
 			$name = $History['name'];
 			$description = $History['description'];
      $url = $History['url'];
      $date = $History['date'];

 			$K = array();
 			$K['title'] = $title;
 			$K['description'] = $description;
      $K['url'] = $url;
      $K['date'] = $date;
 			array_push($F['history'], $K);
 			}

 		$ReturnObject = $F;
 		}

		$app->response()->header("Content-Type", "application/json");
		echo format_json(json_encode($ReturnObject));
	});
?>
