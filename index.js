$(function() {
    $( "#startDateInput" ).multiDatesPicker({
        minDate: 0,
        maxDate:"+14D",
        dateFormat: "yy-mm-dd",
        maxPicks:4,
        //pickableRange:4,
        beforeShowDay: $.datepicker.noWeekends,
        adjustRangeToDisabled: true
    });
  });
$(document).ready(function(){
    
});