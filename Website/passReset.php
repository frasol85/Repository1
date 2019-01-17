<!DOCTYPE html>
<html lang="en">
<head>
	<title> PHP for login  </title>
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
        Deliverable 6
        Filename: passReset.php
        12/18/2018
        This file will confirm if the password had been reseted or NOT
    -->
<div class="outsideBorder">
	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
		<nav>
			<ol><!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
				<li class ="navtitle"><span id = "time"> </span> </li>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar">  Home       </span> </a></li>
				<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1"> Leagues    </span> </a></li>
				<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2"> Courts     </span> </a></li>
				<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3"> Membership </span> </a></li>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php">            <span id = "navbar4"> Login      </span> </a></li>
			</ol>
		</nav>

	<h1> Check </h1>
				
	<?php

		#connect to mysql database
		$db = mysqli_connect("studentdb-maria.gl.umbc.edu","hewitt1","hewitt1","hewitt1");

		if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
		//else
		//	{
		//		print ("Database Connected <br/>");
		//	}

		// Check if the member ID is correct and the new password is confirmed
		if ((isset($_POST["mem_id"])) && (!empty($_POST["mem_id"])) &&
			(isset($_POST["new_pass"])) && (!empty($_POST["new_pass"])) &&
			(isset($_POST["new_pass1"])) && (!empty($_POST["new_pass1"]))
			)

			{
				$member_ID = htmlspecialchars($_POST["mem_id"]);
				$n_pass1 = htmlspecialchars($_POST["new_pass"]);
				$n_pass2 = htmlspecialchars($_POST["new_pass1"]);

				$member_ID = mysqli_real_escape_string($db, $member_ID);
				$n_pass1 = mysqli_real_escape_string($db, $n_pass1);
				$n_pass2 = mysqli_real_escape_string($db, $n_pass2);

				// Constructed Query
				$table_1 = "SELECT * from members";

				// EXECUTION of the selection of the table_1
				$result = mysqli_query ($db, $table_1);

				//Check in case the selection Failed
				if(!$result)
				{
					print("Error - query could not be executed");
					$error = mysqli_error($db);
					print "<p> . $error . </p>";
					exit;
				}

				// Get all the data in the member's table 
				//$row_array = mysqli_fetch_array($result);
				//print_r($row_array);

				// Go through the members' row to who's member ID had been Entered
				while ($row_array = mysqli_fetch_array($result))
				{
					if ($member_ID == $row_array["mid"]){ break;} // Fetch data of one user

				}

					// If Password matches then Update the Password or set the NEW password
					if(($member_ID == $row_array["mid"]) && ($_POST["new_pass"] == $_POST["new_pass1"]))
						{	

								// Constructed query
								$The_query = "UPDATE members 
								SET pass = '$n_pass1' 
								WHERE mid = '$member_ID'";

								// Execution of the selection of the table (TO RUN THE STATEMENT)
								$result_1 = mysqli_query ($db, $The_query);

								//Check in case the selection Failed
								if(!$result_1)
								{
									print("Error - query could not be executed");
									$error = mysqli_error($db);
									print "<p> . $error . </p>";
									exit;
								}

							 	#sanity check: print query to see if constructued query is correct
								#print("<h3>Sanity check print statement:</h3> The query is: $The_query</br>");

							?>

								<!-- This is from the bottom of the header to the bottom of the page -->
								<div class ="underHeaderBorder">
									<div class ="centerInformation">
										<?php
											//print("The first value is $n_pass1 and the second value is $n_pass2");
										?>

										<p> The Password has been Reseted </p> <br/>
										<p> THANK YOU</p>

									</div> <!-- end of centerInformation -->
								</div> <!-- end of underHeaderBorder -->
							</div> <!-- end of outsideBorder -->
							<?php
						}
					else
						{
							?>
								<div class ="underHeaderBorder">
									<p class = "centerInformation">
										Either your member ID was WRONG OR not found in the database <br/>
										<!-- Or your NEW PASSWORDS does not MATCH <br/> -->
										<a href="passReset2.php">Go Back</a> and re-enter Correct ID AND PASSWORD.
									</p>
								</div> <!-- end of underHeaderBorder -->
							</div> <!-- end of outsideBorder -->	
							<?php
						}
			}
		else
			{
				?>
					<div class ="underHeaderBorder">
						<p class = "centerInformation">
							One of your Inputs is Missing <br/>
							<a href="passReset2.php">Go Back</a> and re-enter ALL INPUTS
						</p>
					</div> <!-- end of underHeaderBorder -->
				</div> <!-- end of outsideBorder -->
				<?php
			}
		?>
	</body>
</html>