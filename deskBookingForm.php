<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='deskBookingForm.css'/>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
	<script src='deskBookingForm.js'></script>
	<h1 align="center"> Desk Booking Form </h1>
</head>
<body>
    <?php
		$host="localhost";
		$user="root";
		$password="";
		$con=mysqli_connect($host,$user,$password,'deskbooking');
		if(!$con) {
			echo "";
		} else {
            echo "";
		}
        $staffGroup=htmlentities($_POST['staffGroupInput']);
        echo $staffGroup;
         $sql='SELECT * FROM staff WHERE StaffGroup='+$staffGroup;
        $retval=mysqli_query($con,$sql);
        if(!$retval){
            die("Could not get data: ".mysqli_error());
        }
        foreach($retval as $staff){
            echo "<option value=";
            echo $staff["StaffID"];
            echo ">";
            echo $staff["StaffName"];
            echo "</option>";
        }
    ?>
    <h3 align="center"> Please fill out the fields below: </h3>
    <form method="post">
        <table>
            <tr>
                <td> Name </td>
                <td> <select id="staffNameInput" name="staffNameInput"></select> </td>
            </tr>
            <tr>
            <td> Department </td> 
            <td>
                <select id="staffGroupInput" name="staffGroupInput">
                <option value"DCC"> DCC </option>
                <option value"PAYG"> PAYG </option>
                <option value"Asset Ops"> Asset Ops </option>
                <option value"Assurance"> Assurance </option>
                <option value"BA"> BA </option>
                <option value"Hotdesk"> None (Hotdesking) </option>
                </select>
            </td>
            </tr>
            <tr>
                <td> Start Date </td>
                <td> <input id="startDateInput" name="startDateInput" type="date"> </td> 
            </tr>
            <tr>
                <td> End Date </td>
                <td> <input id="endDateInput" name="endDateInput" type="date"> </td>
            </tr>
        </table>
        <input type="submit">
    </form>
    <?php
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                $staffID=htmlentities($_POST['staffNameInput']);
                $deskID=$_GET["deskID"];
                $startDate=htmlentities($_POST['startDateInput']);
                $endDate=htmlentities($_POST['endDateInput']);
                $sql="INSERT INTO bookings (StaffID,DeskID,StartDate,EndDate) VALUES ('$staffID','$deskID','$startDate','$endDate')";
                $retval=mysqli_query($con,$sql);
                if(!$retval){
                    die("Could not get data: ".mysqli_error());
                }
                header("Refresh:2; url=testDB.php");
            }	

        mysqli_close($con);
    ?>
</body>
</html>