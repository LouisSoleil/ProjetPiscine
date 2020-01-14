<!DOCTYPE html>
<html>
<head>
    <meta  charset="UTF-8">
    <title>Vos statistiques</title>
    <link rel="stylesheet" type="text/css" href="../../assets/stats.css"></link>
    <link rel="stylesheet" type="text/css" href="../../assets/css/homepage.css">
    <link rel="stylesheet" type="text/css" href="../../assets/css/statsCSS.css">
    <script type="text/javascript" src="https://code.jquery.com/jquery-3.3.1.js"></script>
    <script type="text/javascript" src="../assets/recup.js"></script>
    <script src="../assets/stats.js" type="text/javascript"></script>
</head>

<body>
<?php include('../../assets/css/header.php'); ?>
<div class="content">
    <div id="content">
        <h1>Les Statistiques</h1>
        </br>
        <form name='monform' method='post' action='routeur.php?controller=stats&&action=getStats'>
            <label>Sélectionner une classe : </label>

            <select id="classe" name="classe">
                <option value="0">Choisir une classe</option>
                <?php
                foreach($classes as $classe){

                    ?>

                    <option value="<?php echo intval($classe['idClasse']); ?>"><?php echo $classe['libClasse']." - année : ".$classe['annee']; ?></option>
                    <?php
                }
                ?>
            </select>
            </br>

            <label>Sélectionner un groupe : </label>
            <select id="groupe" name="groupe">
                <option value="0">Choisir un groupe</option>
                <option value="1">Groupe 1</option>
                <option value="2">Groupe 2</option>
            </select>
            </br>

            <label>Sélectionner un élève : </label>
            <select id="eleve" name="eleve">
                <option value="0">Choisir un élève</option>
            </select>
            </br>

            <label>Sélectionner un TOEIC : </label>
            <select id="toeic" name="toeic" required>
                <option value="0">Choisir un TOEIC</option>
            </select>
            </br>

            <label>Sélectionner une partie : </label>
            <select id="partie" name="partie" required>
                <option value="0">Choisir une partie</option>
                <option value="1">Listening</option>
                <option value="2">Reading</option>
                <!--<option value="3">Partie 3</option>
                <option value="4">Partie 4</option>
                <option value="5">Partie 5</option>
                <option value="6">Partie 6</option>
                <option value="7">Partie 7</option>-->
            </select>
            </br>
            <input type="submit" value="Valider">
        </form>
    </div>
</div>
<?php include('../../assets/css/footer.php'); ?>
</body>
</html>