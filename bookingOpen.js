$(document).ready(function(){
    $("#bookings").hide();
    $("#s").hide();
    $("#e").hide();
    startDate=$("#s").text();
    endDate=$("#e").text();
    bookings=JSON.parse($("#bookings").text()).bookings;
    for(i=0;i<bookings.length;i++){
        if($("#"+bookings[i].DeskID)){
            $("#"+bookings[i].DeskID).prop("disabled","true");
            $("#"+bookings[i].DeskID).prop("alt",bookings[i].StaffName+" for "+bookings[i].StartDate+" to "+bookings[i].EndDate);
            $("#"+bookings[i].DeskID).addClass("disabledDesk");
            $("#"+bookings[i].DeskID).prop("onclick","");
        }
    }
});
//simple function for each button to run on click, it passes the id of the desk and it's seating group
function openBook(deskID,defaultGroup){
    //opens a new window, of 800 by 800, which contains the deskBookingForm, with the deskID and seating group passes into the url for use in the php
    window.open("deskBookingForm.php?deskID="+deskID+"&defaultGroup="+defaultGroup+"&startDate="+startDate+"&endDate="+endDate,"Ratting","width=800,height=800,toolbar=0,status=0,");
}