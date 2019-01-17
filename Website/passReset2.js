"use strict";
/*
IS 448
Ray Rasolofonera
Deliverable 6
12/18/2018
File: passReset2.js 
This file is validating the passReset2.php form
- Check if password is weak or strong
- Check if the confirmed password matches the new password
- Change the color of the button on the navbar when mouse hover on and off the buttons

*/

window.onload=pageLoad;

function pageLoad()
{
	document.getElementById("submitButton1").onclick = reset_pass; // JUST JS

	$('n_pass').onblur = checkPassword; // AJAX
	$('n_pass1').onblur = matchPass; // AJAX

	// Written by Victoria Hewitt
    // This is my AJAX aspect
    setInterval("displayTime()",1000);

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
  //console.log("blabababa");
   if(event.type == "mouseover")
      {
        this.style.color='red';
      }
  else 
      {
        this.style.color='blue';
      }

}

// This Function is for the Validation of the Inputs on passReset2.php
function reset_pass(){
var memId = document.getElementById("mem_id").value;
var newpass = document.getElementById("n_pass").value;
var newpass1 = document.getElementById("n_pass1").value;

var pattern1 =/^[0-9]+$/ // Only Starts and end with numbers 

var result = pattern1.test(memId);

	if(memId == "") // Check if Member ID is Empty
		{
			alert("Please insert your Member ID");
			return false;
		}
	
	if (result==false) // Check if the input matches the correct Form
		{

			alert("The Member ID (" + memId + ") is NOT in the correct form \nOnly Enter Numbers");
			document.getElementById("mem_id").select();
			return false;
		}
	if(newpass == "") // Check if New Password Box is Empty
		{
			alert("Please insert your New Password");
			document.getElementById("n_pass").select();
			return false;
		}

	if(newpass1 == "") // Check if Confirmation Password is Empty
		{
			alert("Please Confirm your Password");
			document.getElementById("n_pass").select();
			return false;
		}
}


// USE of AJAX Check if Password is Strong or Weak
function checkPassword(){
	 var pass_word = $("n_pass").value;
	// var pass_word1 = $("n_pass1").value;

new Ajax.Request ("strongORnot.php",
	{
		method:"get",
		parameters:{pass:pass_word},
		onSuccess: displayResult,
		//onFailure: displayFailureMessage,
	}

	);
}

function displayResult(ajax)
{

	$("comment").innerHTML = ajax.responseText;

	if(ajax.responseText == !$U_case || !$L_case  || !$number || (strlen($password) < 6))
	{
		$("comment");
	}
	else{
		$("comment");
	}

}

// USE of AJAX Check if Password is Confirmed password matches to the new
function matchPass()
{
	var pass_word = $("n_pass").value;
	var pass_word1 = $("n_pass1").value;

new Ajax.Request ("matchORnot.php",
	{
		method:"get",
		parameters:{pass:pass_word, pass1:pass_word1},
		onSuccess: displayResult1,
		//onFailure: displayFailureMessage,
	}

	);

}
// Display the Ajax values
function displayResult1(ajax)
{
	$("check").innerHTML = ajax.responseText;

	if(ajax.responseText == ($password == $password1))
	{
		$("check");
	}
	else{
		$("check");
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
