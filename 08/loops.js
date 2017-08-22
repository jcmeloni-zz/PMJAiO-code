// create the array
names = new Array();
var i = 0;

// loop and prompt for names
do {
    next = prompt("Enter the Next Name", "");
    if (next > " ") { 
      names[i] = next;
    }
    i = i + 1;
} while (next > " ");



document.write("<h2>" + (names.length) + " names entered:</h2>");

// display all of the names
document.write("<ol>");
for (i in names) {
    document.write("<li>" + names[i] + "</li>");
}
document.write("</ol>");

