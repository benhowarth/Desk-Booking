<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
	<link rel='stylesheet' href='index.css'/>
	<link rel="stylesheet" href="//code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
	<script src="//code.jquery.com/ui/1.11.4/jquery-ui.js"></script>
	<script src="jquery-ui.multidatespicker.js"></script>
	<script src='index.js'></script>
</head>
<body>
    <input id="staffListButton" class="myButton" onclick="location.href='staffList.php'" value="Forgotten Your Rota?" align="right" style="float:right;" type="submit"></input>
    <p align="left">Please select your booking date: <input type="text" id="startDateInput" name="startDateInput"></input></p>
    <div align="center">
        <h1>Welcome!</h1>
        <br/>
        <h2>Please select your Seating Rota Team:</h2>
    <table>
        <td> <input type= "button" class= "DCC" value= "DCC"></input> </td>
        <td> <input type= "button" class= "PAYG" value= "PAYG"></input> </td>
        <td> <input type= "button" class= "AssetOps" value= "Asset Ops"></input> </td>
        <tr>
        <td> <input type= "button" class= "Assurance" value= "Assurance"></input> </td>
        <td> <input type= "button" class= "BA" value= "BA"></input> </td>
        <td> <input type= "button" class= "Hotdesk" value= "No Rota"></input> </td>
    </table>
    </div>

    <script>
        function getLinkExtras(){
            dateString=$("#startDateInput").val();
            dates=[];
            currentDatesIndex=0;
            dates[currentDatesIndex]="";
            for(i=0;i<dateString.length;i++){
                if(dateString[i]==","){
                    i++;
                    currentDatesIndex++;
                    dates[currentDatesIndex]="";
                }
                else{
                    dates[currentDatesIndex]+=dateString[i];
                }
            }
            
            
            linkExtras=".php?s="+dates[0]+"&e="+dates[dates.length-1];
        }
        $(".DCC").on("click",function(){getLinkExtras();location.href="dcc"+linkExtras;});
        $(".PAYG").on("click",function(){getLinkExtras();location.href="payg"+linkExtras;});
        $(".AssetOps").on("click",function(){getLinkExtras();location.href="assetops"+linkExtras;});
        $(".Assurance").on("click",function(){getLinkExtras();location.href="assurance"+linkExtras;});
        $(".BA").on("click",function(){getLinkExtras();location.href="ba"+linkExtras;});
        $(".Hotdesk").on("click",function(){getLinkExtras();location.href="main"+linkExtras;});
    </script>
</body>
</html>