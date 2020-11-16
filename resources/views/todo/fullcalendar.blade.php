<!DOCTYPE html>
<html>
<head>
  <title>Laravel Fullcalendar </title>
  <meta name="csrf-token" content="{{ csrf_token() }}">
</head>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" />
 
<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
 
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.css" />
 
<script src="https://cdn.jsdelivr.net/npm/moment@2.27.0/moment.min.js"></script>
 
<script src="https://cdn.jsdelivr.net/npm/fullcalendar@3.9.0/dist/fullcalendar.min.js"></script>
<body>
 
  <div class="container">
      <div class="response"></div>
      <div id='calendar'></div>  
  </div>
 
 
</body>
<script>
$(document).ready(function () {
var SITEURL = "{{url('/')}}";
$.ajaxSetup({
headers: {
'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
}
});
var allEvents;
$.get(SITEURL+'/fetch', (res) => {allEvents = res; 
var alteredEvents = []
allEvents.forEach((todo) => {
  var newTodo = {
    start: todo.startTime,
    end: todo.endTime,
    allDay: true,
    title: todo.title,
  }
  alteredEvents.push(newTodo);
})
var calendar = $('#calendar').fullCalendar({ 
editable: true,
events: alteredEvents,
displayEventTime: true,
editable: true,
eventRender: function (todo, element, view) {
if (todo.allDay === 'true') {
todo.allDay = true;
} else {
todo.allDay = false;
}
},
selectable: true,
selectHelper: true,
select: function (startTime, endTime, allDay) {
var title = prompt('Event Title:');
if (title) {
var startTime = $.fullCalendar.formatDate(startTime, "Y-MM-DD HH:mm:ss");
var endTime = $.fullCalendar.formatDate(endTime, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + "fetch",
data: 'title=' + title + '&amp;startTime=' + startTime + '&amp;endTime=' + endTime,
type: "POST",
success: function (data) {
displayMessage("Added Successfully");
},
error: function (err) {
    var error=err;
    console.log("AJAX error in request: " + JSON.stringify(err, null, 2));
  }
});
calendar.fullCalendar('renderEvent',
{
title: title,
start: startTime,
end: endTime,
allDay: allDay
},
true
);
}
calendar.fullCalendar('unselect');
},
eventDrop: function (todo, delta) {
var startTime = $.fullCalendar.formatDate(todo.startTime, "Y-MM-DD HH:mm:ss");
var endTime = $.fullCalendar.formatDate(todo.endTime, "Y-MM-DD HH:mm:ss");
$.ajax({
url: SITEURL + 'fullcalendar/update',
data: 'title=' + todo.title + '&amp;startTime=' + startTime + '&amp;endTime=' + endTime + '&amp;id=' + todo.id,
type: "POST",
success: function (response) {
displayMessage("Updated Successfully");
}
});
},
eventClick: function (todo) {
var deleteMsg = confirm("Do you really want to delete?");
if (deleteMsg) {
$.ajax({
type: "POST",
url: SITEURL + 'fullcalendar/delete',
data: "&amp;id=" + todo.id,
success: function (response) {
if(parseInt(response) > 0) {
$('#calendar').fullCalendar('removeEvents', todo.id);
displayMessage("Deleted Successfully");
}
}
});
}
}
});
});

});
function displayMessage(message) {
$(".response").html("<div class='success'>"+message+"</div>");
setInterval(function() { $(".success").fadeOut(); }, 1000);
}
</script>
</html>