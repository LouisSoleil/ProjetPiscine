<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>
<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/accueilExamCss.css">
    <meta charset="UTF-8">
    <title>Supprimer un toeic</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content">

    <h3> Supprimer un toeic</h3>


    <form method="post" action="routeur.php?controller=toeic&&action=delete">
        <p>

            <?php

            if (empty($toeics)) {
                echo "Aucun toeic à afficher";
            }
            else {
                foreach ($toeics as $value) {
                    echo '<button class="bouton" type="submit" name="toeic" value="'.$value['IdTOEIC'].'">'.$value['LibelleTOEIC'].'</button><br><br>';
                }
            }

            ?>
        </p>
        <p>

        </p>
    </form>

    <input type='hidden' name='action' value='deleted'>

</div>

<?php include('../../assets/css/footer.php'); ?>

</body>
</html>