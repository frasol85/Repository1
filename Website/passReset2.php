<!DOCTYPE html>
<html lang="en">
<head>
	<title> Inputs For Password Reset </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <!-- This is a link to the style sheet -->
	<link rel="stylesheet" type ="text/css" href ="homepage.css"/>
	
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>

</head>

<body>
	 <!--
	    Ray Rasolofonera
	    IS 448/Section 02
	    Deliverable 6
	    Filename: passReset2.php
	    12/18/2018
	    This file will prompt users to put their member ID and the new password
	-->

	<div class="outsideBorder">
	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
	<nav>
		<ol> <!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar">  Home       </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1"> Leagues    </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2"> Courts     </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3"> Membership </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php">            <span id = "navbar4"> Login      </span> </a></li>
		</ol>
	</nav>

	<h1> Reset Password </h1>

	<!-- This is from the bottom of the header to the bottom of the page -->
	<div class ="underHeaderBorder">
		
	<form name = "Reset" method = "POST" action = "passReset.php">

		<div class ="centerInformation">

			<p>
				<strong> Strong Password should have </strong><br/> 
				 -at least One Number <br/>
				 -One Upper And Lower case letter <br/>
				 -and up to 6 Characters Long<br/> 	
				<strong> Ex: clas1C</strong><br/> <br/> <br/>

				<strong> To RESET your Password Enter your </strong><br/> 
			<p>	
				Member ID:
				<input type="text" name="mem_id"  id ="mem_id"/>
			</p>

			<p>
				New Password:
				<input type="text" name="new_pass" id ="n_pass" /> 
				<span id="comment"></span>
			</p>
			
			<p>
				Confirm Password:
				<input type="text" name="new_pass1" id = "n_pass1" /> 
				<span id="check"></span>
			</p>
			
			<p>
				<input type="submit" value="Submit" id = "submitButton1">
			</p>

		</div> <!-- end of centerInformation -->

	</form>

	</div> <!-- end of underHeaderBorder -->
	</div> <!-- end of outsideBorder -->
	<script type = "text/javascript"  src = "passReset2.js" ></script>

	</body>
</html>