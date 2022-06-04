<!-- <!DOCTYPE html>
<html>
<head>
	
</head>
<body>
	
	<fieldset style="display: inline-block;width: 400px; text-align:center; align: center">
    <legend><b>REGISTRATION</b></legend>
	<form action="connect.php" method="post">
		<a href="login.html">Login</a>
		<br><br>
		<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td>Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>User Name</td>
				<td>:</td>
				<td><input name="userName" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Password</td>
				<td>:</td>
				<td><input name="password" type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td>Confirm Password</td>
				<td>:</td>
				<td><input name="confirmPassword" type="password"></td>
				<td></td>
			</tr>					
        </table><br>
		<input name="submit" type="submit" value="Submit">
		<input name="reset" type="reset">
	</form>
</fieldset>
</body>
</html>
 -->

 <?php
session_start();
$con = mysqli_connect("localhost","root","","zerox");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>

    <style>
    body{
        background-image: url("https://images.pexels.com/photos/2457284/pexels-photo-2457284.jpeg?auto=compress&cs=tinysrgb&h=650&w=940") ;
    
        /* Full height */
        height: 100vh; 
    
        /* Center and scale the image nicely */
        background-position:center;
        background-repeat: no-repeat;
        background-size: cover;
    }
    </style>    

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>

    <link rel="stylesheet" href="stylelogin.css">
    
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">

    <script src= "https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>


</head>
<body>
    
    <div>
        
        <div class="form">
            <a href="login.html"style="float: right;"> Login</a><br><br>
            
			<form action="connect.php" method="post">
                
			<table width="100%" cellpadding="0" cellspacing="0">
			<tr>
				<td style="color:white; text-align:left">Name</td>
				<td>:</td>
				<td><input name="name" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td style="color:white; text-align:left">Email</td>
				<td>:</td>
				<td>
					<input name="email" type="text">
				</td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td style="color:white; text-align:left">User Name</td>
				<td>:</td>
				<td><input name="userName" type="text"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>
			<tr>
				<td style="color:white; text-align:left">Password</td>
				<td>:</td>
				<td><input name="password" id=password type="password"></td>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>		
			<tr>
				<td style="color:white; text-align:left">Password Strength</td>
				<td>:</td>
				<td><div class="input-group">
				<div class="progress">
					<div class="progress-bar" 
						role="progressbar" 
						aria-valuenow="0"
						aria-valuemin="0" 
						aria-valuemax="100"
						style="width:0%">
					</div>
				</div>
			</div>
				<td></td>
			</tr>		
			<tr><td colspan="4"><hr/></td></tr>			
        	</table>
			<tr>
				<input name="submit" type="submit" value="Submit">
			</tr>
        </form>
    	</div>
    </div>
    
    <script> //progress bar
    
        var percentage = 0;

        function check(n, m) {
            if (n < 6) {
                percentage = 0;
                $(".progress-bar").css("background", "#dd4b39"); //color codes
            } else if (n < 8) {
                percentage = 20;
                $(".progress-bar").css("background", "#9c27b0");
            } else if (n < 10) {
                percentage = 40;
                $(".progress-bar").css("background", "#ff9800");
            } else {
                percentage = 60;
                $(".progress-bar").css("background", "#4caf50");
            }

            // Check for the character-set constraints
            // and update percentage variable as needed.
            // progress bar color changes as it gets bigger.
            
            //Lowercase Words only
            if (m.match(/[a-z]/)) 
            {
                percentage += 10;
            }
            
            //Uppercase Words only
            if (m.match(/[A-Z]/))
            {
                percentage += 10;
            }
            
            //Digits only
            if (m.match(/0|1|2|3|4|5|6|7|8|9/)) 
            {
                percentage += 10;
            }
            
            //RegExp \W Metacharacter in JavaScript is used to find the non word character i.e. characters which are not from a to z, A to Z, 0 to 9
            // \D Matches any non-decimal digits
            if ((m.match(/\W/) != null) && (m.match(/\D/) != null))
            {   
                percentage += 10;
            }

            // Update the width of the progress bar
            $(".progress-bar").css("width", percentage + "%");
        }

        // Update progress bar as per the input
        $(document).ready(function() {
            //Keyup Whenever the key is pressed and released, apply condition checks. 
            $("#password").keyup(function() {
                var m = $(this).val();
                var n = m.length;

                // Function for checking
                check(n, m);
            });
        });

    </script>

</body>
</html>