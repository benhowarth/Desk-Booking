$(document).ready(function() {
    $("#phpDefaultGroup").hide();
    $("#phpInfo").hide();
    $("#staffGroupInput option[value='"+$("#phpDefaultGroup").text().replace(/\s/g,"")+"']").prop("selected",true);
    
    
    staffList = JSON.parse($("#phpInfo").text()).staffList;
    staffGroupList=[];
    index=0;
    for(i=0;i<staffList.length;i++){
        includeInStaffGroupList=true;
        for(j=0;j<staffGroupList.length;j++){
            if(staffList[i].StaffGroup==staffGroupList[j].GroupName){
                includeInStaffGroupList=false;
            }
        }
        if(includeInStaffGroupList){
            staffGroupList.push({GroupName:staffList[i].StaffGroup,ar:[]});
        }
        
    }
    for(i=0;i<staffList.length;i++){
        for(j=0;j<staffGroupList.length;j++){
            if(staffList[i].StaffGroup==staffGroupList[j].GroupName){
                staffGroupList[j].ar.push({StaffName:staffList[i].StaffName,StaffID:staffList[i].StaffID});
            }
        }
    }
    function staffGroupInputChange(){
        groupNo=-1;
        for(i=0;i<staffGroupList.length;i++){
            if(staffGroupList[i].GroupName==$("#staffGroupInput").val())
                {
                    groupNo=i;
                }
        }
        currentGroup=staffGroupList[groupNo]
        $('#staffNameInput').empty();
        if(groupNo==-1){
            $('#staffNameInput').prop("disabled",true);
            $('#staffNameInput').append("<option>No Staff in this group</option>");
        }
        else{
            $('#staffNameInput').prop("disabled",false);
            for(i=0;i<currentGroup.ar.length;i++){
                $('#staffNameInput').append("<option value="+currentGroup.ar[i].StaffID+">"+currentGroup.ar[i].StaffName+"</option>");
            }
        }
        if($("#staffGroupInput").val()=="Hotdesk"){
            $("#guestNameInput").show();
        }
        else{
            $("#guestNameInput").hide();
        }
    }
    staffGroupInputChange();
    
    
    function formatDate(date){
        var d=new Date(date),
        month=''+(d.getMonth()+1),
        day=''+d.getDate(),
        year=d.getFullYear();
        
        if(month.length<2){month='0'+month;}
        if(day.length<2){day='0'+day;}
        
        dateFinal=year+"-"+month+"-"+day;
        return dateFinal;
    }
    
    now=new Date();
    
    //$('#startDateInput').val(formatDate(now));
    //$('#endDateInput').val(formatDate(now));
    $('#startDateInput').prop("min",formatDate(now));
    $('#endDateInput').prop("min",formatDate(now));
    
    $('#staffGroupInput').change(function() {
        staffGroupInputChange();
    });
    
    $('#startDateInput').change(function() {
        //staffGroupInputChange();
        //$("#endDateInput").prop("min",$('#startDateInput').val());
        start=new Date($('#startDateInput').val());
        startPlusTwo=new Date();
        startPlusTwo.setDate(start.getDate()+2);
        if(startPlusTwo<now){
            //more than two days
            console.log("more than 2");
            $("#staffGroupInput option[value='"+$("#phpDefaultGroup").text().replace(/\s/g,"")+"']").prop("selected",true);
            $("#staffGroupInput").prop("disabled",true);
            staffGroupInputChange();
        }
        else{
            //less than or equal to two days
            console.log("2 or less");
            $("#staffGroupInput").prop("disabled",false);
            staffGroupInputChange();
            
        }
        //now=now.GetFullYear()+""+now.
    });
    
    $('#endDateInput').change(function() {
        //staffGroupInputChange();
        //$("#startDateInput").prop("max",$('#endDateInput').val());
    });

});