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
		$con=mysqli_connect($host,$user,$password,'deskbooking');
		if(!$con) {
			echo "<p>MySQL Server is not connected</p>";
		} else {
            echo "<p>MySQL Server is connected</p>";
		}
        $sql='SELECT * FROM staff';
		$retval=mysqli_query($con,$sql);
		if(!$retval){
			die("Could not get data: ".mysqli_error());
		}
        foreach($retval as $staff){
            echo $staff["StaffID"];
            echo ' ';
            echo $staff["StaffName"];
            echo ' ';
            echo $staff["StaffGroup"];
            echo '<br/>';
        }
		
		mysqli_close($con);
		?>
</body>
</html>