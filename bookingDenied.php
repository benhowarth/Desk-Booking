<html>
    <head>
        <title>Booking Confirmation</title>
        <link rel='stylesheet' href='deskBookingForm.css'/>
    </head>
    <body>
        <h1 align="center">Booking Denied</h1>
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
            
            //get deskID from url
            $deskID=$_GET["deskID"];
        
            //sql query to get the deskName from the deskID
            $sql="SELECT DeskName FROM `desks` WHERE DeskID=".$deskID;
            //executing the query
            $retval=mysqli_query($con,$sql);
            //if no data can be returned
            if(!$retval){
                //error is returned that the data could not be retrieved with the generated mysqli error
                die("Could not get data: ".mysqli_error());
            }
            //convert the result to an associative array
            $deskName=mysqli_fetch_array($retval,MYSQLI_ASSOC);
            //get the deskName from the new results array
            $deskName=$deskName["DeskName"];
        
            //get the default group from the url
            $defaultGroup=$_GET["defaultGroup"];
            //get the start date from the url
            $startDate=$_GET["startDate"];
            //get the end date from the url
            $endDate=$_GET["endDate"];
            //print opening paragraph tag and desk prefix
            echo "<p> Sorry, you can't book 2F/";
            //print the desk name
            echo $deskName;
            echo " for ";
            //print the start date
            echo $startDate;
            echo " to ";
            //print the end date
            echo $endDate;
            echo ".";
            //print 2 line breaks
            echo "<br/>";
            echo "<br/>";
            //print a link back to the desk booking form (parsing the same variables, deskID and defaultGroup)
            echo "<a href='deskBookingForm.php?deskID=".$deskID."&defaultGroup=".$defaultGroup."'>Go Back?</a>";
            //close the database connection
            mysqli_close($con);
        ?>
    </body>
</html>