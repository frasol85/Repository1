<?php
session_start();

?> 
<!DOCTYPE html>
<html lang="en">
<head>
<title> User Update Inputs</title>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<!-- This is a link to the style sheet -->
<link rel="stylesheet" type="text/css" href="homepage.css" />
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/prototype/1.7.3.0/prototype.js"></script>

</head>
<body>
	 <!--
        Ray Rasolofonera
        IS 448/Section 02
        Deliverable 6
        Filename: infoUpdate.php
        12/18/2018
        This file will set the form for Updating User info once they are logged in
    -->
	<div class="outsideBorder">
	<!-- This is the Navigation bar with Home, Leagues, Courts, Membership, and Login -->
	<nav>
		<ol><!-- These Navigation bar had been given an Ids for the navbar.js to refer to -->
			<li class ="navtitle"><span id = "time"> </span> </li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/homepage.php">          <span id = "navbar">  Home       </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~hewitt1/is448/groupProject/leagues.php"> <span id = "navbar1"> Leagues    </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~chauhan3/is448/groupProject/courts.php"> <span id = "navbar2"> Courts     </span></a></li>
			<li class="navtitle"><a href="https://swe.umbc.edu/~julie16/is448/Project/membership.php">   <span id = "navbar3"> Membership </span></a></li>
			<?php
			if (!isset($_SESSION["user"]))
			{
				?>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/login2.php"><span id = "navbar4">Login </a></li>
				<?php
			}
			else
			{
				?>
				<li class="navtitle"><a href="https://swe.umbc.edu/~frasol1/is448/d6/logout.php"><span id = "navbar5"> LogOut </a></li>	
				<?php
			}
			?>
		</ol>
	</nav>

		<h1>Update your Info <?php print ($_SESSION["fname"]." ". $_SESSION["lname"]) ?> </h1>

		<div class ="underHeaderBorder">

			<div class ="centerInformation">
				<b>Only Change the INFO you want to be UPDATED </b> <br/><br/><br/>
			</div>


				<form name = "member1" method = "POST" action = "infoUpdate_2.php">

					<table border="1">
						<tr>
							<th> First Name <input type="text" name="fname1" value= "<?php echo $_SESSION["fname"] ; ?>"  id = "F_Name"/> </th>
							<th> Last Name <input type="text" name="lname1" value= "<?php echo $_SESSION["lname"]  ; ?>"  id = "L_Name"/> </th>
							<th> DOB <input type="date" name="dob1" value= "<?php echo $_SESSION["dob"] ; ?>" /></th>
							<th> Gender 
								<select name="sex">
								<option value="Male" <?php if ($_SESSION["gender"] == 'Male'){echo "selected";} ?>> Male </option>
								<option value="Female" <?php if ($_SESSION["gender"] == 'Female'){echo "selected";} ?>> Female </option>
								<option value="Other" <?php if ($_SESSION["gender"] == 'Other'){echo "selected";} ?>> Other </option>
								</select>
							</th>
						</tr>
					</table>

					<br/>

					<table border="1">
						<th> Address 1 <input type="text" name="add1" size = "80" value= "<?php echo $_SESSION["address"]  ; ?>" id = "add_1" /></th></tr>
					</table>

					<br/>

					<table border="1">
						<th> Address 2 <input type="text" name="add2" size = "80"value= "<?php echo $_SESSION["address_2"] ;  ?>" id = "add_2"/></th></tr>
					</table>

					<br/>

					<table border="1">
						<tr>
							<th> Phone Num <input type="text" name="phn1" value= "<?php echo $_SESSION["pnum"]   ;   ?>"  id = "ph_num" /></th>
							<th> Username <input type="text" name="usrname1"value= "<?php echo $_SESSION["user"] ;   ?>"  id = "usr_n" /></th>
							<th> <span id="usrbox"></span> </th>
							<th> Password <input type="text" name="pass1" value= "<?php echo $_SESSION["pass"]   ;   ?>"  id = "u_pass" /></th>
							<th> <span id="comment"></span> </th>
						</tr>

					</table>

					<br/> 

					<table border="1">
							<th> Country <input type="text" name="country1"value= "<?php echo $_SESSION["country"]    ;  ?>" id = "ctry" /></th> 
							<th> State <input type="text" name="State1"  value= "<?php echo  $_SESSION["state"]       ;  ?>" id = "u_st" /></th>
							<th> City <input type="text" name="city1"  value= "<?php echo $_SESSION["city"]           ;  ?>" id = "u_city" /></th>
							<th> Zip Code <input type="text" name="zipcode1" value= "<?php echo $_SESSION["zip_code"] ;  ?>" id = "u_zip" /></th>
						</tr>
					</table>

					<br/><br/>
									
					<div class ="centerInformation">
						<p>
							<input type="submit" value="Submit" id = "submitButton">
						</p>
					</div>

					<br/><br/>

				</form>

			</div>	<!--underHeaderBorder-->
		</div> <!--outsideBorder -->
		<script type = "text/javascript"  src = "infoUpdate.js" ></script>

	</body>
</html>