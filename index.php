<!DOCTYPE html >
<html>
<head>
<title>ToDo List Login</title>
<link rel="stylesheet" type="text/css" href="CSS/style.css">
</head>
<body id="body_bg">
<div <div align="center">

<h3>ToDo List Login</h3>
    <form id="login-form" method="post" action="authen_login.php" >
        <table border="0.5" >
            <tr>
                <td><label for="user_id">User Name</label></td>
                <td><input type="text" name="user_id" id="user_id"></td>
            </tr>
            <tr>
                <td><label for="user_pass">Password</label></td>
                <td><input type="password" name="user_pass" id="user_pass"></input></td>
            </tr>

            <tr>
                <td><button type="button"><a href="create_account.php">New Account</a></button></td>
                <td><input type="submit" value="Submit" />

            </tr>
        </table>
    </form>
		</div>
</body>
</html>
