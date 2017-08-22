// global variables to keep track of the request
// and the function to call when done
var ajaxreq=false, ajaxCallback;

// ajaxRequest: Sets up a request
function ajaxRequest(filename) {
   try {
      //make a new request object
      ajaxreq= new XMLHttpRequest();
   } catch (error) {
      return false;
   }
   ajaxreq.open("GET", filename);
   ajaxreq.onreadystatechange = ajaxResponse;
   ajaxreq.send(null);
}

// ajaxResponse: Waits for response and calls a function
function ajaxResponse() {
   if (ajaxreq.readyState !=4) return;
   if (ajaxreq.status==200) {
      // if the request succeeded...
      if (ajaxCallback) ajaxCallback();
   } else alert("Request failed: " + ajaxreq.statusText);
   return true;
}
