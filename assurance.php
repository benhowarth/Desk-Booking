<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='assurance.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='assurance.js'></script>
</head>
<body>

    <div>
        <a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
    </input>
    </div>
    <?php include "checkBooking.php"; ?>
    <h1> Assurance Team Desk Map </h1>
    <h3> Click on a free desk to book it: </h3>
    <div class = div2 align="center">
    <table>
        <td><input type = "button" id="105" class = "Assurance" value="2F/121" onClick=openBook('105','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="106" class = "Assurance" value="2F/122" onClick=openBook('106','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="107" class = "Assurance" value="2F/123" onClick=openBook('107','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="108" class = "Assurance" value="2F/124" onClick=openBook('108','Assurance'); value="Open Window">
        </input>
        <br>
        <input type = "button" id="109"class = "Assurance" value="2F/125" onClick=openBook('109','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="116" class = "Assurance" value="2F/126" onClick=openBook('116','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="117" class = "Assurance" value="2F/127" onClick=openBook('117','Assurance'); value="Open Window">
        </input>
        <input type = "button" id="118" class = "Assurance" value="2F/128" onClick=openBook('118','Assurance'); value="Open Window">
        </input>
    </table>
    </div>

</body>
</html>