//on the document loading
$(document).ready(function() {
    //hide the element that the seating group of the desk is printed to via php
    $("#phpDefaultGroup").hide();
    //hide the element that the staff member json array is printed to via php
    $("#phpInfo").hide();
    //set the staffGroupInput's value to the seating group of the desk (the string replace function takes out the whitespace created)
    $("#staffGroupInput option[value='"+$("#phpDefaultGroup").text().replace(/\s/g,"")+"']").prop("selected",true);
    
    //--creating a new array that has all the groups objects in, ready to store the staff members in the next section--
    //get the staff member list from the hidden element that it was printed to via php and parse from json into a javascript object
    staffList = JSON.parse($("#phpInfo").text()).staffList;
    //create a new list for the staff (so that they will be sorted by group, for the dropdown list of names to change when the work group is changed)
    staffGroupList=[];
    //go through the php staff list one by one
    for(i=0;i<staffList.length;i++){
        //set includeInStaffGroupList to true by default (this defines whether a new entry in the array should be created for a new group or if the staff member should be added to an existing group)
        includeInStaffGroupList=true;
        //go through the new staff list one by one
        for(j=0;j<staffGroupList.length;j++){
            //if the entry in the php list's group name is the same as the entry in the new staff list
            if(staffList[i].StaffGroup==staffGroupList[j].GroupName){
                //set includeInStaffGroupList to false (meaning do not add a new entry for a new group)
                includeInStaffGroupList=false;
            }
        }
        //if includeInStaffGroup is true
        if(includeInStaffGroupList){
            //push a new object into the new staff array, with a GroupName property and ar (or array) property
            staffGroupList.push({GroupName:staffList[i].StaffGroup,ar:[]});
        }
        
    }
    //--adding the staff to the new array--
    //go through the php staff list one by one
    for(i=0;i<staffList.length;i++){
        //go through the new staff list, with it's group objects, one by one
        for(j=0;j<staffGroupList.length;j++){
            //if the group names of the current elements of the php and new staff arrays
            if(staffList[i].StaffGroup==staffGroupList[j].GroupName){
               //push a new object into the element's array, including the staffName and staffID
                staffGroupList[j].ar.push({StaffName:staffList[i].StaffName,StaffID:staffList[i].StaffID});
            }
        }
    }
    //a function for when the selected entry in the work group/department dropdown is changed
    function staffGroupInputChange(){
        //by default the group number is set to minus 1, so as to detect for errors/no data found in the selection process below
        groupNo=-1;
        //go through the staff list one by one
        for(i=0;i<staffGroupList.length;i++){
           //if the staffGroupInput's value matches the groupName of the current element
            if(staffGroupList[i].GroupName==$("#staffGroupInput").val())
                {
                    //set groupNo to the index of that element
                    groupNo=i;
                }
        }
        //get the current group desired, based on the selected department in the dropdown, including it's array of staff members
        currentGroup=staffGroupList[groupNo];
        //empty the staffNameInput dropdown of all elements
        $('#staffNameInput').empty();
        //if no group was found in the array that matches the selected group in the department dropdown
        if(groupNo==-1){
            //disable the staffNameInput dropdown
            $('#staffNameInput').prop("disabled",true);
            //add an error option to the staffNameInput dropdown
            $('#staffNameInput').append("<option>No Staff in this group</option>");
        }
        //if a group was found in the array that matches the selected group in the department dropdown
        else{
            //enable the staffNameInput dropdown
            $('#staffNameInput').prop("disabled",false);
            //go through the currentGroup array one by one
            for(i=0;i<currentGroup.ar.length;i++){
                //add the staff member's name as an option on the staffNameInput dropdown (with the value returned by each option, when selected, set to staffID)
                $('#staffNameInput').append("<option value="+currentGroup.ar[i].StaffID+">"+currentGroup.ar[i].StaffName+"</option>");
            }
        }
        //if the user selects 'Hotdesk' from the department dropdown
        if($("#staffGroupInput").val()=="Hotdesk"){
            //show the guestNameInput box for the user to type in a name manually
            $("#guestNameInput").show();
        }
        //if the user doesn't select 'Hotdesk' from the department dropdown
        else{
            //hide the guestNameInput box
            $("#guestNameInput").hide();
        }
    }
    //call the staffGroupInputChange function
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
    
    $('#startDateInput').prop("min",formatDate(now));
    $('#endDateInput').prop("min",formatDate(now));
    
    $('#staffGroupInput').change(function() {
        staffGroupInputChange();
    });
    
    $('#startDateInput').change(function() {
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
    });
    
    $('#endDateInput').change(function() {
        staffGroupInputChange();
        $("#startDateInput").prop("max",$('#endDateInput').val());
    });

});