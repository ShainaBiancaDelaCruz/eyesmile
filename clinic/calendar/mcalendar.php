<?php include('../../login/verify.php');?>
<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Inventory Adding</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="stylesss.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
  <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Poppins:wght@400;700&display=swap">

<title>
  Initialize Globals Demo - Demos | FullCalendar
</title>
<style>
  html, body {
    margin: 0;
    padding: 0;
    font-family: Arial, Helvetica Neue, Helvetica, sans-serif;
    font-size: 14px;
  }

  #calendar {
    max-width: 900px;
    margin: 40px auto;
     overflow: hidden; /* Hide vertical scrollbar on the body */
  }
  
  

  /* Change button colors to orange */
  .fc button {
    background-color: #FF6D33 !important;
    color: white; /* Set text color to white for better contrast */
   
  }
  
    .modal {
    display: none; /* Hide the modal by default */
    position: absolute;
    right: 20px; /* Initial position, adjust as needed */
    z-index: 9999;
  }
  
   .modal-content {
    border-radius: 8px;
    box-shadow: 0px 0px 20px rgba(0, 0, 0, 0.1);
  }

  .modal-header {
    border-bottom: none;
  }

  .modal-body {
    font-size: 16px;
    line-height: 1.6;
  }
  
  
  /* Responsive styles */
  @media screen and (max-width: 768px) {
    #calendar {
      max-width: 100%;
      margin: 20px;
    }
    
   .fc-toolbar-title {
      order: -1;
      margin-bottom: 20px; /* Adjust the margin as needed */
    }

    .fc-header-toolbar {
      flex-direction: column;
      align-items: center;
    }

    .fc-toolbar {
      margin-top: 10px; /* Adjust the margin as needed */
    }
  }

  @media screen and (max-width: 480px) {
    #calendar {
      max-width: 100%;
      margin: 10px;
      overflow: hidden; /* Hide vertical scrollbar on the body */
      height:100%
    }
      
      .fc-toolbar-title {
    text-align: center;
  
   
  }
  
  .fc-button{
      margin-top: 15px;
  }

  .fc-header-toolbar {
    flex-wrap: wrap;
    justify-content: center;
  }

 
   
  .fc-toolbar {
    display: flex;
    flex-direction: column;
    align-items: center;
 
  }

  .fc-toolbar .fc-center {
    order: -1;
   
  }
    
  
  }
</style>
<link href='https://unpkg.com/@fullcalendar/core@4.4.1/main.min.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/daygrid@4.4.1/main.min.css' rel='stylesheet' />
<link href='https://unpkg.com/@fullcalendar/timegrid@4.4.1/main.min.css' rel='stylesheet' />
<!-- Bootstrap CSS -->
<link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">

<script src='https://unpkg.com/@fullcalendar/core@4.4.1/main.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/interaction@4.4.0/main.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/daygrid@4.4.1/main.min.js'></script>
<script src='https://unpkg.com/@fullcalendar/timegrid@4.4.1/main.min.js'></script>
<!-- jQuery and Bootstrap JS -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.11.6/dist/umd/popper.min.js"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

<script>
  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var today = new Date();
    var calendar = new FullCalendar.Calendar(calendarEl, {
      plugins: [ 'interaction', 'dayGrid', 'timeGrid' ],
      defaultView: 'dayGridMonth',
      defaultDate: today,
      header: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay'
      },
      eventLimit: true,
      eventLimitText: '+more',

      // Events data...

      dateClick: function(info) {
        var clickedDate = info.dateStr;
        var eventTitle = prompt('Enter an event title for ' + clickedDate);

        if (eventTitle) {
          calendar.addEvent({
            title: eventTitle,
            start: info.date,
            allDay: true
          });

          calendar.refetchEvents();
          calendar.changeView('dayGridMonth', info.date);
        }
      },

      eventClick: function(info) {
      var appointmentDetails = 'Event Title: ' + info.event.title + '<br>Start Time: ' + info.event.start;
    
      // Create a modal container
      var modalContainer = document.createElement('div');
      modalContainer.innerHTML = '<div class="modal fade" id="eventModal" tabindex="-1" role="dialog" aria-labelledby="eventModalLabel" aria-hidden="true">' +
        '<div class="modal-dialog modal-dialog-centered" role="document">' +
        '<div class="modal-content">' +
        '<div class="modal-header">' +
        '<h5 class="modal-title" id="eventModalLabel">Patient Appointment Details</h5>' +
        '<button type="button" class="close" data-dismiss="modal" aria-label="Close">' +
        '<span aria-hidden="true">&times;</span>' +
        '</button>' +
        '</div>' +
        '<div class="modal-body">' +
        '<p>' + appointmentDetails + '</p>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>';
    
      // Append the modal container to the body
      document.body.appendChild(modalContainer);
    
      // Show the Bootstrap modal
      $('#eventModal').modal('show');
    
      // Remove the modal from the DOM after it's hidden
      $('#eventModal').on('hidden.bs.modal', function(e) {
        modalContainer.remove();
      });
    }
        });
    
    calendar.render();
      });

</script>

</head>

<?php
    if ($user['user_type'] === 'Admin' || $user['user_type'] === 'Optic') :
        include '../includes/nav2.php';
    elseif ($user['user_type'] === 'Staff') :
        include '../includes/nav3.php';
    endif;
    ?>

<body style="background-color: #D7F1F6;">
<div id='calendar'></div>
</body>
</html>