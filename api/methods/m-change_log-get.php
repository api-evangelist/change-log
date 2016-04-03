<?php
$route = '/change-log/';
$app->get($route, function ()  use ($app,$contentType,$githuborg,$githubrepo){

	$ReturnObject = array();
	//$ReturnObject["contentType"] = $contentType;

	if($contentType == 'application/apis+json')
		{
		$app->response()->header("Content-Type", "application/json");

		$apis_json_url = "http://" . $githuborg . ".github.io/" . $githubrepo . "/apis.json";
		$apis_json = file_get_contents($apis_json_url);
		echo stripslashes(format_json($apis_json));
		}
	else
		{

	 	$request = $app->request();
	 	$params = $request->params();

		if(isset($params['query'])){ $query = trim(mysql_real_escape_string($params['query'])); } else { $query = '';}
		if(isset($params['page'])){ $page = trim(mysql_real_escape_string($params['page'])); } else { $page = 0;}
		if(isset($params['count'])){ $count = trim(mysql_real_escape_string($params['count'])); } else { $count = 50;}
		if(isset($params['sort'])){ $sort = trim(mysql_real_escape_string($params['sort'])); } else { $sort = 'Title';}
		if(isset($params['order'])){ $order = trim(mysql_real_escape_string($params['order'])); } else { $order = 'ASC';}

		if($query!='')
			{
			$Query = "SELECT * FROM change_log WHERE title LIKE '%" . $query . "%' OR header LIKE '%" . $query . "%' OR footer LIKE '%" . $query . "%'";
			}
		else
			{
			$Query = "SELECT * FROM change_log";
			}

		$Query .= " ORDER BY " . $sort . " " . $order . " LIMIT " . $page . "," . $count;
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
			}
	});
?>
