<?php

// Connect database

	$connection=mysqli_connect('us-cdbr-iron-east-05.cleardb.net','b9958e7b728556','32477038','heroku_c7a583b05ad8df3');

	$request_method=$_SERVER["REQUEST_METHOD"];
	switch($request_method)
	{
		case 'GET':
			// Display Student melalui id
			if(!empty($_GET["id"]))
			{
				$id=intval($_GET["id"]);
				get_student($id);
			}
			else
			{
				// Display semua student
				get_student();
			}
			break;
		case 'POST':
			// Insert new Student
			insert_student();
			break;
		
	}
	
	function get_student($id=0)
	{
		global $connection;
		$query="SELECT * FROM students";
		if($id != 0)
		{
			$query.=" WHERE id=".$id." LIMIT 1";
		}
		$response=array();
		$result=mysqli_query($connection, $query);
		while($row=mysqli_fetch_array($result))
		{
			$response[]=$row;
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	?>
	<?php

function insert_student()
	{
		global $connection;
		$name=$_POST["name"];
		$year=$_POST["year"];
		$university=$_POST["university"];
		$query="INSERT INTO students SET name='{$name}', year={$year}, university='{$university}'";
		if(mysqli_query($connection, $query))
		{
			$response=array(
				'status' => 1,
				'status_message' =>'Student Added Successfully.'
			);
		}
		else
		{
			$response=array(
				'status' => 0,
				'status_message' =>'Student Addition Failed.'
			);
		}
		header('Content-Type: application/json');
		echo json_encode($response);
	}
	
	mysqli_close($connection);
	
	
	?>