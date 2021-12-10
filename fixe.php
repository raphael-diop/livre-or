<?php 
    $message1 = '';
    $message2 = '';
    $message3 = '';
    $message5 = '';
    $message6 = '';
    $message7 = '';
    $message8 = '';
    
    if(isset($_SESSION['login'])){
            $message5 = 'Acceuil';
            $message3 = 'Deconnexion';
            $message6 = 'Profil';
            $message7 = 'Commentaire';
            $message8 = "livre D'or";
    }
    else{
    $message5 = 'Acceuil';
    $message1 = 'Inscription';
    $message2 = 'Connexion';
    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>header</title>
</head>
<body>
    <header>
            <nav>
                <div class="logo">
                    <img width="100px" height="100px" src="https://ih1.redbubble.net/image.1219301223.8123/st,small,507x507-pad,600x600,f8f8f8.jpg" alt="logo">
                    <h1>Zemmour_Off</h1>
                </div>
                <ul>
                    <li>
                        <a href="index.php"><?php  echo '<p>'. '<strong>'.$message5.'</strong>' . '</p>'?></a>
                        <a href="inscription.php"><?php  echo '<p>'. '<strong>'.$message1.'</strong>' . '</p>'?></a>
                        <a href="connexion.php"><?php  echo '<p>'. '<strong>'.$message2.'</strong>' . '</p>'?></a>
                        <a href="profil.php"><?php  echo '<p>'. '<strong>'.$message6.'</strong>' . '</p>'?></a>
                        <a href="commentaire.php"><?php  echo '<p>'. '<strong>'.$message7.'</strong>' . '</p>'?></a>
                        <a href="livre-or.php"><?php  echo '<p>'. '<strong>'.$message8.'</strong>' . '</p>'?></a>
                        <a href="deconnexion.php"><?php  echo '<p>'. '<strong>'.$message3.'</strong>' . '</p>'?></a>
                    </li>
                </ul>
            </nav>
    </header>
    
</body>
</html>
