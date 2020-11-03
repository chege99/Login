<!DOCTYPE html>
<html>
<head>
	<title> Login Page</title>
	<link rel="stylesheet" type="text/css" href="style.css">
</head>
<body>
	<div id = "frm">
		<!-- I have created a folder called php which will contain all the php scripts that you need.. Just a cleaner way to structure your files -->
		<form action="./php/process.php" method ="POST">
			<!-- Use divs to wrap your elements... divs are way better than p (paragraphs)  -->
			<div>
				 <label>Username</label>
				 <input type=" text"  id = "user" name="user"/>
			</div>
			<div>
				 <label>Password</label>
				 <input type=" password"  id = "pass" name="pass"/>
			</div>
			<div>
				 <input type=" submit"  id = "btn" value="login"/>
			</div>  
		
		</form>

	</div>

</body>
</html>