<?php
    include('default.html');
    include('database.php');
    if(loggedin()) {
        header("location:todo.php");
    }
?>

<!DOCTYPE html>
<html>
<head>
    <title> Connexion </title>
</head>
<body>

    <p style="white-space:pre">  Pas de compte ? <a href="newuser.php" style="color: red; text-decoration: none"> Creer un nouveau compte </a> </p> 
    
    <?php error(); ?>

    <center>
    <form action="valid.php" method="POST">
    <fieldset>
        <legend style="color: blue;"> Connexion </legend>
            <table>
                <tbody>
                    <tr>
                         <td> <pre>Nom </pre> </td>
                         <td> <input size="25" type="text" name="username" placeholder=" entrez votre nom"  autocomplete="off" required></td>
                    </tr>
                    <tr>
                         <td> <pre>Mot de passe </pre> </td>
                         <td> <input size="25" type="password" name="password" placeholder=" ********" required></td>
                    </tr>
                    <tr>
                        <td>
                            <?php                            
                                $capcode = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz';
                                $capcode = substr(str_shuffle($capcode), 0, 6);
                                $_SESSION['captcha'] = $capcode;
                                echo '<div class = "unselectable">'.$capcode.'</div>';
                            ?>
                        </td>
                        <td> <input size="25" type="text" name="captcha" placeholder=" Entrez le captcha code a gauche"  autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td> <input type="reset" value="Annuler"> </td>
                        <td> <input type="submit" value="Connexion"> </td>
                    </tr>
                </tbody>
            </table>
    </fieldset>
    </center>
    </form>
</body>

