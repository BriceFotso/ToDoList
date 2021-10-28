<?php 
    include('default.html');
    include('database.php');

    if(!loggedin()) {
    	header("location:login.php");
    }

    echo '<br> <a href="todo.php" align="right" style="color: red; text-decoration: none">&nbsp; My Todos </a>';

	$username = $_SESSION['username'];
	echo "<br> <center id='user'> Welcome ".ucwords($username)."</center> <br>";

    error();
	if(isset($_POST['change']))
	{
		$old = $_POST['oldpass'];
		$new = $_POST['newpass'];

		$conn = connectdatabase();
	    $sql = "SELECT password FROM users WHERE username = '".$username."'"; 
	    $result = mysqli_query($conn,$sql);

    	$row = mysqli_fetch_assoc($result);
	    $actual = $row['password'];
	   
	   	if(strcmp($old,$actual)==0) {
	   		updatepassword($username, $new);
	   	}
	   	else {
	   		$_SESSION['error'] = "&nbsp; Ancien mot de passe invalide !!";
	        header("Refresh:0");
	   	}
	    mysqli_close($conn);
	}
?>

<!DOCTYPE html>
<html>
<head>
	<title> Changer le mot de passe </title>
</head>
<body>
	<center>
	<fieldset>
	<legend style="color: blue;"> Changer le mot de passe </legend>
	    <form method="POST">
	        <table>
	            <tbody>
	                <tr>
	                     <td> <pre>Ancien mot de passe </pre> </td>
	                     <td> <input size="25" type="password" name="oldpass" placeholder=" ******"  autocomplete="off" required></td>
	                </tr>
	                <tr>
	                     <td> <pre>Nouveau mot de passe </pre> </td>
	                     <td> <input size="25" type="password" name="newpass" placeholder=" ******" required></td>
	                </tr>
	                <tr>
	                    <td> <input type="reset" value="Reset"> </td>
	                    <td> <input type="submit" name="change" value="Changer"> </td>
	                </tr>
	            </tbody>
	        </table>
	    </form>
	</fieldset>
	</center>
</body>
</html>
