<html>
<head>
    <title>Database Tests</title>
</head>
<body>
    <p>yo</p>
    <?php
		$host="localhost";
		$user="root";
		$password="";
		$con=mysqli_connect($host,$user,$password);
		if(!$con) {
			echo "<p>MySQL Server is not connected</p>";
		} else {
            echo "<p>MySQL Server is connected</p>";
		}
		
		
		mysqli_close($con);
		?>
</body>
</html>