<!DOCTYPE html>
<html>
<head>
	<link rel='stylesheet' href='main.css'/>
    <link rel='stylesheet' href='desks.css'/>
    <script src="//code.jquery.com/jquery-1.10.2.js"></script>
    <script src='bookingOpen.js'></script>
	<script src='main.js'></script>
	<a href="#" 
        class="myButton"
        onClick="location.href='index.php'">Back to Rota Selection</a>
</head>
<div id="header"></div>
<body>
    <div align="center">
        <img src="//c1.staticflickr.com/1/496/18725661484_0739259123_b.jpg" alt="Almel Logo" style="width:600px;height:140px;">
        <h1> SMART IT Project Desk Map </h1>
        <br>
    </div>
    <?php include "checkBooking.php"; ?>
    <table>
        <div align="center">
        <input type = "button" id="0" onclick=openBook('0','BA'); class = "BA" value="2F/063">
        </input>
        <input type = "button" id="1" onclick=openBook('1','BA'); class = "BA" value="2F/062">
        </input>
        <input type = "button" id="2" onclick=openBook('2','BA'); class = "BA" value="2F/061">
        </input>
        <input type = "button" id="3" onclick=openBook('3','BA'); class = "BA" value="2F/60">
        </input>
        <div class="divider"></div>
        <input type = "button" id="4" onclick=openBook('4','Hotdesk'); class = "Hotdesk" value ="2F/59">
        </input>
        <br>
        <input type = "button" id="67" onclick=openBook('67','BA'); class = "BA" value="2F/064">
        </input>
        <input type = "button" id="68" onclick=openBook('68','BA'); class = "BA" value="2F/065">
        </input>
        <input type = "button" id="69" onclick=openBook('69','BA'); class = "BA" value="2F/066">
        </input>
        <input type = "button" id="70" onclick=openBook('70','Hotdesk'); class = "Hotdesk" value="2F/067">
        </input>
        <div class="divider"></div>
        <input type = "button" id="71" onclick=openBook('71','Hotdesk'); class = "Hotdesk" value="2F/68">
        </input>
        <br>
        
        <br>
        <input type = "button" id="72" class = "DCC" onclick=openBook('72','DCC'); value="2F/077">
        </input>
        <input type = "button" id="73" class = "DCC" onclick=openBook('73','DCC'); value="2F/076">
        </input>
        <input type = "button" id="74" class = "DCC" onclick=openBook('74','DCC'); value="2F/075">
        </input>
        <input type = "button" id="75" class = "DCC" onclick=openBook('75','DCC'); value="2F/074">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        
        <br>
        <input type = "button" id="76" class = "DCC" onclick=openBook('76','DCC'); value="2F/078">
        </input>
        <input type = "button" id="77" class = "DCC" onclick=openBook('77','DCC'); value="2F/079">
        </input>
        <input type = "button" id="78" class = "DCC" onclick=openBook('78','DCC'); value="2F/080">
        </input>
        <input type = "button" id="79" class = "DCC" onclick=openBook('79','DCC'); value="2F/081">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        
        <br>
        <input type = "button" id="81" class = "DCC" onclick=openBook('81','DCC'); value="2F/091">
        </input>
        <input type = "button" id="82" class = "DCC" onclick=openBook('82','DCC'); value="2F/090">
        </input>
        <input type = "button" id="83" class = "DCC" onclick=openBook('83','DCC'); value="2F/089">
        </input>
        <input type = "button" id="84" class = "DCC" onclick=openBook('84','DCC'); value="2F/088">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        <input type = "button" id="85" class = "DCC" onclick=openBook('85','DCC'); value="2F/092">
        </input>
        <input type = "button" id="86" class = "DCC" onclick=openBook('86','DCC'); value="2F/093">
        </input>
        <input type = "button" id="87" class = "DCC" onclick=openBook('87','DCC'); value="2F/094">
        </input>
        <input type = "button" id="88" class = "DCC" onclick=openBook('88','DCC'); value="2F/095">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        
        <br>
        <input type = "button" id="89" class = "PAYG" onclick=openBook('89','PAYG');  value="2F/105">
        </input>
        <input type = "button" id="90" class = "PAYG" onclick=openBook('90','PAYG');  value="2F/104">
        </input>
        <input type = "button" id="91" class = "PAYG" onclick=openBook('91','PAYG');  value="2F/103">
        </input>
        <input type = "button" id="92" class = "PAYG" onclick=openBook('92','PAYG');  value="2F/102">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        <input type = "button" id="93" class = "PAYG" onclick=openBook('93','PAYG');  value="2F/106">
        </input>
        <input type = "button" id="94" class = "PAYG" onclick=openBook('94','PAYG');  value="2F/107">
        </input>
        <input type = "button" id="95" class = "PAYG" onclick=openBook('95','PAYG');  value="2F/108">
        </input>
        <input type = "button" id="96" class = "PAYG" onclick=openBook('96','PAYG');  value="2F/109">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        
        <br>
        <input type = "button" id="97" class = "PAYG" onclick=openBook('97','PAYG');  value="2F/116">
        </input>
        <input type = "button" id="98" class = "PAYG" onclick=openBook('98','PAYG');  value="2F/115">
        </input>
        <input type = "button" id="99" class = "PAYG" onclick=openBook('99','PAYG');  value="2F/114">
        </input>
        <input type = "button" id="100" class = "PAYG" onclick=openBook('100','PAYG');  value="2F/113">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        <input type = "button" id="101" class = "AssetOps" onclick=openBook('101','AssetOps'); value="2F/117">
        </input>
        <input type = "button" id="102" class = "AssetOps" onclick=openBook('102','AssetOps'); value="2F/118">
        </input>
        <input type = "button" id="103" class = "AssetOps" onclick=openBook('103','AssetOps'); value="2F/119">
        </input>
        <input type = "button" id="104" class = "AssetOps" onclick=openBook('104','AssetOps'); value="2F/120">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        
        <br>
        <input type = "button" id="105" class = "Assurance" onclick=openBook('105','Assurance'); value="2F/121">
        </input>
        <input type = "button" id="106" class = "Assurance" onclick=openBook('106','Assurance'); value="2F/122">
        </input>
        <input type = "button" id="107" class = "Assurance" onclick=openBook('107','Assurance'); value="2F/123">
        </input>
        <input type = "button" id="108" class = "Assurance" onclick=openBook('108','Assurance'); value="2F/124">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        <input type = "button" id="109" class = "Assurance" onclick=openBook('109','Assurance'); value="2F/125">
        </input>
        <input type = "button" id="116" class = "Assurance" onclick=openBook('116','Assurance'); value="2F/126">
        </input>
        <input type = "button" id="117" class = "Assurance" onclick=openBook('117','Assurance'); value="2F/127">
        </input>
        <input type = "button" id="128" class = "Assurance" onclick=openBook('128','Assurance'); value="2F/128">
        </input>
        <div class="divider"></div>
        <input type = "button" class = "Placeholder" value="Placeholder">
        </input>
        <br>
        </div>
    </table>
    
    
</body>
</html>