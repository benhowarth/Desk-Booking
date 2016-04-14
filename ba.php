<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='ba.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='ba.js'></script>
</head>
<body>

    <div>
        <img src="//c1.staticflickr.com/1/496/18725661484_0739259123_b.jpg" alt="Almel Logo" style="width:300px;height:70px;">
        <a href="#" 
        class="myButton"
        style="float: right;" 
        onClick="location.href='index.php'">Back to Rota Selection</a>
    </input>
    </div>
    <?php include "checkBooking.php"; ?>
    <h1 align="center"> BA Team Desk Map </h1>
    <h3 align="center"> Click on a free desk to book it: </h3>
    <div class = div2 align="center">
    <table>
        <td> <input type = "button" id="0" class = "BA" value="2F/063" onClick=openBook('0','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" id="1" class = "BA" value="2F/062" onClick=openBook('1','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" id="2" class = "BA" value="2F/061" onClick=openBook('2','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" id="3" class = "BA" value="2F/60" onClick=openBook('3','BA'); value="Open Window">
        </input> </td>
        <tr>
        <td> <input type = "button" id="67" class = "BA" value="2F/064" onClick=openBook('67','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" id="68" class = "BA" value="2F/065" onClick=openBook('68','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" id="69" class = "BA" value="2F/066" onClick=openBook('69','BA'); value="Open Window">
        </input> </td>
        <td> <input type = "button" class = "Placeholder" value ="2F/067","width=800,height=800,toolbar=0,status=0,"); value="Open Window">
        </input> </td>
    </table>
    </div>

</body>
</html>

</body>
</html>