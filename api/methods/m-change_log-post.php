<?php
$route = '/change-log/';
$app->post($route, function () use ($app){

 	$request = $app->request();
 	$params = $request->params();

	if(isset($params['title'])){ $title = mysql_real_escape_string($params['title']); } else { $title = date('Y-m-d H:i:s'); }
	if(isset($params['image'])){ $image = mysql_real_escape_string($params['image']); } else { $image = ''; }
	if(isset($params['header'])){ $header = mysql_real_escape_string($params['header']); } else { $header = ''; }
	if(isset($params['footer'])){ $footer = mysql_real_escape_string($params['footer']); } else { $footer = ''; }

  $Query = "SELECT * FROM change_log WHERE title = '" . $title . "'";
	//echo $Query . "<br />";
	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());

	if($Database && mysql_num_rows($Database))
		{
		$Thischange_log = mysql_fetch_assoc($Database);
		$change_log_id = $Thischange_log['ID'];
		}
	else
		{
		$Query = "INSERT INTO change_log(title,image,header,footer)";
		$Query .= " VALUES(";
		$Query .= "'" . mysql_real_escape_string($title) . "',";
		$Query .= "'" . mysql_real_escape_string($image) . "',";
		$Query .= "'" . mysql_real_escape_string($header) . "',";
		$Query .= "'" . mysql_real_escape_string($footer) . "'";
		$Query .= ")";
		//echo $Query . "<br />";
		mysql_query($Query) or die('Query failed: ' . mysql_error());
		$change_log_id = mysql_insert_id();
		}

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
