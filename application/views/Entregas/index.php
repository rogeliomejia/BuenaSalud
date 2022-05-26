
<script>

  document.addEventListener('DOMContentLoaded', function() {
    var calendarEl = document.getElementById('calendar');

    var calendar = new FullCalendar.Calendar(calendarEl, {
      headerToolbar: {
        left: 'prev,next today',
        center: 'title',
        right: 'dayGridMonth,timeGridWeek,timeGridDay prevYear,nextYear'
      },
      buttonText: {
            prevYear: 'Año anterior',
            nextYear: 'Año siguiente',
        },
        viewDisplay: function(view) {
            var d = $('#calendar').fullCalendar('getDate');
            $(".fc-button-prevYear .fc-button-content").text(parseInt(d.getFullYear(), 10) - 1);
            $(".fc-button-nextYear .fc-button-content").text(parseInt(d.getFullYear(), 10) + 1);
        },
      navLinks: true, // can click day/week names to navigate views
      selectable: true,
      selectMirror: true,
      select: function(arg) {
        /*var title = prompt('Event Title:');
        if (title) {
          calendar.addEvent({
            title: title,
            start: arg.start,
            end: arg.end,
            allDay: arg.allDay
          })
        }
        calendar.unselect()*/
      },
      eventClick: function(arg) {
        if (confirm('¿Confirma que ya finalizó la entrega en: '+arg.event.title+'?')) {
          //arg.event.remove()
          var idEntregado = parseInt(arg.event.id);
          $.ajax('<?php echo base_url();?>Entregas/updYaEntregado/'+idEntregado);
          arg.event.remove();
        }
      },
      editable: true,
      dayMaxEvents: true, // allow "more" link when too many events
      locale: 'es',
    monthNames: ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Julio','Agosto','Septiembre','Octubre','Noviembre','Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr','May','Jun','Jul','Ago','Sep','Oct','Nov','Dic'],
		dayNames: ['Domingo','Lunes','Martes','Miércoles','Jueves','Viernes','Sábado'],
		dayNamesShort: ['Dom','Lun','Mar','Mié','Jue','Vie','Sáb'],
      events: <?php echo(json_encode($listEntregas)); ?>
    });
    calendar.render();
  });

  

</script>


<style>
  #calendar {
    max-width: 1100px;
    margin: 0 auto;
  }

</style>

<div id='calendar' style="display: block;"></div>

