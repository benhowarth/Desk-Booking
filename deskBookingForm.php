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
        //the ip of the database (localhost for testing)
		$host="localhost";
        //the username for accessing the database
		$user="root";
        //the password for accessing the database
		$password="";
        //the mysqli connection variable, including the ip, username, password and the database name.
		$con=mysqli_connect($host,$user,$password,'deskbooking');
		//if statement for testing if the cliet has connected
        if(!$con) {
            //prints an error if not connected
			echo "A connection to the database cannot be found";
		}
        //the default, or desk seating group, is gotten from the variables in the url and parsed into this variable
        $defaultGroup=$_GET["defaultGroup"];
        //print defaultGroup to this hidden paragraph, so it can be used in javascript
        echo $defaultGroup;
    ?>
    </p>
    <p id="phpInfo">
    <?php
        //initial sql statement for grabbing the entire staff table
        $sql='SELECT * FROM staff';
        //executing the query above with the already established connection
        $retval=mysqli_query($con,$sql);
        //if no data can be returned
        if(!$retval){
            //error is returned that the data could not be retrieved with the generated mysqli error
            die("Could not get data: ".mysqli_error());
        }
        //converting the raw mysqli result into an associative array
        $staffList=mysqli_fetch_all($retval,MYSQLI_ASSOC);
        //print the data encoded in json format to this hidden paragraph to be used in javascript
        echo json_encode(array('success' => TRUE, 'staffList' => $staffList));
    ?>
    </p>
    <p id="moreThanTwoDaysBefore"><?php echo $_GET["moreThanTwoDaysBefore"] ?></p>
    <h2 id="deskName" name="deskName" align="center">
        <?php
            //get the deskID variable from the url
            $deskIDUrl=$_GET["deskID"];
            //the sql for getting the deskName of the desk with the id of deskIDURL from the table desks
            $sql="SELECT DeskName FROM `desks` WHERE DeskID=".$deskIDUrl;
            //executing the above sql query with the connection already established
            $retval=mysqli_query($con,$sql);
            //if no data can be returned
            if(!$retval){
                //error is returned that the data could not be retrieved with the generated mysqli error
                die("Could not get data: ".mysqli_error());
            }
            //converting the raw mysqli result into an associative array
            $deskNameAr=mysqli_fetch_array($retval,MYSQLI_ASSOC);
            //getting the deskName from the array
            $deskName=$deskNameAr["DeskName"];
            //printing the prefix of all the desks
            echo "2F/";
            //printing the retrieved name of the desk
            echo $deskName;
            //for the desk called '64', the final printed name would read '2F/64'
        ?>    
    </h2>
    <h3 align="center"> Please fill out the fields below: </h3>
    <form name="deskForm" id="deskForm" method="post">
        <table>
            <tr>
                <td> Name </td>
                <td>
                    <select id="staffNameInput" name="staffNameInput" required></select>
                    <input id="guestNameInput" name="guestNameInput"></input>
                </td>
            </tr>
            <tr>
            <td> Department </td> 
            <td>
                <select id="staffGroupInput" name="staffGroupInput" required>
                <option value="DCC"> DCC </option>
                <option value="PAYG"> PAYG </option>
                <option value="AssetOps"> Asset Ops </option>
                <option value="Assurance"> Assurance </option>
                <option value="BA"> BA </option>
                <option value="Hotdesk"> None (Hotdesking) </option>
                </select>
            </td>
            </tr>
        </table>
        <div align="center">
            <input id="submitButton" class="myButton" onclick="document.deskForm.submit();" value="Submit" type="submit" align="center"></input>
        </div>
    </form>
    <?php
        //if the above form is submitted
        if($_SERVER['REQUEST_METHOD'] == 'POST'){
                //getting the ID value from the staffNameInput dropdown menu, which displays the name but returns the ID as the value
                $staffID=htmlentities($_POST['staffNameInput']);
                //getting the guestName from the guestNameInput, which is only visible if the user is 'hotdesking' and a guest otherwise it should not be seen and therefore blank
                $guestName=htmlentities($_POST['guestNameInput']);
                //getting the deskID variable that was parsed into the url
                $deskID=$_GET["deskID"];
                //getting the date value of the booking startDateInput
                $startDate=$_GET["startDate"];
                //getting the date value of the booking endDateInput    
                $endDate=$_GET["endDate"];
                //getting the string value of the staffGroupInput
                $staffGroup=htmlentities($_POST['staffGroupInput']);
            
                if($staffID!="0"){
                //sql query that checks for bookings for the desk with the deskID selected between the start and end dates selected
                $sql="SELECT * FROM bookings WHERE StaffID='".$staffID."' AND ((SELECT DATEDIFF(EndDate,'".$startDate."'))<=2 AND (SELECT DATEDIFF(StartDate,'".$endDate."'))>=-2)";
            }
            //if user is a guest
            else{
                $sql="SELECT * FROM bookings WHERE GuestName='".$guestName."' AND ((SELECT DATEDIFF(EndDate,'".$startDate."'))<=2 AND (SELECT DATEDIFF(StartDate,'".$endDate."'))>=-2)";
            }
            
                //executing the above sql query with the connection already established
                $retval=mysqli_query($con,$sql);
                //if no data can be returned
                if(!$retval){
                    //error is returned that the data could not be retrieved with the generated mysqli error
                    die("Could not get data: ".mysqli_error($con));
                }
                $resultAr=mysqli_fetch_all($retval,MYSQLI_ASSOC);;
                //echo json_encode(array('success' => TRUE, 'bookings' => $resultAr));
                //echo json_encode(array('success' => TRUE, 'bookings' => $resultAr));
                
                if(mysqli_num_rows($retval)==0){
                    if($staffID!="0"){
                        //sql query to insert the staffID, deskID, startDate and endDate into a new entry in the bookings table
                        $sql="INSERT INTO bookings (StaffID,DeskID,StartDate,EndDate) VALUES ('$staffID','$deskID','$startDate','$endDate')";
                    }
                    //if the user is 'hotdesking'
                    else{
                        //sql query to insert the staffID, deskID, startDate, endDate and guestName (as they are a guest and aren't in the staff table) into a new entry in the bookings table
                        $sql="INSERT INTO bookings (StaffID,DeskID,StartDate,EndDate,GuestName
    ) VALUES ('0','$deskID','$startDate','$endDate','$guestName')";
                    }

                    //execute the chosen query, based on whether the user is 'hotdesking' or not with the established database connection
                    $retval=mysqli_query($con,$sql);
                    //if the query cannot be executed
                    if(!$retval){
                        //print an error message
                        die("Couldn't insert data: ".mysqli_error($con));
                    }
                    //redirect to the booking confirmation page, parsing the bookingID for further use on that page
                    die("<script>location.href = 'bookingConfirmation.php?id=".mysqli_insert_id($con)."';</script>");
                }
                else{
                    die("<script>location.href = 'bookingDenied.php?staffID=".$staffID."&startDate=".$startDate."&endDate=".$endDate."&guestName=".$guestName."';</script>");
                }
                exit;
        }
        //close the database connection
        mysqli_close($con);
    ?>
</body>
</html>