<?php
session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title> Member Logged IN </title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- This is a link to the style sheet -->
<link rel="stylesheet" type="text/css" href="homepage.css" />
<script type = "text/javascript"  src = "navbar.js" ></script>
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>
</head>
<body>
	 <!--
        Ray Rasolofonera
        IS 448/Section 02
        Deliverable 4
        Filename: login.php
        12/18/2018
        This file will allow user to access their account once they are logged IN 
    -->

    <!-- This goes around the entire document -->
	<div class="outsideBorder">
		<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
	<nav>
		<ol><!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar"> Home       </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1">Leagues    </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2">Courts     </span> </a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3">Membership </span> </a></li>
			<?php
			if((empty($_POST["usr_name"])) || (empty($_POST["pass_word"])))
				{
					?>
					<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php"> <span id = "navbar4">Login </span> </a></li>
					<?php
				}
				else{ 
						?></span>
							
						<?php 
						if (isset($_SESSION["user"]))
						{	
							?>
							<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php">  <span id = "navbar4">Login</span> </a></li>	
											
							<?php 
						} 
						else
						{
							?>
							<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/logout.php"><span id = "navbar5">LogOut</span> </a></li>
							<?php
						}
					}
				?>
			</ol>
	</nav>

		<?php
			#connect to mysql database
			$db = mysqli_connect("studentdb-maria.gl.umbc.edu","hewitt1","hewitt1","hewitt1");

			if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
			//else
			//	{
			//		print ("Database Connected <br/>");
			//	}

			if ((isset($_POST["usr_name"])) && (!empty($_POST["usr_name"])) &&
				(isset($_POST["pass_word"])) && (!empty($_POST["pass_word"]))
				)

				{
					$username = htmlspecialchars($_POST["usr_name"]);
					$passWord = htmlspecialchars($_POST["pass_word"]);

					$username = mysqli_real_escape_string($db, $username);
					$passWord = mysqli_real_escape_string($db, $passWord);


					// Select all the tables (Has to be here first in order to mactch User name and their passWord)
					$table_1 = "SELECT * from members";

					//EXECUTION of the selection of the table_1
					$result = mysqli_query ($db, $table_1);
					
					//Check in case the selection Failed
					if(!$result)
						{
						print("Error - query could not be executed");
						$error = mysqli_error($db);
						print "<p> . $error . </p>";
						exit;
						}
						
					// Go through the members' row to who's username had logged in 
					while ($row_array = mysqli_fetch_array($result))
					{
						if ($username == $row_array["uname"]){ break;} // Hold data of one user

					}

						// IF username and password are correct allow the user to Login
						if (($username == $row_array["uname"]) && ($passWord == $row_array["pass"]))
							{
								
								// Set session variable
								$_SESSION["mem_ID"]    = $row_array["mid"]       ;
								$_SESSION["fname"]     = $row_array["fname"]     ;
								$_SESSION["lname"]     = $row_array["lname"]     ;
								$_SESSION["dob"]       = $row_array["dob"]       ;
								$_SESSION["gender"]    = $row_array["gender"]    ;
								$_SESSION["address"]   = $row_array["address"]   ;
								$_SESSION["address_2"] = $row_array["address_2"] ;
								$_SESSION["pnum"]      = $row_array["pnum"]      ;
								$_SESSION["user"]      = $row_array["uname"]     ;
								$_SESSION["pass"]      = $row_array["pass"]      ;
								$_SESSION["ltype"]     = $row_array["ltype"]     ;
								$_SESSION["mtype"]     = $row_array["mtype"]     ;
								$_SESSION["country"]   = $row_array["country"]   ;
								$_SESSION["state"]     = $row_array["state"]     ;
								$_SESSION["city"]      = $row_array["city"]      ;
								$_SESSION["zip_code"]  = $row_array["zip_code"]  ;

					
								// Constructed Query
								$table_2 = "SELECT * from time_court";

								//EXECUTION of the selection of the table_2
								$result_1 = mysqli_query ($db, $table_2);

								//Check in case the selection Failed
								if(!$result_1)
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

								while ($row_array_2 = mysqli_fetch_array($result_1))
								{
									if ($_SESSION["mem_ID"] == $row_array_2["mid"])
									{
										$time[$index] = $row_array_2["time_select"];
										$crt_name[$index] = $row_array_2["court_name"];
										$crt_res_dat[$index] = $row_array_2["court_res_date"];

										$index++;

									}

								}
								//print_r($time);
								//print ("<br/>Logged in <br/>");

								?>

								<h1> <?php print ($_SESSION["fname"]." ". $_SESSION["lname"]) ?> Glad that you are Back </h1>

								<div class ="underHeaderBorder">
								<br/>
									<!-- THESE TABLES DISPLAY THE USER's INFO Once they are Logged in--->
												<table border="1">
													<tr>
													<th> Your MEMBER ID IS:</th>
													</tr>
													<?php
														$_SESSION["mem_ID"];
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
														print("<td> " .   $row_array["fname"]     .  " </td>   ");
														print("<td> " .   $row_array["lname"]     .  " </td>   ");
														print("<td> " .   $row_array["dob"]       .  " </td>   ");
														print("<td> " .   $row_array["gender"]    .  " </td>   ");
														print("<td> " .   $row_array["address"]   .  " </td>   ");
														print("<td> " .   $row_array["address_2"] .  " </td>   ");
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
													// Print 
														print("<tr>");
														print("<td> " . $row_array["pnum"]     .  " </td> ");
														print("<td> " . $row_array["uname"]    .  " </td> ");
														print("<td> " . $row_array["pass"]     .  " </td> ");
														print("<td> " . $row_array["ltype"]    .  " </td> ");
														print("<td> " . $row_array["mtype"]    .  " </td> ");
														print("<td> " . $row_array["country"]  .  " </td> ");
														print("<td> " . $row_array["state"]    .  " </td> ");
														print("<td> " . $row_array["city"]     .  " </td> ");
														print("<td> " . $row_array["zip_code"] .  " </td> ");	
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
														// They array of time, courtname and reservation data
														//$_SESSION["time"]      = $time;
														//$_SESSION["crt_name"]  = $crt_name; 
														//$_SESSION["crt_res_dat"] = $crt_res_dat;
														//$_SESSION["index"] = $index;
														//print_r($_SESSION["time"]);
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

											</div> <!-- End div underHeaderBorder -->

										<?php

							}
						else // in case the use Put WRONG inputs
							{
								?>
								<h1> Member Login </h1>

								<div class ="underHeaderBorder"></div>
								<?php
									//echo ("No information about $username is in table.");
									echo "<p class = 'centerInformation'> Either your Username or Password are Incorrect </p>";			
								?>
								<p class = "centerInformation">
									Please <a href="login2.php">Go Back</a> and re-enter Correct Input
								</p>
								<?php
							}	
						?>

		<?php 					
				}
				else // in case the use Put WRONG inputs
				{
					?>
					<h1> Member Login </h1>
					<div class ="underHeaderBorder"></div>
					<?php
						echo "<p class = 'centerInformation'> Either your Username or Password are Incorrect </p>";			
					?>
					<p class = "centerInformation">
						Please <a href="login2.php">Go Back</a> and re-enter Correct Input
					</p>
					<?php
				}
			?>
		</div> <!-- end of outsideBorder -->
	</body>
</html>