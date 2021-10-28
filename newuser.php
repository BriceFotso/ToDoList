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
        <title> Nouveau Utilisateur </title>
    </head>
    <body>
        <p style="white-space:pre">  Déjà un compte ? <a href="login.php" title="Login" style="color: red;text-decoration: none"> Se Connecter </a> </p>
    
        <?php error(); ?>

        <form action="adduser.php" method="POST">
            <center>
            <fieldset>
                <legend style="color: blue;"> Nouveau Utilisateur </legend>
                <table>
                    <tr>
                        <td> <pre>Nom Utilisateur </pre> </td>
                        <td> <input type="text" name="username" placeholder=" Entrez votre nom" autocomplete="off"> </td>
                    </tr>
                    <tr>
                        <td> <pre>Mot de passe </pre> </td>
                        <td> <input type="password" required name="password1" placeholder=" *******"> </td>
                    </tr>
                    <tr>
                        <td> <pre>Confirmer mot de passe </pre></td>
                        <td> <input type="password" required name="password2" placeholder=" *******"> </td>
                    </tr>
                    <tr>
                        <td>
                            <?php                            
                                $capcode = "ABCDEFGHIJKLMNOPQRSTUVWXYZ1234567890abcdefghijklmnopqrstuvwxyz";
                                $capcode = substr(str_shuffle($capcode), 0, 6);
                                $_SESSION['captcha'] = $capcode;
                                echo '<div class = "unselectable">'.$capcode.'</div>';
                            ?>
                        </td>
                        <td> <input type="text" name="captcha" placeholder=" Entrez le code captcha a gauche"  autocomplete="off" required></td>
                    </tr>
                    <tr>
                        <td> <input type="reset" value="ANNULER"> </td>
                        <td> <input type="submit" value="VALIDER"> </td>
                    </tr>
                </table>
            </fieldset>

            </center>

        </form>
    </body>
</html>