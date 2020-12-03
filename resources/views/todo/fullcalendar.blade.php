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
    title: todo.title,
  }
  alteredEvents.push(newTodo);
})
var calendar = $('#calendar').fullCalendar({ 
editable: false,
events: alteredEvents,
displayEventTime: true,
});
});

});
</script>
</html>