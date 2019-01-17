<?php
	if(!session_start())
	{
		print("The session did not start");
	}
	else
	{
		print("The session STARTED <br/>");
	}

	if (!session_destroy())
	{
		print(" The session is not Destroyed");
	}
	else
	{
		print(" You are logged out Session Destroyed");
	}
?>
	<!--
	<?php
		//print($_SESSION["user"]);
	?> --> 

<!DOCTYPE html>
<html lang="en">
<head>
	<title> Logout </title>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<!-- This links to a stylesheet -->
	<link rel="stylesheet" type = "text/css" href="homepage.css" title="style"/>
	<script type = "text/javascript"  src = "navbar.js" ></script>
	<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
</head>

<body>
	 <!--
        Ray Rasolofonera
        IS 448/Section 02
        Deliverable 6
        Filename: logout.php
        12/18/2018
        This file will Destroy the session variable and logout users
    -->

	<!-- This goes around the entire document -->
	<div class="outsideBorder">

	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
	<nav>
		<ol><!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar">  Home       </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1"> Leagues    </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2"> Courts     </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3"> Membership </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php">            <span id = "navbar4"> Login      </span></a></li>
		</ol>
	</nav>

	<!-- This is the Separated space between the Navigation Bar and the Body of the page. -->
	<h1>Thank you for Visiting You have been Logged out</h1>
	
	<!-- This is from the bottom of the header to the bottom of the page -->
		<div class ="underHeaderBorder">
			<div class ="centerInformation">
				<img src="genuinefit.jpg" alt="homepic" width = "800" height = "500"/><br/>
			</div> <!-- end of centerInformation -->
		</div> <!-- end of underHeaderBorder -->
	</div> <!-- end of outsideBorder -->
</body>
</html>