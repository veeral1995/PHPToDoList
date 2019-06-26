<!DOCTYPE html >
<html>
<head>
<title>Create New Account</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body id="body_bg">
<div <div align="center">

<h3>Create New Account</h3>
    <form id="login-form" method="post" action="register_user.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name:</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password:</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>
            <tr>
                <td><label for="user_pass_verify">Confirm Password:</label></td>
                <td><input type="password" name="user_pass_verify" id="user_pass_verify"></input></td>
            </tr>

            <tr>
                <td><button type="button"><a href="index.php">Back To Login</a></button></td>
                <td><input type="submit" value="Submit" />

            </tr>
        </table>
    </form>
		</div>
</body>
</html>
