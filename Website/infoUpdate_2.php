<?php
session_start();
//print($_SESSION["user"]);
?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title> User Update Inputs</title>
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
        Filename: infoUpdate2.php
        12/18/2018
        This file will Apply the Updates made in the database and Display it to the User's account
    -->

	<div class="outsideBorder">
	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
		<nav>
			<ol><!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar"> Home       </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1">Leagues    </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2">Courts     </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3">Membership </span></a></li>
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

			<h1>Your Info Had Been Updated</h1>

			<?php
				if (!isset($_SESSION["user"]))
				{
					header("Location:./login2.php"); //header("Location:https://swe.umbc.edu/~frasol1/is448/project4/login2.php");
				}
				else
				{
					#connect to mysql database
					$db = mysqli_connect("studentdb-maria.gl.umbc.edu","hewitt1","hewitt1","hewitt1");

					if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
					//else
					//	{
							//print ("Database Connected <br/>");
					//	}
			?>

					<div class ="underHeaderBorder">
						<br/>

							<?php
									// If all the inputs are all SET
								if ((isset($_POST["fname1"]))       &&
									(isset($_POST["lname1"]))       &&
									(isset($_POST["dob1"]))         &&
									(isset($_POST["sex"]))          &&
									(isset($_POST["add1"]))         &&
									//(isset($_POST["add2"]))   	&& 
									(isset($_POST["phn1"]))         &&
									(isset($_POST["usrname1"]))    	&&
									(isset($_POST["pass1"]))       	&&
									(isset($_POST["country1"]))    	&&
									(isset($_POST["State1"]))      	&&
									(isset($_POST["city1"]))       	&&
									(isset($_POST["zipcode1"])) 
									
									)

									{
											$f_name    = htmlspecialchars($_POST["fname1"])   ;
											$l_name    = htmlspecialchars($_POST["lname1"])   ;
											$d_ob      = htmlspecialchars($_POST["dob1"])     ;
											$u_sex     = htmlspecialchars($_POST["sex"])      ;
											$u_add1    = htmlspecialchars($_POST["add1"])     ;
											$u_add2    = htmlspecialchars($_POST["add2"])     ;
											$u_phn     = htmlspecialchars($_POST["phn1"])     ;
											$u_usrn    = htmlspecialchars($_POST["usrname1"]) ;
											$u_pass    = htmlspecialchars($_POST["pass1"])    ;
											$u_country = htmlspecialchars($_POST["country1"]) ;
											$u_state   = htmlspecialchars($_POST["State1"])   ;
											$u_city    = htmlspecialchars($_POST["city1"])    ;
											$u_zipC    = htmlspecialchars($_POST["zipcode1"]) ;

											$f_name    = mysqli_real_escape_string($db, $f_name)     ;
											$l_name    = mysqli_real_escape_string($db, $l_name)     ;
											$d_ob      = mysqli_real_escape_string($db, $d_ob)       ;
											$u_sex     = mysqli_real_escape_string($db, $u_sex)      ;
											$u_add1    = mysqli_real_escape_string($db, $u_add1)     ;
											$u_add2    = mysqli_real_escape_string($db, $u_add2)     ;
											$u_phn     = mysqli_real_escape_string($db, $u_phn)      ;
											$u_usrn    = mysqli_real_escape_string($db, $u_usrn)     ;
											$u_pass    = mysqli_real_escape_string($db, $u_pass)     ;
											$u_country = mysqli_real_escape_string($db, $u_country)  ;
											$u_state   = mysqli_real_escape_string($db, $u_state)    ;
											$u_city    = mysqli_real_escape_string($db, $u_city)     ;
											$u_zipC    = mysqli_real_escape_string($db, $u_zipC)     ;
								?>
									
									<?php
											// Apply update if the inputs were all set					
											$The_query_1 = "UPDATE members
											
											SET fname     = '$f_name'    ,
											 	lname     = '$l_name'    ,
												dob       = '$d_ob'      ,
												gender    = '$u_sex'     ,
												address   = '$u_add1'    ,
												address_2 = '$u_add2'    ,
												pnum      = '$u_phn'     ,
												uname     = '$u_usrn'    ,
												pass      = '$u_pass'    ,
												country   = '$u_country' ,
												state     = '$u_state'   ,
												city      = '$u_city'    ,
												zip_code  = '$u_zipC' 

											WHERE mid = '".$_SESSION['mem_ID']."'  ";

											//EXECUTION of the selection of The_query_1
											$result_1 = mysqli_query ($db, $The_query_1);

											//These variables will keep the updated Columns value 
											
											$_SESSION["fname"]     = $f_name    ;
											$_SESSION["lname"]     = $l_name    ;
											$_SESSION["dob"]       = $d_ob      ;
											$_SESSION["gender"]    = $u_sex     ;
											$_SESSION["address"]   = $u_add1    ;
											$_SESSION["address_2"] = $u_add2    ;
											$_SESSION["pnum"]      = $u_phn     ;	
											$_SESSION["user"]      = $u_usrn    ;
											$_SESSION["pass"]      = $u_pass    ;
											$_SESSION["country"]   = $u_country ;
											$_SESSION["state"]     = $u_state   ;
											$_SESSION["city"]      = $u_city    ;
											$_SESSION["zip_code"]  = $u_zipC    ;

									
											//Constructed Query		
											$table_1 = "SELECT * from members WHERE mid = '".$_SESSION['mem_ID']."'    ";;

											//print(" Here is the Query: $table_1 <br/>");

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

											// Get all the data in the member's table 
											$row_array = mysqli_fetch_array($result);

										?>
											<!-- THESE TABLES DISPLAY THE USER's INFO -->
											<table border="1">
												<tr>
												<th> Your MEMBER ID IS:</th>
												</tr>
												<?php
													print("<tr>");
													print("<td>" . $row_array["mid"] . "</td>");
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
													print("<td>". $row_array["fname"]     . "</td>   ");
													print("<td>". $row_array["lname"]     . "</td>   ");
													print("<td>". $row_array["dob"]       . "</td>   ");
													print("<td>". $row_array["gender"]    . "</td>   ");
													print("<td>". $row_array["address"]   . "</td>   ");
													print("<td>". $row_array["address_2"] . "</td>   ");
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
													print("<td>". $row_array["pnum"]       ."   </td>   ");
													print("<td>". $row_array["uname"]      ."   </td>   ");
													print("<td>". $row_array["pass"]       ."   </td>   ");
													print("<td>". $row_array["ltype"]      ."   </td>   ");
													print("<td>". $row_array["mtype"]      ."   </td>   ");
													print("<td>". $row_array["country"]    ."   </td>   ");
													print("<td>". $row_array["state"]      ."   </td>   ");
													print("<td>". $row_array["city"]       ."   </td>   ");
													print("<td>". $row_array["zip_code"]   ."   </td>   ");	
													print("</tr>");									
												?>
											</table>

												<br/><br/><br/><br/><br/><br/><br/><br/><br/>
								
											<?php
									} // End of the Big if statement
								?>						
					<?php
				}// End of the else Braces

			?>
	
			</div>
		</div>
	</body>
</html>