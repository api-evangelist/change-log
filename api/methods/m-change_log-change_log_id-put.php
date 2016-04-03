<?php
$route = '/change-log/:change_log_id/';
$app->put($route, function ($change_log_id) use ($app){

	$host = $_SERVER['HTTP_HOST'];
	$change_log_id = prepareIdIn($change_log_id,$host);
	$change_log_id = mysql_real_escape_string($change_log_id);

	$ReturnObject = array();

 	$request = $app->request();
 	$params = $request->params();

	if(isset($params['title'])){ $title = mysql_real_escape_string($params['title']); } else { $title = date('Y-m-d H:i:s'); }
	if(isset($params['image'])){ $image = mysql_real_escape_string($params['image']); } else { $image = ''; }
	if(isset($params['header'])){ $header = mysql_real_escape_string($params['header']); } else { $header = ''; }
	if(isset($params['footer'])){ $footer = mysql_real_escape_string($params['footer']); } else { $footer = ''; }

  $Query = "SELECT * FROM change_log WHERE ID = " . $change_log_id;
	//echo $Query . "<br />";
	$Database = mysql_query($Query) or die('Query failed: ' . mysql_error());

	if($Database && mysql_num_rows($Database))
		{
		$query = "UPDATE change_log SET ";
		$query .= "title = '" . mysql_real_escape_string($title) . "'";
		$query .= ", image = '" . mysql_real_escape_string($image) . "'";
		$query .= ", header = '" . mysql_real_escape_string($header) . "'";
		$query .= ", footer = '" . mysql_real_escape_string($footer) . "'";
		$query .= " WHERE change_log_id = " . $change_log_id;
		//echo $query . "<br />";
		mysql_query($query) or die('Query failed: ' . mysql_error());
		}

	$title = $Database['title'];
	$image = $Database['image'];
	$header = $Database['header'];
	$footer = $Database['footer'];

	$KeysQuery = "SELECT * from keys k";
	$KeysQuery .= " WHERE change_log_id = " . $change_log_id;
	$KeysQuery .= " ORDER BY name ASC";
	$KeysResults = mysql_query($KeysQuery) or die('Query failed: ' . mysql_error());

	$change_log_id = prepareIdOut($change_log_id,$host);

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
	echo stripslashes(format_json(json_encode($ReturnObject)));

	});
?>
