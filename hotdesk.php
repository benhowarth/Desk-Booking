<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='hotdesk.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='hotdesk.js'></script>
	<a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
</head>
<div id="header"></div>
<body>
    <div align="center">
        <h1> Hotdesk Team Project Desk Map </h1>
        <h3 align="center"> Click on a free desk to book it: </h3>
        <br>
    </div>
    <?php include "checkBooking.php"; ?>
    <table>
        <div align="center">
        <input type = "button" id="0" onclick=openBook('0','BA'); class = "Placeholder" value="2F/063">
        </input>
        <input type = "button" id="1" onclick=openBook('1','BA'); class = "Placeholder" value="2F/062">
        </input>
        <input type = "button" id="2" onclick=openBook('2','BA'); class = "Placeholder" value="2F/061">
        </input>
        <input type = "button" id="3" onclick=openBook('3','BA'); class = "Placeholder" value="2F/60">
        </input>
        <div class="divider"></div>
        <input type = "button" id="4" onclick=openBook('4','Hotdesk'); class = "Hotdesk" value ="2F/59">
        </input>
        <br>
        <input type = "button" id="67" onclick=openBook('67','BA'); class = "Placeholder" value="2F/064">
        </input>
        <input type = "button" id="68" onclick=openBook('68','BA'); class = "Placeholder" value="2F/065">
        </input>
        <input type = "button" id="69" onclick=openBook('69','BA'); class = "Placeholder" value="2F/066">
        </input>
        <input type = "button" id="70" onclick=openBook('70','Hotdesk'); class = "Hotdesk" value="2F/067">
        </input>
        <div class="divider"></div>
        <input type = "button" id="71" onclick=openBook('71','Hotdesk'); class = "Hotdesk" value="2F/68">
        </input>
        <br>
        </div>
    </table>
    
    
</body>
</html>