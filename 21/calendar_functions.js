 function buildDateForm() {
    var months = ["January", "February", "March", "April", "May",  "June", "July", "August", "September", " October", "November", "December"];

    $('#datePicker').append('<select id="month"></select>');
  
    for(var i = 0; i < months.length;i++) {
       $('#month').append('<option value="'+i+'">'+months[i]+'</option')
    }

    $('#datePicker').append('<select id="year"></select>');

    for(i = 1990; i < 2021; i++) {
       $('#year').append('<option value="'+i+'">'+i+'</option>')
    }

    $('#datePicker').append('<button id="submit">Go!</button>');

    // set date to current month and year
    var d = new Date();
    var n = d.getMonth();
    var y = d.getFullYear();
    $('#month option:eq('+n+')').prop('selected', true);
    $('#year option[value="'+y+'"]').prop('selected', true);
  }

  function calendar(date) {
     $("#myCal").empty();

    if (date == null) {
       date = new Date;
     }

     day = date.getDate();
     month = date.getMonth();
     year = date.getFullYear();
  
     months = new Array('January','February','March','April','May','June', 'July','August','September','October','November','December');
     this_month = new Date(year, month, 1);
     next_month = new Date(year, month + 1, 1);
   
     days = new Array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
     first_week_day = this_month.getDay(); // day of the week of the first day
     days_in_this_month = Math.round((next_month.getTime() - this_month.getTime())  / (1000 * 60 * 60 * 24));

     $('#myCal').append('<table id="myCalendar"></table>');
     $('#myCalendar').append('<thead><tr></tr></thead>');
  
     for (var i=0; i < days.length; i++) {
       $('#myCalendar thead tr').append('<th>'+days[i]+'</th>')
     }
  
     $('#myCalendar').append('<tbody></tbody>');
     $('tbody').append('<tr>');
   
     for(week_day = 0; week_day < first_week_day; week_day++)  {
       $('tbody tr').append('<td id="'+week_day+'"></td>');
     }
  
     week_day = first_week_day;

     for (day_counter=1; day_counter <= days_in_this_month; day_counter++) {
       week_day %= 7;
     
       if (week_day == 0) {
         // go to the next line of the calendar
         $('tbody').append('</tr><tr>');
       }

       $('tbody tr:last').append('<td id="day'+day_counter+'">' + day_counter + '</td>');
  
       week_day++;
     }
  }