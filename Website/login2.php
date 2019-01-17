<!DOCTYPE html>
<html lang="en">
	<head>
		<title> Member Login </title>
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
        Filename: login2.php
        12/18/2018
        This file will allow user to be logged in if they had Signed Up  
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
	<!-- This is the Separated space between the Navigation Bar and the Body of the page. -->
	<h1> Member Login </h1>
	
	<!-- This is from the bottom of the header to the bottom of the page -->
	<div class ="underHeaderBorder">
	
		<form name = "member" method = "POST" action = "login.php">

			<div class ="centerInformation">
				<p>
					Enter your Username:
					<input type="text" id = "u_name" name="usr_name" />
				</p>

				<p>
					Enter your Password: 
					<input type="password" id = "pass_w" name="pass_word" /> 
				</p>

				<p>
					<a href="passReset2.php">Forgot Password ?</a> <br/> <br/>
					<input type="submit" value="Submit" id = "submitButton1">
				</p>

				<p>
					<a href="https://swe.umbc.edu/~bchee1/is448/Project/signup.php"> Don't Have an Account Yet!! SIGN UP HERE</a>
					
				</p>
			</div> <!-- end of centerInformation -->

		</form>
	</div> <!-- end of underHeaderBorder -->
	</div> <!-- end of outsideBorder -->
	<!-- This is a link to a Javascript file -->
	<script type = "text/javascript"  src = "navbarPop.js" ></script>
	</body>
</html>