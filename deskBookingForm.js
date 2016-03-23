$(document).ready(function() {
    $("#phpInfo").hide();
    staffList = JSON.parse($("#phpInfo").text()).staffList;
    staffGroupList=[]
    for(i=0;i<staffList.length;i++){
        includeInStaffGroupList=true;
        for(j=0;j<staffGroupList;j++){
            if(staffList[i].StaffGroup==j){
                console.log(staffList[i].StaffGroup);
                console.log(j);
                includeInStaffGroupList=false;
            }
        }
        if(includeInStaffGroupList){
            staffGroupList.push(staffList[i].StaffGroup);
        }
    }
    $('#staffGroupInput').change(function() {   
        $('#staffNameInput').append();
    });

});