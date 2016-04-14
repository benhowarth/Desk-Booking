<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='dcc.css'/>
	<link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='dcc.js'></script>
</head>
<body>

    <div>
        <a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
    </input>
    </div>
    <p id="s"><?php echo $_GET['s']; ?></p>
    <p id="e"><?php echo $_GET['e']; ?></p>
    <p id="bookings">
        <?php
            include 'connect.php';
        
                
            $startDate=$_GET['s'];
            $endDate=$_GET['e'];
            $sql="SELECT * FROM bookings INNER JOIN desks ON bookings.deskID=desks.deskID WHERE deskGroup='DCC' AND EndDate >= '".$startDate."' AND StartDate <= '".$endDate."'";

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
    <h1 align="center"> DCC Team Desk Map </h1>
    <h3 align="center"> Click on a free desk to book it: </h3>
    <div class = div2 align="center">
    <table>
        <td><input type = "button" id="72" class = "DCC" value="2F/077" onClick=openBook('72','DCC'); value="Open Window">
        </input>
        <input type = "button" id="73" class = "DCC" value="2F/076" onClick=openBook('73','DCC'); value="Open Window">
        </input>
        <input type = "button" id="74" class = "DCC" value="2F/075" onClick=openBook('74','DCC'); value="Open Window">
        </input>
        <input type = "button" id="75" class = "DCC" value="2F/074" onClick=openBook('75','DCC'); value="Open Window">
        </input>
        <br>
        <input type = "button" id="76" class = "DCC" value="2F/078" onClick=openBook('76','DCC'); value="Open Window">
        </input>
        <input type = "button" id="77" class = "DCC" value="2F/079" onClick=openBook('77','DCC'); value="Open Window">
        </input>
        <input type = "button" id="78" class = "DCC" value="2F/080" onClick=openBook('78','DCC'); value="Open Window">
        </input>
        <input type = "button" id="79" class = "DCC" value="2F/081" onClick=openBook('79','DCC'); value="Open Window">
        </input>
        <br>
        <br>
        <input type = "button" id="81" class = "DCC" value="2F/091" onClick=openBook('81','DCC'); value="Open Window">
        </input>
        <input type = "button" id="82" class = "DCC" value="2F/090" onClick=openBook('82','DCC'); value="Open Window">
        </input>
        <input type = "button" id="83" class = "DCC" value="2F/089" onClick=openBook('83','DCC'); value="Open Window">
        </input>
        <input type = "button" id="84" class = "DCC" value="2F/088" onClick=openBook('84','DCC'); value="Open Window">
        </input>
        <br>
        <input type = "button" id="85" class = "DCC" value="2F/092" onClick=openBook('85','DCC'); value="Open Window">
        </input>
        <input type = "button" id="86" class = "DCC" value="2F/093" onClick=openBook('86','DCC'); value="Open Window">
        </input>
        <input type = "button" id="87" class = "DCC" value="2F/094" onClick=openBook('87','DCC'); value="Open Window">
        </input>
        <input type = "button" id="88" class = "DCC" value="2F/095" onClick=openBook('88','DCC'); value="Open Window">
        </input>
    </table>
    </div>

</body>
</html>