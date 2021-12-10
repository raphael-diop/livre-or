<?php 
session_start();
// Connexion à la session
$bdd = mysqli_connect('localhost', 'root', '', 'livreor');
mysqli_set_charset($bdd, 'utf8');

$message = '';



if(isset($_POST['submit'])){
    $commentaire = htmlspecialchars($_POST['commentaire']);
    $id_utilisateur = $_SESSION['id'];
    var_dump($id_utilisateur);
    
    $request = mysqli_query($bdd, "INSERT INTO `commentaires`(`commentaire`, `id_utilisateur`, `date`) VALUES ('$commentaire', '$id_utilisateur', NOW())");
    var_dump($request); 

    if($request == true){
        $message = 'Commentaire posté';
    }else{
        $message = 'Commentaire trop long';
    }
    
}



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>commentaire</title>
</head>



<body class="bodyCommentaire">

<?php require 'fixe.php' ?>

<main class="main">
        <form class="formContainer" action="" method="post">

            <h1>LAISSER VOTRE COMMENTAIRE</h1>
            <?php echo '<br>' .$message. '</br>'?>
                <p><input type="text" name="commentaire" class="commentaire"  placeholder="Commentaires..." required = "required"></p>
                <p><input type="submit" class="boutonvalidation" name="submit"></p>

        </form>
    </main>

    <?php require 'footer.php' ?>

</body>
</html>