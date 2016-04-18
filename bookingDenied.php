<html>
    <head>
        <title>Booking Denied</title>
        <link rel='stylesheet' href='bookingDenied.css'/>
        <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    </head>
    <body>
        <h1 align="center">Booking Denied</h1>
        <p>Sorry, you can't book this desk as you have already booked your maximum number of days for this week.</p>
        <br/>
        <p>The bookings causing this issue are:</p>
        <br/>
        <?php
            include 'connect.php';
        
            $staffID=$_GET['staffID'];
            $startDate=$_GET['startDate'];
            $endDate=$_GET['endDate'];
            $guestName=$_GET['guestName'];
                
            //if user isn't a guest
            if($staffID!="0"){
                //sql query that checks for bookings for the desk with the deskID selected between the start and end dates selected
                $sql="SELECT * FROM bookings INNER JOIN desks ON bookings.DeskID=desks.DeskID WHERE StaffID='".$staffID."' AND ((SELECT DATEDIFF(EndDate,'".$startDate."'))<=2 AND (SELECT DATEDIFF(StartDate,'".$endDate."'))>=-2)";
            }
            //if user is a guest
            else{
                $sql="SELECT * FROM bookings INNER JOIN desks ON bookings.DeskID=desks.DeskID WHERE GuestName='".$guestName."' AND ((SELECT DATEDIFF(EndDate,'".$startDate."'))<=2 AND (SELECT DATEDIFF(StartDate,'".$endDate."'))>=-2)";
            }

            //executing the above sql query with the connection already established
            $retval=mysqli_query($con,$sql);
            //if no data can be returned
            if(!$retval){
                //error is returned that the data could not be retrieved with the generated mysqli error
                die("Could not get data: ".mysqli_error($con));
            }
        
            foreach($retval as $booking){
                echo '<p>';
                echo "<span class='badBooking'><strong>2F/";
                echo $booking['DeskName'];
                echo '</strong> for <strong>';
                echo $booking['StartDate'];
                echo '</strong> to <strong>';
                echo $booking['EndDate'];
                echo '</strong> (Booking ID: ';
                echo $booking['BookingID'];
                echo ')';
                echo '</span></p>';
                echo '<br/>';
            }
            echo '<br/>';
            echo '<p>Please close this window and try another date.</p>';
        ?>
        <form align="center">
            <input type="button" value="Restart Your Booking" onclick="self.close()" class="myButton"></input>
        </form>
    </body>
</html>