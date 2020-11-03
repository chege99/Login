<?php
//First things First, Import the databse configurations file called dbcon.php
include('./dbcon.php');

//Next, check if the user has clicked the submit button from your login form.. For this, its more efficient to use the isset function.
if(isset($_POST['btn'])){

	//Since the submit button has been clicked, we just get the data that has been supplied by the forms
	/*	
	This is the easy way of doing it (like you have done)
		$username = $POST['user'];
		$password = $POST['pass'];

	But this is the more secure way of doing it... We can filter the string.. (To prevent Sql injection)... Then we Sanitize the string to prevent Corona because Ha Ha Haa!... But really, we need to sanitize it..... data received from forms could be a an sql command from a hacker tryna make your life miserable.. You definitely know these things..
	*/
	$username= filter_var($_POST["user"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	$password = filter_var($_POST["pass"],FILTER_SANITIZE_STRING, FILTER_FLAG_STRIP_HIGH);
	//With that, you dont even need to stripcslashes or mysql_real_escape_string your variables.... 
	/*
		$username = stripcslashes($username);;
		$password = stripcslashes($password);;
		$username = mysql_real_escape_string($username);
		$password = mysql_real_escape_string($password);
	*/


	//Lets remove this connection part since were have imported the dbcon.php file which has a connection to our database already. 
	/*
		mysql_connect("localhost", "root", "'");
		mysql_select_db("Login");
	*/


	//----------------------------------------------------//

	// Now lets dive in to authentication

	/*
		//This is what you have
		$result = mysql_query("select * frm users where username = '$username' and password = '$password'") 
		or die("failed to query database".mysql_error());
	*/

		//$link is the conection string variable imported from the dbcon.php file.. Were simply just going to reuse it
		//I have made a new variable, $query, just to make life easier for you
			
		$query = "select * frm users where username = '$username' and password = '$password'"; 
		$result = mysqli_query($link,$query);

		//Also I have noted that you are using mysql functions, might i suggest that you use mysqli (its as simple as adding an 'i' to every mysql function).
		
		/*	//This is what you have
				$row = mysqli_fetch_array($result);

				if ($row['username'] == $username && $row['password'] == $password) {
					echo "Login Successful!!! Welcome" .$row['username'];
				}else{
					echo "Failed to login.";
				}

		*/
		//Might i suggest this instead:

		//Count the number of rows that have been received from query sent to the database
		$count=mysqli_num_rows($query);
		//mysqli_fetch_array fetches the details received from the query and stores them as in an array called $row 
		$row = mysqli_fetch_array($query);

		//This checks if any record in the database matches with the credentials provided by the end-use.. 
		if($count > 0){
			
			echo "Login Successful!!! Welcome" .$row['username'];

		}else{

			echo "Failed to login.";

		}

}else{
	//The submit button has not been clicked
}

//----------------------------------------------------------------------------------------------------//
									// 	HAPPY CODING //

//PS: I've not tested it out since I'm too lazy to make the database, so Happy Debugging too... Maybe

//----------------------------------------------------------------------------------------------------//

?>
