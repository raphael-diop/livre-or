<?php  
session_start();
// Connexion à la session
$bdd = mysqli_connect('localhost', 'root', '', 'livreor');
mysqli_set_charset($bdd, 'utf8');

$message = '';
if(isset($_POST['login']) && $_POST['password']){
    $login = $_POST['login'];
    $password = $_POST['password'];

    $request = mysqli_query($bdd, "SELECT*FROM utilisateurs WHERE login = '$login'");
    $result = $request->fetch_array(MYSQLI_ASSOC);
    $check_password = $result['password'];

    if($result['login'] === $login){
        if (password_verify($password, $check_password)){
            $message = 'Connexion réussie';
            $_SESSION = $result;
        }else{ $message = 'password incorrect';}
    }else{ $message = 'Login inexistant';}
    var_dump($result);
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Connexion</title>
</head>
<body class="bodyConnexion">

<?php require 'fixe.php' ?>

    <main class="main">
        <form class="formContainer" action="" method="post">

            <h1>CONNEXION</h1>
            <?php echo '<br>' .$message. '</br>'?>
                <p><input type="text" name="login" class="zonetext" placeholder="Login..." required="required"></p>
                <p><input type="password" name="password" class="zonetext"  placeholder="Password ..." required="required"></p>
                <p><input type="submit" class="boutonvalidation" name="submit" required="required"></p>

        </form>
    </main>

    <?php require 'footer.php' ?>
    
</body>
</html>