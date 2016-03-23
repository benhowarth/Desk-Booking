$(document).ready(function() {
    $("#phpInfo").hide();
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

    $('#staffGroupInput').change(function() {
        for(i=0;i<staffGroupList.length;i++){
            if(staffGroupList[i].GroupName==$("#staffGroupInput").val())
                {
                    groupNo=i;
                }
        }
        currentGroup=staffGroupList[groupNo]
        for(i=0;i<currentGroup.ar.length;i++){
            $('#staffNameInput').append("<option value="+currentGroup.ar[i].StaffID+">"+currentGroup.ar[i].StaffName+"</option>");
        }
    });

});