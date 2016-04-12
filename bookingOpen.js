//simple function for each button to run on click, it passes the id of the desk and it's seating group
function openBook(deskID,defaultGroup){
    //opens a new window, of 800 by 800, which contains the deskBookingForm, with the deskID and seating group passes into the url for use in the php
    window.open("deskBookingForm.php?deskID="+deskID+"&defaultGroup="+defaultGroup,"Ratting","width=800,height=800,toolbar=0,status=0,");
}