<?php
session_start();

$bdd = mysqli_connect('localhost:3306', 'raphael-diop2', 'Legende456@', 'livreor');
mysqli_set_charset($bdd, 'utf8');

// requete recupération commentaire + dates
$request = mysqli_query($bdd,"SELECT commentaire, date, login FROM commentaires INNER JOIN utilisateurs ON utilisateurs.id = commentaires.id_utilisateur ORDER BY Date LIMIT 20");




?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Livre d'or</title>
</head>
<body class='bodyLivre'>
    <header>

          <?php require 'fixe.php' ?>
    
    </header>

    <main class="mainLivre">
    <?php while($r = $request-> fetch_array( MYSQLI_ASSOC)){ ?>
        <table>
            <th>
                <tr>Posté par :<?php echo "<b>" .$r['login']. "</b>";?> : <tr> 
            </th>
            <td>
                <tr><?php echo $r['commentaire'] ?> , </tr>
                <tr>le :<?php echo $r['date'] ?> , </tr>
               
            </td>
        </table>
        <?php   } ?>
    </main>
    
    <?php require 'footer.php' ?>
</body>
</html>