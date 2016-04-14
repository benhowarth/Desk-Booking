<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='payg.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src='bookingOpen.js'></script>
	<script src='payg.js'></script>
</head>
<body>

    <div>
        <a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
    </input>
    </div>
    <?php include "checkBooking.php"; ?>
    <h1 align="center"> PAYG Team Desk Map </h1>
    <h3 align="center"> Click on a free desk to book it: </h3>
    <div class = div2 align="center">
    <table>
        <td><input type = "button" id="89" class = "PAYG" value="2F/105" onClick=openBook('89','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="90" class = "PAYG" value="2F/104" onClick=openBook('90','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="91" class = "PAYG" value="2F/103" onClick=openBook('91','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="92" class = "PAYG" value="2F/102" onClick=openBook('92','PAYG'); value="Open Window">
        </input>
        <br>
        <input type = "button" id="93" class = "PAYG" value="2F/106" onClick=openBook('93','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="94" class = "PAYG" value="2F/107" onClick=openBook('94','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="95" class = "PAYG" value="2F/108" onClick=openBook('95','PAYG'); value="Open Window">
        </input>
        <input type = "button" id="96" class = "PAYG" value="2F/109" onClick=openBook('96','PAYG'); value="Open Window">
        </input>
        <br>
        <br>
        <input type = "button" class = "PAYG" value="2F/116" onClick=openBook('97','PAYG'); value="Open Window">
        </input>
        <input type = "button" class = "PAYG" value="2F/115" onClick=openBook('98','PAYG'); value="Open Window">
        </input>
        <input type = "button" class = "PAYG" value="2F/114" onClick=openBook('99','PAYG'); value="Open Window">
        </input>
        <input type = "button" class = "PAYG" value="2F/113" onClick=openBook('100','PAYG'); value="Open Window">
        </input>
    </table>
    </div>

</body>
</html>