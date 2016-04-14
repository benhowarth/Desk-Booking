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
        mSecDay=86400000;
        function goToRota(rota){
            getLinkExtras();
            now=new Date();
            nowPlusTwo=new Date(now+(mSecDay*2));
            start=new Date(dates[0]);
            startPlusTwo=new Date(start.getTime()+(mSecDay*2));
            end=new Date(dates[dates.length-1]);
            endPlusTwo=new Date(end.getTime()+(mSecDay*2));
            //more than two days
            if(nowPlusTwo<start){
                location.href=rota+linkExtras;
            }
            else{
                location.href="main"+linkExtras;
            }
        }
        
        $(".DCC").on("click",function(){goToRota("dcc");});
        $(".PAYG").on("click",function(){goToRota("payg");});
        $(".AssetOps").on("click",function(){goToRota("assetops");});
        $(".Assurance").on("click",function(){goToRota("assurance");});
        $(".BA").on("click",function(){goToRota("ba");});
        $(".Hotdesk").on("click",function(){goToRota("hotdesk");});
    </script>
</body>
</html>