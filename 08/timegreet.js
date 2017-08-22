// Get the current date
now = new Date();

// Delineate hours, minutes, seconds
var hour_of_day = now.getHours();
var minute_of_hour = now.getMinutes();
var seconds_of_minute = now.getSeconds();

// Display the time
document.write("<h2>");
document.write(hour_of_day + ":" + minute_of_hour + ":" + seconds_of_minute);
document.write("</h2>");

// Display a greeting
document.write("<p>");
if  (hour_of_day < 10)  {
     document.write("Good morning."); 
}  else if ((hour_of_day >= 14) && (hour_of_day <= 17)) {
     document.write("Good afternoon.");
}  else if (hour_of_day >= 17)  { 
     document.write("Good evening.");
}  else  {
     document.write("Good day.");
}
document.write("</p>");

