<?php  
session_start();
// Connexion à la session
$bdd = mysqli_connect('localhost:3306', 'raphael-diop2', 'Legende456@', 'livreor');
mysqli_set_charset($bdd, 'utf8');

$message = '';
if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);

    $x = mysqli_query($bdd, "SELECT*FROM utilisateurs WHERE login = '$login'");
    $verification_login = $x -> fetch_array( MYSQLI_ASSOC);

    if($password === $password_retype){
        $password = password_hash($password, PASSWORD_BCRYPT);
        if($verification_login['login'] != $login){
            $request = mysqli_query($bdd, "INSERT INTO `utilisateurs`(`login`, `password`) VALUES ( '$login', '$password')");
            $message = 'Inscription réussie';
        }else {$message = 'Login déjà existant';}

    }else {$message = 'Mots de passes non-identiques';}
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Inscription</title>
</head>
<body class="bodyInscription">

<?php require 'fixe.php' ?>

    <main class="main">
        <form class="formContainer" action="" method="post">

            <h1>FORMULAIRE D'INSCRIPTION</h1>
            <?php echo '<br>' .$message. '</br>'?>
                <p><input type="text" name="login" class="zonetext" placeholder="Login..."></p>
                <p><input type="password" name="password" class="zonetext"  placeholder="Password ..."></p>
                <p><input type="password" name="password_retype" class="zonetext"  placeholder="Password Confirmation ..."></p>
                <p><input type="submit" class="boutonvalidation" name="submit"></p>

        </form>
    </main>

    <?php require 'footer.php' ?>

</body>
</html>