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
        echo "Staff:<br/>";
        foreach($retval as $staff){
            echo $staff["StaffID"];
            echo ' ';
            echo $staff["StaffName"];
            echo ' ';
            echo $staff["StaffGroup"];
            echo '<br/>';
        }
        $sql='SELECT * FROM desks';
		$retval=mysqli_query($con,$sql);
		if(!$retval){
			die("Could not get data: ".mysqli_error());
		}
        echo "<br/>Desks:<br/>";
        foreach($retval as $staff){
            echo $staff["DeskID"];
            echo ' ';
            echo "2F/",$staff["DeskName"];
            echo ' ';
            echo $staff["DeskGroup"];
            echo '<br/>';
        }
    
        $sql='SELECT * FROM bookings';
		$retval=mysqli_query($con,$sql);
		if(!$retval){
			die("Could not get data: ".mysqli_error());
		}
        echo "<br/>Bookings:<br/>";
        foreach($retval as $staff){
            echo $staff["BookingID"];
            echo ' ';
            echo $staff["DeskID"];
            echo ' ';
            echo $staff["StaffID"];
            echo ' ';
            echo $staff["StartDate"];
            echo ' ';
            echo $staff["EndDate"];
            echo '<br/>';
        }
    
        $sql='SELECT bookings.BookingID, staff.StaffName, bookings.StartDate, bookings.EndDate FROM bookings INNER JOIN staff ON bookings.StaffID=staff.StaffID';
		$retval=mysqli_query($con,$sql);
		if(!$retval){
			die("Could not get data: ".mysqli_error());
		}
        echo "<br/>Bookings:<br/>";
        foreach($retval as $staff){
            echo $staff["BookingID"];
            echo ' ';
            echo $staff["StaffName"];
            echo ' ';
            echo $staff["StartDate"];
            echo ' ';
            echo $staff["EndDate"];
            echo '<br/>';
        }
    
        $sql='SELECT bookings.BookingID, staff.StaffName, desks.DeskName, bookings.StartDate, bookings.EndDate FROM bookings INNER JOIN staff ON bookings.StaffID=staff.StaffID INNER JOIN desks ON bookings.DeskID=desks.DeskID';
		$retval=mysqli_query($con,$sql);
		if(!$retval){
			die("Could not get data: ".mysqli_error());
		}
        echo "<br/>Bookings:<br/>";
        foreach($retval as $staff){
            echo $staff["BookingID"];
            echo ' ';
            echo $staff["StaffName"];
            echo ' ';
            echo "2F/",$staff["DeskName"];
            echo ' ';
            echo $staff["StartDate"];
            echo ' ';
            echo $staff["EndDate"];
            echo '<br/>';
        }
    
		
		mysqli_close($con);
		?>
</body>
</html>