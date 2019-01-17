"use strict";

/*
Ray Rasolofonera
IS 448/Section 02
Deliverable 6
Filename: navbarPop.js
12/18/2018
This file applies the PHP Validation and modifies the Css Aspect using JavaScript
*/

window.onload = pageLoad;
function pageLoad() {
  //Check the Username and the Password
   document.getElementById("submitButton1").onclick = chk_mem_log;

    // Written by Victoria Hewitt
    // This is my AJAX aspect
    setInterval("displayTime()",1000);

  //Change the color of the NAVBAR when mouse is on and away of the NAVBAR Button
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
 

}

//This function change the color of the navbar once the mouse is on and off the button
function changeColor()
{ 
   if(event.type == "mouseover")
      {
        this.style.color='red';
      }
  else 
      {
        this.style.color='blue';
      }

}
// This Function is for the Validation of the Inputs on login2.php
function chk_mem_log()
{ 
//console.log("ABSC");
  var usrname = document.getElementById("u_name").value;
  var pass = document.getElementById("pass_w").value;
  
  var pattern1 =/^[0-9A-Za-z]+$/;       // Only Starts and end with letters 

  var result = pattern1.test(usrname);

  if(usrname == "") // Check if Username is Empty
    {
      alert("Please insert your Username");
    }
  
  if (result==false) // Check if the input matches the correct Form
    {
      alert("The Username (" + usrname + ") is NOT in the correct form \nOnly Allow Numbers and Letters");
      document.getElementById("u_name").select();
      return false;
    }
    //else{alert("The Username "+ usrname + " is correct");}

  if(pass == "") // Check if Password box is Empty
    {
      alert("Please insert your Password");
      document.getElementById("pass_w").select();
      return false;
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
