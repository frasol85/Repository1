"use strict";
/*
IS 448
Ray Rasolofonera
Deliverable 6
12/18/2018
File: infoUpdate.js 
This File validates the update file page and also 
Change the color of the button on the navbar when mouse hover on and off the buttons
*/

window.onload=pageLoad;

function pageLoad()
{
	document.getElementById("submitButton").onclick = usr_info;
	$('u_pass').onblur = checkPassword; // AJAX
	$("usr_n").onblur = validateUsername;  // AJAX

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
//This function validate all the form on the infoUpdate.php
function usr_info(){
	var u_first  = document.getElementById("F_Name").value;     // First Name 1
	var u_last   = document.getElementById("L_Name").value;     // Last Name  2
	var u_add1   = document.getElementById("add_1").value;      // Address 1  3 
	var u_add2   = document.getElementById("add_2").value;      // Address 2  4 
	var u_phn1   = document.getElementById("ph_num").value;     // Phone Num  5
	var u_usrn   = document.getElementById("usr_n").value;      // Usrname    6
	var u_pass_1 = document.getElementById("u_pass").value;     // Password   7
	var u_ctry_1 = document.getElementById("ctry").value;       // Country    8
	var u_st_1   = document.getElementById("u_st").value;       // State      9
	var u_city_1 = document.getElementById("u_city").value;     // City       10
	var u_zip_1  = document.getElementById("u_zip").value;      // Zip Code   11


	var pattern1 = /^[A-Za-z\s]+$/;                // First Name 
	var pattern2 = /^[A-Za-z\s]+$/;                // Last Name  
	var pattern3 = /^[0-9A-Za-z\s\-]+$/;           // Address 1  
	var pattern4 = /^[0-9A-Za-z\s\-]+$/;           // Address 2  
	var pattern5 = /^\d{3}-\d{3}-\d{4}$/;          // Phone Num  
	var pattern6 = /^[0-9A-Za-z]+$/;               // Usrname     
	//var pattern7 = password                      // Password   
	var pattern8 = /^[A-Za-z\s]+$/;                // Country    
	var pattern9 = /^[A-Za-z]{2}$/;                // State      
	var pattern10 = /^[A-Za-z\s]+$/;               // City       
	var pattern11 = /^[0-9]+$/;                   // Zip Code   

	var result1 = pattern1.test(u_first);
	var result2 = pattern2.test(u_last);
	var result3 = pattern3.test(u_add1);
	var result4 = pattern4.test(u_add2);
	var result5 = pattern5.test(u_phn1);
	var result6 = pattern6.test(u_usrn);
	//var result7 = pattern7.test();
	var result8 = pattern8.test(u_ctry_1);
	var result9 = pattern9.test(u_st_1);
	var result10 = pattern10.test(u_city_1);
	var result11 = pattern11.test(u_zip_1);


	if(u_first == "") // Check if FirstName is Empty
		{
			alert("Please Fill the First Name Box");
		}
		
	if (result1 == false) // Check if the input matches the correct Form
		{
			alert("The First Name (" +u_first+ ") is NOT in the correct form.");
			document.getElementById("F_Name").select();
			return false;
		}

	if(u_last == "") // Check if Last name is Empty
		{
			alert("Please Fill the Last Name Box");
		}
		
	if (result2 == false) // Check if the input matches the correct Form
		{
			alert("The Last Name (" +u_last+ ") is NOT in the correct form.");
			document.getElementById("L_Name").select();
			return false;
		}

	if(u_add1 == "") // Check if Address 1 is Empty
		{
			alert("Please Fill the Address 1 Box\nOR Just type NONE if you dont have any");
		}

	if (result3==false) // Check if the input matches the correct Form
		{
			alert("The Address 1 (" +u_add1+ ") is NOT in the correct form.");
			document.getElementById("add_1").select();
			return false;
		}

	if(u_add2 == "") // Check if Address 2 is Empty
		{
			alert("Please Fill the Address 2 Box\nOR Just type NONE if you dont have any");
		}
		
	if (result4==false) // Check if the input matches the correct Form
		{
			alert("The Address 2 (" +u_add2+ ") is NOT in the correct form.");
			document.getElementById("add_2").select();
			return false;
		}


	if(u_phn1 == "") // Check if FirstName is Empty
		{
			alert("Please insert your Phone Number");
		}

	if (result5==false) // Check if the input matches the correct Form
		{
			alert("The Phone Number (" +u_phn1+ ") is NOT in the correct form.\nPlease set it as XXX-XXX-XXXX");
			document.getElementById("ph_num").select();
			return false;
		}

	if(u_usrn == "") // Check if FirstName is Empty
		{
			alert("Please fill the Username Box");
		}
		
	if (result6==false) // Check if the input matches the correct Form
		{
			alert("The Username (" +u_usrn+ ") is NOT in the correct form.");
			document.getElementById("usr_n").select();
			return false;
		}

	if(u_pass_1 == "") // Check if FirstName is Empty
		{
			alert("Please Fill the Password Box");
		}
		
	/*if (result==false) // Check if the input matches the correct Form
		{

			alert("The First Name you entered (" + firstN+ ") is NOT in the correct form.");
			document.getElementById("usr_n").select();
	    
			return false;
		}
	*/
	if(u_ctry_1 == "") // Check if FirstName is Empty
		{
			alert("Please Fill the Country Box");
		}
		
	if (result8==false) // Check if the input matches the correct Form
		{
			alert("The Country (" +u_ctry_1+ ") is NOT in the correct form.");
			document.getElementById("ctry").select();
			return false;
		}

	if(u_st_1 == "") // Check if FirstName is Empty
		{
			alert("Please Fill the State Box");
		}

	if (result9==false) // Check if the input matches the correct Form
		{
			alert("The State (" +u_st_1+ ") is NOT in the correct form.\nOnly insert 2 Capital letters");
			document.getElementById("u_st").select();
			return false;
		}

	if(u_city_1 == "") // Check if FirstName is Empty
		{
			alert("Please Fill the City Box");
		}
		
	if (result10==false) // Check if the input matches the correct Form
		{
			alert("The City (" +u_city_1+ ") is NOT in the correct form.\nOnly insert Letters");
			document.getElementById("u_city").select();
			return false;
		}

	if(u_zip_1 == "") // Check if FirstName is Empty
		{
			alert("Please Fill the Zip Code Box");
		}
		
	if (result11 ==false) // Check if the input matches the correct Form
		{
			alert("The Zip Code (" +u_zip_1+ ") is NOT in the correct form.\nOnly insert Number that has no more than 5 digits ");
			document.getElementById("u_zip").select();
			return false;
		}
}

// USE of AJAX
function checkPassword(){
	 var pass_word = $("u_pass").value;

new Ajax.Request ("strongORnot.php",
	{
		method:"get",
		parameters:{pass:pass_word},
		onSuccess: displayResult,
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

function validateUsername(){
	//retrieve value from the 'term' textbox
	var searchTerm = $("usr_n").value;
	
	new Ajax.Request( "checkName.php", 
	{ 
		method: "get", 
		parameters: {name:searchTerm},
		onSuccess: displayResult1,
		//onFailure: displayFailureMessage
	} 
	);
}

	function displayResult1(ajax){
		//document.getElemenyById("result").innerHTML = ajax.responseText;
		$("usrbox").innerHTML = ajax.responseText;

		if (ajax.responseText == 'Taken')
		{
			$("usrbox").style.backgroundColor = "red";
			$("usrbox").style.color = "white";
			$("usrbox").focus();
		}
		else{
			$("usrbox").style.backgroundColor = "green";
			$("usrbox").style.color = "white";
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
