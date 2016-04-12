<html>
    <head>
        <title>Booking Confirmation</title>
    </head>
    <body>
        <h1>Booking Confirmed</h1>
        <p>Your booking ID is: <?php /* prints the booking id for the user's use */ echo $_GET['id'] ?></p>
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
            //sql query to use the booking id to get the booking's id, name of the staff member, name of the desk, start and end date and the name of the guest, if it exists using inner joins of the three tables bookings, staff and desks
            $sql='SELECT bookings.BookingID, staff.StaffName, desks.DeskName, bookings.StartDate, bookings.EndDate, bookings.GuestName FROM bookings INNER JOIN staff ON bookings.StaffID=staff.StaffID INNER JOIN desks ON bookings.DeskID=desks.DeskID WHERE BookingID='.$_GET['id'];
            //executing the query
            $retval=mysqli_query($con,$sql);
            //if no data can be returned
            if(!$retval){
                //error is returned that the data could not be retrieved with the generated mysqli error
                die("Could not get data: ".mysqli_error());
            }
            //for every row returned, run this loop (should only be one row, but this format is used for simplicity's sake)
            foreach($retval as $staff){
                //print line break
                echo '<br/>';
                //print beginning paragraph tag
                echo "<p>";
                echo 'Desk ';
                //print desk prefix and booked desk name
                echo "2F/",$staff["DeskName"];
                echo ' is reserved for ';
                //print the staff member's name that booked the desk
                echo $staff["StaffName"];
                
                //if there is a guest name
                if($staff["GuestName"]){
                    //staff member name printed will be guest so the typed guest name will be printed in brackets
                    echo" (";
                    echo $staff["GuestName"];
                    echo")";
                }
                
                echo ' from ';
                //print the starting date of the booking
                echo $staff["StartDate"];
                echo ' to ';
                //print the ending date of the booking
                echo $staff["EndDate"];
                echo ".";
                //print ending paragraph tag
                echo "</p>";
            }
            //close the database connection
            mysqli_close($con);
        ?>
    </body>
</html>