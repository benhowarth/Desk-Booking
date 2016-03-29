<html>
    <head>
        <title>Booking Confirmation</title>
    </head>
    <body>
        <h1>Booking Denied</h1>
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
            $deskID=$_GET["deskID"];
        
            $sql="SELECT DeskName FROM `desks` WHERE DeskID=".$deskID;
            $retval=mysqli_query($con,$sql);
            if(!$retval){
                die("Could not get data: ".mysqli_error());
            }
            $deskName=mysqli_fetch_array($retval,MYSQLI_ASSOC);
            $deskName=$deskName["DeskName"];
        
            $defaultGroup=$_GET["defaultGroup"];
            $startDate=$_GET["startDate"];
            $endDate=$_GET["endDate"];
            echo "<p> Sorry, you can't book 2F/";
            echo $deskName;
            echo " for ";
            echo $startDate;
            echo " to ";
            echo $endDate;
            echo ".";
            echo "<br/>";
            echo "<br/>";
            echo "<a href='deskBookingForm.php?deskID=".$deskID."&defaultGroup=".$defaultGroup."'>Go Back?</a>";
            mysqli_close($con);
        ?>
    </body>
</html>