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
    }
    staffGroupInputChange();
    $('#staffGroupInput').change(function() {
        staffGroupInputChange();
    });

});