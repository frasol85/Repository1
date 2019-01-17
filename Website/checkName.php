<?php
	 
        /*Ray Rasolofonera
        IS 448/Section 02
        Deliverable 6
        Filename: checkName.php
        12/18/2018
        This file will check if the username is the same as the one in the database.
		*/
	if(!session_start())
	{
		print("The session did not start");
	}
	else
	{
			#connect to mysql database
			$db = mysqli_connect("studentdb-maria.gl.umbc.edu","hewitt1","hewitt1","hewitt1");

			if (mysqli_connect_errno())	exit("Error - could not connect to MySQL");
			//else
			// 	{
			// 		print ("Database Connected <br/>");
			// 	}

					// Select all the tables (Has to be here first in order to mactch User name and their passWord)
					$table_1 = "SELECT * from members";

					//EXECUTION of the selection of the table_1
					$result = mysqli_query ($db, $table_1);
					
					//print_r($result);
					//Check in case the selection Failed
					if(!$result)
						{
						print("Error - query could not be executed");
						$error = mysqli_error($db);
						print "<p> . $error . </p>";
						exit;
						}

					$q=$_GET["name"];

					$check = 0;
					// Go through the members' row to who's username had logged in 
					while ($row_array = mysqli_fetch_array($result))
					{
						if ($q  == $row_array["uname"]){ $check = 1; break;} // Hold data of one user

					}
				
					#retrieve value of parameter by name 'username' and store the value in the local variable $q
					//$q=$_GET["name"];
					//echo($check);

					if ($check == 1) 
					 {
					 	echo"Taken";
					 }
					 else{
						echo"Available";
					 }

		}
	
			
?>