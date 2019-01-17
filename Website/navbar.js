"use strict";

/*
Ray Rasolofonera
IS 448/Section 02
Deliverable 6
Filename: navbar.js
12/18/2018
This file modifies the Css Aspect using JavaScript
*/

window.onload = pageLoad;
function pageLoad() {
  document.getElementById("navbar").onmouseover = changeColor;
  document.getElementById("navbar").onmouseout = changeColor;
  document.getElementById("navbar1").onmouseover = changeColor;
  document.getElementById("navbar1").onmouseout = changeColor;
  document.getElementById("navbar2").onmouseover = changeColor;
  document.getElementById("navbar2").onmouseout = changeColor;
  document.getElementById("navbar3").onmouseover = changeColor;
  document.getElementById("navbar3").onmouseout = changeColor;
  if(document.getElementById("navbar4") != null){
    document.getElementById("navbar4").onmouseover = changeColor;
    document.getElementById("navbar4").onmouseout = changeColor;
  }
  if(document.getElementById("navbar5") != null){
    document.getElementById("navbar5").onmouseover = changeColor;
    document.getElementById("navbar5").onmouseout = changeColor;
  }
  
  // Written by Victoria Hewitt
  // This is my AJAX aspect
  setInterval("displayTime()",1000);
  
  // Written by Victoria Hewitt
  // This is my AJAX aspect/CSS
  // Link to my script because no 2 window.onload functions
 // pageLoad2();

}

function changeColor()
{ 
   if(event.type == "mouseover"){
    this.style.color='red';

  }
  else {
     this.style.color='blue';
}
}

// Written by Victoria Hewitt
// This is my AJAX aspect
function displayTime() { 

    //create a new Ajax request to the displayTime.php URL
	new Ajax.Request( "displayTime.php", 
	{ 
		method: "post", 
		onSuccess: displayResult2
	} 
	);
}

// Written by Victoria Hewitt
// This is my AJAX aspect
function displayResult2(ajax){
	document.getElementById("time").innerHTML = ajax.responseText;
}
