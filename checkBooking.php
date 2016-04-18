<p id="s"><?php echo $_GET['s']; ?></p>
<p id="e"><?php echo $_GET['e']; ?></p>
<p id="moreThanTwoDaysBefore"><?php echo $_GET['moreThanTwoDaysBefore']; ?></p>
<p id="bookings">
    <?php
        include 'connect.php';


        $startDate=$_GET['s'];
        $endDate=$_GET['e'];
        $sql="SELECT * FROM bookings INNER JOIN desks ON bookings.deskID=desks.deskID INNER JOIN staff ON bookings.StaffID=staff.StaffID WHERE EndDate >= '".$startDate."' AND StartDate <= '".$endDate."'";

        //executing the above sql query with the connection already established
        $retval=mysqli_query($con,$sql);
        //if no data can be returned
        if(!$retval){
            //error is returned that the data could not be retrieved with the generated mysqli error
            die("Could not get data: ".mysqli_error($con));
        }

        //if there are no bookings within that timeframe returned
        if(mysqli_num_rows($retval)==0){

        }
        else{
            $bookings=mysqli_fetch_all($retval,MYSQLI_ASSOC);
            //print the data encoded in json format to this hidden paragraph to be used in javascript
            echo json_encode(array('success' => TRUE, 'bookings' => $bookings));
        }
    ?>
</p>