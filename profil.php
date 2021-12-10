<?php
session_start();
// // SE CONNECTER A LA BASE DE DONNEE
$bdd = mysqli_connect('localhost', 'root', '', 'livreor');
// // ENCODER LA BASE DE DONNEE
 mysqli_set_charset($bdd , 'utf-8');
$message = "";
 if(isset($_POST['login']) && isset($_POST['password']) && isset($_POST['password_retype'])){
    $id = $_SESSION['id'];
    $login = htmlspecialchars($_POST['login']);
    $password = htmlspecialchars($_POST['password']);
    $password_retype = htmlspecialchars($_POST['password_retype']);


    if($password === $password_retype){
        $password = password_hash($password, PASSWORD_BCRYPT);
        $requete = mysqli_query($bdd, "UPDATE `utilisateurs` SET login = '$login', password = '$password' WHERE id = '$id'");
    }else{ $message = 'Password non identiques';}
    if($requete == 1){
        $message = 'Modifications sauvgardés';
    }

    $request = mysqli_query($bdd, "SELECT*FROM utilisateurs WHERE login = '$login'");
    $result = $request-> fetch_array( MYSQLI_ASSOC);
    
    $_SESSION = $result;
 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Modificatoion Profil</title>
</head>
<body class="bodyProfil">

<?php require 'fixe.php' ?>

<main class="main2">
    <form class="formContainer" action="" method="post">
        <h1>Modification de Profil</h1>
        <?php echo "<strong>" .$message. "</strong>" ?>
        <p><input type="text" name="login" class="zonetext" required= "required" value="<?php if(isset($login)){echo $login; }else{ echo $_SESSION['login'];}?>"></p>
        <p><input type="password" name="password" class="zonetext" required= "required" placeholder="Password"></p>
        <p><input type="password" name="password_retype" class="zonetext" required= "required" placeholder="Password Confirmation ..."></p>
        <p><button type="submit" name="modification">Enregistrer</button></p>
    </form>
</main>

<?php require 'footer.php' ?>
    
</body>
</html>