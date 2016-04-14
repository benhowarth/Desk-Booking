<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='assetops.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='assetops.js'></script>
</head>
<body>

    <div>
        <a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
    </input>
    </div>
    <?php include "checkBooking.php"; ?>
    <h1 align="center"> Asset Ops Team Desk Map </h1>
    <h3 align="center"> Click on a free desk to book it: </h3>
    <div class = div2 align="center">
    <table>
        <td><input type = "button" id="101" class = "AssetOps" value="2F/117" onClick=openBook('101','AssetOps'); value="Open Window">
        </input>
        <input type = "button" id="102" class = "AssetOps" value="2F/118" onClick=openBook('102','AssetOps'); value="Open Window">
        </input>
        <input type = "button" id="103" class = "AssetOps" value="2F/119" onClick=openBook('103','AssetOps'); value="Open Window">
        </input>
        <input type = "button" id="104" class = "AssetOps" value="2F/120" onClick=openBook('104','AssetOps'); value="Open Window">
        </input>
    </table>
    </div>

</body>
</html>