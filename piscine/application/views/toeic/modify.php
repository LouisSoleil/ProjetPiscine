<?php if (!isset($_SESSION['email'])) require ('../error.php'); ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/modifyCss.css">
    <title>Modification de toeic</title>
</head>

<body>

<?php include('../../assets/css/header.php'); ?>

<div class="content">

    <h3>Modification du toeic <?php echo $toeicChoisi['LibelleTOEIC']; ?></h3>
    <br>

    <div class="centrage">
        <form method="post" action="routeur.php?controller=toeic&&action=modified">
            <p>

                <label for="nom">Libellé du TOEIC</label> :
                <input type="text" name="name" value="<?php echo $toeicChoisi['LibelleTOEIC']; ?>" required/>
                <br><br><br>

                <?php

                for ($i = 1; $i <= 200; $i++) {
                    echo "$i :  ";
                    echo '<label for="cocher">A</label>'.
                        '<input type="radio" name="'.$i.'" value="A" '.(($toeicChoisi['reponses'][$i] == "A") ? "checked" : "").'/>'.
                        '<label for="cocher">B</label>'.
                        '<input type="radio" name="'.$i.'" value="B" '.(($toeicChoisi['reponses'][$i] == "B") ? "checked" : "").' />'.
                        '<label for="cocher">C</label>'.
                        '<input type="radio" name="'.$i.'" value="C" '.(($toeicChoisi['reponses'][$i] == "C") ? "checked" : "").' />'.
                        '<label for="cocher">D</label>'.
                        '<input type="radio" name="'.$i.'" value="D" '.(($toeicChoisi['reponses'][$i] == "D") ? "checked" : "").' />'.
                        '<br><br>';
                }

                ?>


            </p>
            <p>
                <input type="submit" value="Valider" />
            </p>
            <input type='hidden' name='toeic' value="<?php echo $toeicChoisi['IdTOEIC']; ?>">
        </form>

    </div>

</div>

<?php include('../../assets/css/footer.php'); ?>


</body>
</html>
