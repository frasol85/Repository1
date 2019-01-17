<?php
session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
	<title>Homepage</title>
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
        Filename: homepage.php
        12/18/2018
        This file show the homepage and the profile of the user 
    -->

	<!-- This goes around the entire document -->
	<div class="outsideBorder">

	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
	<nav>
		<ol> <!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar">  Home       </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1"> Leagues    </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2"> Courts     </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3"> Membership </span> </a></li>
			<?php
			if (!isset($_SESSION["user"]))
			{
				?>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php"> <span id = "navbar4"> Login </span></a></li>
				<?php
			}
			else
			{
				?>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/logout.php"> <span id = "navbar5"> LogOut </span></a></li>	
				<?php
			}
			?>			
		</ol>
	</nav>
	
	<?php
			if (!isset($_SESSION["user"]))
			{
				?>
				<h1> Welcome to Genuine Gym </h1>
				<?php
			}
			else
			{
				?>
				<h1> Welcome to Your Profile <?php print ($_SESSION["fname"]." ". $_SESSION["lname"]) ?> </h1>
				<?php
			}
			?>
			<!-- This is from the bottom of the header to the bottom of the page -->
			<div class ="underHeaderBorder">
			
				<?php
					if (!isset($_SESSION["user"]))
					{
						?>
						<div class ="centerInformation">
							<img src="genuinefit.jpg" alt="homepic" width = "800" height = "500"/><br/>
						</div> <!-- end of centerInformation -->

				<?php
					}
					else
					{
						#connect to mysql database
						$db = mysqli_connect("studentdb-maria.gl.umbc.edu","hewitt1","hewitt1","hewitt1");

						if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
						//else
						//	{
						//		print ("Database Connected <br/>");
						//	}

						//Constructed Queries
						$table_1 = "SELECT * from members WHERE mid = '".$_SESSION['mem_ID']."'    ";

						//$table_2 = "SELECT * from time_court WHERE mid = '".$_SESSION['mem_ID']."'   ";

						//Constructed Queries
						$table_2 = "SELECT * from time_court";

						//print(" Here is the Query: $table_1 <br/>");

						//EXECUTION of the selection of the table_1 and table_2
						$result = mysqli_query ($db, $table_1);
						$result_2 = mysqli_query ($db, $table_2);
						

						//Check in case the selection Failed
						if((!$result) || (!$result_2))
						{
							print("Error - query could not be executed");
							$error = mysqli_error($db);
							print "<p> . $error . </p>";
							exit;
						}

							// Set and Array 
							$time = Array();
							$crt_name = Array();
							$crt_res_dat = Array();
							$index = 0;

							// Get all the ROW data in the time_court's table 
							//$row_array_2 = mysqli_fetch_array($result_1);
							while ($row_array_2 = mysqli_fetch_array($result_2))
							{
								if ($_SESSION["mem_ID"] == $row_array_2["mid"])
								{
									$time[$index] = $row_array_2["time_select"];
									$crt_name[$index] = $row_array_2["court_name"];
									$crt_res_dat[$index] = $row_array_2["court_res_date"];

									$index++;

								}

							}
						//print_r($tim
						//print(" Here is the member id " .$_SESSION['mem_ID']);

						// Get all the ROW data in the member's table
						$row_array = mysqli_fetch_array($result);

				?>
						<br/>
						<!-- THESE TABLES DISPLAY THE USER's INFO --->
							<table border="1">
								<tr>
								<th> Your MEMBER ID IS:</th>
								</tr>
								<?php
									print("<tr>");
									print("<td>" . $row_array["mid"] .  " </td>  ");
									print("</tr>");	
								?>
							</table>

						<br/> 

							<table border="1">
								<tr>
									<th> First Name </th>
									<th> Last Name </th>
									<th> DOB </th>
									<th> Gender </th>
									<th> Address 1 </th>
									<th> Address 2 </th>
								</tr>
								<?php
									print("<tr>");
									print("<td>"  .$row_array["fname"]     .  " </td>  ");
									print("<td>"  .$row_array["lname"]     .  " </td>  ");
									print("<td>"  .$row_array["dob"]       .  " </td>  ");
									print("<td>"  .$row_array["gender"]    .  " </td>  ");
									print("<td>"  .$row_array["address"]   .  " </td>  ");
									print("<td>"  .$row_array["address_2"] .  " </td>  ");
									print("</tr>");	
								?>
							</table>

						<br/>

							<table border="1">
								<tr>
									<th> Phone Num </th>
									<th> Username </th>
									<th> Password </th>
									<th> League type </th>
									<th> Membership </th>
									<th> Country </th>
									<th> State </th>
									<th> City </th>
									<th> Zip Code </th>
								</tr>
								<?php
									print("<tr>");
									print("<td>" . $row_array["pnum"]     . " </td> ");
									print("<td>" . $row_array["uname"]    . "  </td> ");
									print("<td>" . $row_array["pass"]     . "  </td> ");
									print("<td>" . $row_array["ltype"]    . "  </td> ");
									print("<td>" . $row_array["mtype"]    . "  </td> ");
									print("<td>" . $row_array["country"]  . "  </td> ");
									print("<td>" . $row_array["state"]    . "  </td> ");
									print("<td>" . $row_array["city"]     . "  </td> ");
									print("<td>" . $row_array["zip_code"] . " </td> ");	
									print("</tr>");									
								
								?>
							</table>

						<br/>

							<table border="1">
								<tr>
									<th> Court Name </th>
									<th> Court Reservation Date </th>
									<th> Court Time </th>
								</tr>

								<?php
									for ($count = 0 ; $count < $index ; $count++)
										 {
										 	print("<tr>");
										 	print("<td>" . $crt_name[$count].    " </td>");
										 	print("<td>" . $crt_res_dat[$count]. " </td>");
											print("<td>" . $time[$count] .        "</td>");
											print("</tr>");		
										}

									/*
									for ($count = 0 ; $count < $_SESSION["index"] ; $count++)
										 {
										 	print("<tr>");
										 	print("<td>" . $_SESSION["crt_name"][$count]. " </td>");
										 	print("<td>" . $_SESSION["crt_res_dat"][$count] . "</td>");
										 	print("<td>" . $_SESSION["time"][$count].    " </td>");	
											print("</tr>");		
										}
										*/
								?>
							</table>
									<br/><br/>

										<p class = "centerInformation">
											Please click Here if You would like to <br/><a href="infoUpdate.php">  UPDATE YOUR INFO </a> 
										</p>
										<p class = "centerInformation">
											 <a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/reservedcourt.php">  CANCEL COURT RESERVATION </a> 
										</p>

									<br/><br/><br/><br/><br/><br/><br/><br/><br/>								
						<?php
					}
				?>				
		</div> <!--end of underHeaderBorder -->
	</div> <!-- end of outsideBorder -->
</body>
</html>