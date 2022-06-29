<?php
  require_once("database.php");
  require_once("default.html");

  $dc="NULL";
  if(isset($_POST['dc'])){
  	$dc=$_POST['dc'];
  }
  $conn = connectdatabase();
  $req="SELECT * from tasks where BegDate = $dc";
  $rs=mysqli_query($conn, $req) or die(mysqli_error()); 
?>


<!DOCTYPE html>
<html>
<head>
  	<meta charset="utf-8">
  	<title>Historique</title>
</head>
<body>
  	<form method="POST" action="History.php">
      <br><br>
  		Entrez la date : <input type="Date" name="dc" value="<?php echo($dc) ?>">
  		<input type="submit" value="Chercher">
  	</form>
        <br><br>
        <center>
          <table border="1" width="80%">
          	      <tr>
          	          <th> Description </th>
                      <th> Date debut </th>
                      <th> Heure debut </th>
                      <th> Date fin </th>
                      <th> Heure fin </th>
                      <th> Etat </th>
          	     </tr>
          	     <?php while($ET=mysqli_fetch_assoc($rs)) { ?>
          	     	    <tr>
                        <td><?php echo ($ET['task']); ?></td>
          	     	    	<!-- <td><?php echo ("111"); ?></td> -->
          	     	    	<td><?php echo ($ET['BegDate']); ?></td>
          	     	    	<td><?php echo ($ET['BegHour']); ?></td>
          	     	    	<td><?php echo ($ET['EndDate']);?></td>
          	     	    	<td><?php echo ($ET['EndHour']); ?></td>
                        <td><?php echo ($ET['done']) ?></td>
          	     	    </tr>
          	     <?php } ?>
          </table>
        </center>
        <br><br>
         <button class="annexe"><a href="todo.php?">BACK</a></button>
    </body>
</html>