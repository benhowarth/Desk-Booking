<html>
    <head>
        <title>Booking Confirmation</title>
    </head>
    <body>
        <h1>Booking Confirmed</h1>
        <p>Your booking ID is: <?php echo $_GET['id'] ?></p>
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
            $sql='SELECT bookings.BookingID, staff.StaffName, desks.DeskName, bookings.StartDate, bookings.EndDate FROM bookings INNER JOIN staff ON bookings.StaffID=staff.StaffID INNER JOIN desks ON bookings.DeskID=desks.DeskID WHERE BookingID='.$_GET['id'];
            $retval=mysqli_query($con,$sql);
            if(!$retval){
                die("Could not get data: ".mysqli_error());
            }
            foreach($retval as $staff){
                echo '<br/>';
                echo "<p>";
                echo 'Desk ';
                echo "2F/",$staff["DeskName"];
                echo ' is reserved for ';
                echo $staff["StaffName"];
                echo ' from ';
                echo $staff["StartDate"];
                echo ' to ';
                echo $staff["EndDate"];
                echo ".";
                echo "</p>";
            }
        ?>
    </body>
</html>