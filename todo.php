<?php 
    include('database.php');
    include('default.html');

    if(!loggedin()){
        header("location:login.php");
    }

	$username = $_SESSION['username'];
 	echo '<br> <a href="logout.php" align="right" title="Deconnexion" style="color: red; text-decoration: none">&nbsp; Deconnexion </a>';

 	echo '<a href="changepassword.php" align="right" title="changer mot de passe" style="color: blue; text-decoration: none">&nbsp; Changer le mot de passe </a>';

 	echo '<a href="deleteaccount.php" align="right" title="supprimer compte" style="color: blue; text-decoration: none">&nbsp; Supprimer le compte </a> <br>';

 	error();
	echo "<br> <center id='user'> Bienvenu ".ucwords($username)."</center> <br>";

	if(isset($_POST['addtask']))
	{
	    if(!empty($_POST['description'] || $_POST['begdate'] || $_POST['beghour'] || $_POST['enddate'] || $_POST['endhour']))
	    {
	        addTodoItem($_SESSION['username'], $_POST['description'], $_POST['begdate'], $_POST['beghour'], $_POST['enddate'],$_POST['endhour']);
	        header("Refresh:0");   
	    }
	}
?>


<!DOCTYPE html>
<html>
<head>
	<title> TO DO LIST </title>
</head>
<body>
	<center>
		<p><u><h1>Ajout d'une nouvelle tache</h1></u></p>
		<form action="todo.php" method="POST">
			<p><input type="text" size="50" placeholder=" Entrez la Description de la tache" name="description" autocomplete="off"/></p>
			<p>Date et Heure de debut :  <input type="Date" size="50" class="inp" placeholder=" Date de debut" name="begdate" autocomplete="off"/>
			   <input type="Time" size="50" class="inp" placeholder=" Heure de debut " name="beghour" autocomplete="off"/></p>	
			<p>Date et Heure de fin : <input type="Date" size="50" class="inp" placeholder=" Date de fin" name="enddate" autocomplete="off"/>
			  <input type="Time" size="50" class="inp" placeholder=" Heure de de fin " name="endhour" autocomplete="off"/></p>
			   <input type="submit" name="addtask" value="Ajouter"/><br><br><br>
		</form>
   </center>
</body>
</html>

<p><center><h1><u> Liste des taches </u></h1></center></P>

<?php
    getTodoItems($username);
 ?>


<br><br>

 <button class="annexe"><a href="History.php?">HISTORIQUE</a></button> 
