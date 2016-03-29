<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='deskBookingForm.css'/>
	<script src="jquery.js"></script>
	<script src='deskBookingForm.js'></script>
	<h1 align="center"> Desk Booking Form </h1>
</head>
<body>
    <p id="phpDefaultGroup">
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
        //header('Content-Type: application/json');
        $defaultGroup=$_GET["defaultGroup"];
        echo $defaultGroup;
        /*foreach($retval as $staff){
            echo "<option value=";
            echo $staff["StaffID"];
            echo ">";
            echo $staff["StaffName"];
            echo "</option>";
        }*/
    ?>
    </p>
    <p id="phpInfo">
    <?php
        $sql='SELECT * FROM staff';
        $retval=mysqli_query($con,$sql);
        if(!$retval){
            die("Could not get data: ".mysqli_error());
        }
        $staffList=mysqli_fetch_all($retval,MYSQLI_ASSOC);
        //header('Content-Type: application/json');
        echo json_encode(array('success' => TRUE, 'staffList' => $staffList));
        /*foreach($retval as $staff){
            echo "<option value=";
            echo $staff["StaffID"];
            echo ">";
            echo $staff["StaffName"];
            echo "</option>";
        }*/
    ?>
    </p>
    <h2 id="deskName" name="deskName" align="center">
        <?php
            $deskIDUrl=$_GET["deskID"];
            $sql="SELECT DeskName FROM `desks` WHERE DeskID=".$deskIDUrl;
            $retval=mysqli_query($con,$sql);
            if(!$retval){
                die("Could not get data: ".mysqli_error());
            }
            $deskNameAr=mysqli_fetch_array($retval,MYSQLI_ASSOC);
            $deskName=$deskNameAr["DeskName"];
            echo "2F/";
            echo $deskName;
        ?>    
    </h2>
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
                <option value="DCC"> DCC </option>
                <option value="PAYG"> PAYG </option>
                <option value="AssetOps"> Asset Ops </option>
                <option value="Assurance"> Assurance </option>
                <option value="BA"> BA </option>
                <option value="Hotdesk"> None (Hotdesking) </option>
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
            
                $sql="SELECT * FROM bookings WHERE deskID=".$deskID." AND EndDate >= '".$startDate."' AND StartDate <= '".$endDate."'";
                $retval=mysqli_query($con,$sql);
                if(!$retval){
                    die("Couldn't get data: ".mysqli_error());
                }
                
                /*foreach($retval as $bookings){
                    echo $bookings["BookingID"];
                    echo " ";
                    echo $bookings["StaffID"];
                    echo " ";
                    echo $bookings["DeskID"];
                    echo " ";
                    echo $bookings["StartDate"];
                    echo " ";
                    echo $bookings["EndDate"];
                    echo "<br/>";
                }*/
                
                if(mysqli_num_rows($retval)==0){
                    $sql="INSERT INTO bookings (StaffID,DeskID,StartDate,EndDate) VALUES ('$staffID','$deskID','$startDate','$endDate')";
                    $retval=mysqli_query($con,$sql);
                    if(!$retval){
                        die("Couldn't insert data: ".mysqli_error());
                    }
                    header("Refresh:2; url=bookingConfirmation.php?id=".mysqli_insert_id($con));
                }
                else{
                    header("Refresh:2; url=bookingDenied.php?startDate=".$startDate."&endDate=".$endDate."&deskID=".$deskIDUrl."&defaultGroup=".$defaultGroup);
                }
                exit;
        }
        mysqli_close($con);
    ?>
</body>
</html>