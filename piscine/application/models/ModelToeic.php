<?php

require_once ('Model.php');

class ModelToeic {

    private $libelleToeic;

    public function __construct($libelleToeic) {
        $this->libelleToeic = $libelleToeic;
    }

    public function save($reponses) {

        $requete = "INSERT INTO Toeic (libelleToeic) "
            . "VALUES (:libelle_toeic_tag)";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "libelle_toeic_tag" => $this->libelleToeic
            );

            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $idToeic = Model::$pdo->lastInsertId();
        var_dump($idToeic);

        $requete =  "INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 1, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 2, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 3, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 4, 'Oral');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 5, 'Ecrit');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 6, 'Ecrit');"
            ."INSERT INTO souspartie (idToeic, idPartie, `type`) VALUES ($idToeic, 7, 'Ecrit');";

        Model::$pdo->query($requete);

        for ($i = 1; $i <= 200; $i++) {
            if (1 <= $i && $i <= 6) {
                $idPartie = 1;
            }
            elseif (7 <= $i && $i <= 31) {
                $idPartie = 2;
            }
            elseif (32 <= $i && $i <= 70) {
                $idPartie = 3;
            }
            elseif (71 <= $i && $i <= 100) {
                $idPartie = 4;
            }
            elseif (101 <= $i && $i <= 130) {
                $idPartie = 5;
            }
            elseif (131 <= $i && $i <= 146) {
                $idPartie = 6;
            }
            elseif (147 <= $i && $i <= 200) {
                $idPartie = 7;
            }

            $requete = "INSERT INTO question (idQuestion, idToeic, idPartie, reponseJuste) VALUES (:id_question_tag, :id_toeic_tag, :id_partie_tag, :reponse_tag)";

            try {
                $req_prep = Model::$pdo->prepare($requete);

                $values = array (
                    "id_question_tag" => $i,
                    "id_toeic_tag" => $idToeic,
                    "id_partie_tag" => $idPartie,
                    "reponse_tag" => $reponses[$i]
                );

                $req_prep->execute($values);

            } catch (PDOException $e) {
                return 2;
            }
        }
    }

    public static function getToeics() {
        $requete = "SELECT * FROM toeic ORDER BY idToeic";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll();
    }

    public static function getToeicById($idToeic) {

        $requete = "SELECT * FROM toeic WHERE idToeic = :id_toeic_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "id_toeic_tag" => $idToeic
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        $toeic = $req_prep->fetchAll()[0];
        $reponses = self::recupererReponses($idToeic);
        $toeic['reponses'] = $reponses;

        return $toeic;
    }

    public static function getToeicsVisibles() {

        $requete = "SELECT * FROM toeic WHERE estVisible = 1 ORDER BY idToeic";
        $rep = Model::$pdo->query($requete);

        return $rep->fetchAll();
    }

    public static function updateVisibilite($idToeic, $value) {

        $requete = "UPDATE toeic SET estVisible = :value_tag WHERE idToeic = :id_toeic_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "id_toeic_tag" => $idToeic,
                "value_tag" => $value
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }
    }

    public static function updateReponses($idToeic, $libelle, $reponses) {

        $requete = "UPDATE toeic SET libelleToeic = :libelle_tag WHERE idToeic = :id_toeic_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "id_toeic_tag" => $idToeic,
                "libelle_tag" => $libelle
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        for ($i = 1; $i <= 200; $i++) {
            $newReponse = $reponses[$i];
            $requete = "UPDATE question SET reponseJuste = :new_reponse_tag WHERE idToeic = :id_toeic_tag AND idQuestion = :question_tag";

            try {
                $req_prep = Model::$pdo->prepare($requete);

                $values = array (
                    "id_toeic_tag" => $idToeic,
                    "new_reponse_tag" => $newReponse,
                    "question_tag" => $i
                );

                $req_prep->execute($values);

            } catch (PDOException $e) {
                return 2;
            }
        }
    }

    public static function deleteToeic($idToeic) {

        $requete = "DELETE FROM question WHERE idToeic = :id_toeic_tag;".
            "DELETE FROM sousPartie WHERE idToeic = :id_toeic_tag;".
            "DELETE FROM toeic WHERE idToeic = :id_toeic_tag;";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "id_toeic_tag" => $idToeic
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }
    }

    public static function recupererReponses($idToeic) {

        $requete = "SELECT reponseJuste FROM question WHERE idToeic = :id_toeic_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "id_toeic_tag" => $idToeic
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        $tab = $req_prep->fetchAll();

        $reponses = array();
        $i = 1;

        foreach ($tab as $value) {
            $reponses[$i] = $value['reponseJuste'];
            $i++;
        }

        return $reponses;
    }

    public static function note($reponses, $reponsesJustes) {

        $note = 0;
        $notePartie = 0;
        $tabNotes = array();
        $tabNotes['listening'] = 0;
        $tabNotes['reading'] = 0;

        $date = date("Y-m-d H:i:s");

        for ($i = 1; $i <= 200; $i++) {

            if ($reponses[$i] == $reponsesJustes[$i]) {
                $note++;
                $notePartie++;
            }

            switch ($i) {
                case 6:
                    $idPartie = 1;
                    $baremePartie = 6;
                    break;
                case 31:
                    $idPartie = 2;
                    $baremePartie = 25;
                    break;
                case 70:
                    $idPartie = 3;
                    $baremePartie = 39;
                    break;
                case 100:
                    $idPartie = 4;
                    $baremePartie = 30;
                    break;
                case 130:
                    $idPartie = 5;
                    $baremePartie = 30;
                    break;
                case 146:
                    $idPartie = 6;
                    $baremePartie = 16;
                    break;
                case 200:
                    $idPartie = 7;
                    $baremePartie = 54;
                    break;
                default:
                    $idPartie = 0;
            }

            if ($idPartie != 0) {
                $requete = "INSERT INTO repondre (codeINE, idToeic, idPartie, `date`, score) VALUES (:codeINE_tag, :id_toeic_tag, :id_partie_tag, :date_tag, :score_tag)";

                try {
                    $req_prep = Model::$pdo->prepare($requete);

                    $values = array (
                        "codeINE_tag" => $_SESSION['codeINE'],
                        "id_toeic_tag" => $_SESSION['idToeicChoisi'],
                        "id_partie_tag" => $idPartie,
                        "date_tag" => $date,
                        "score_tag" => $notePartie
                    );

                    $req_prep->execute($values);

                } catch (PDOException $e) {
                    return 1;
                }

                $tabNotes[$idPartie] = array("notePartie" => $notePartie, "baremePartie" => $baremePartie);

                if ($idPartie < 5) {
                    $tabNotes['listening'] += $notePartie;
                }
                else {
                    $tabNotes['reading'] += $notePartie;
                }
                $notePartie = 0;
            }
        }

        return $tabNotes;
    }

    public static function getScoreListening($note) {

        $requete = "SELECT * FROM score WHERE idQuestion = :note_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "note_tag" => $note
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        return $req_prep->fetchAll()[0]['valeur'];
    }

    public static function getScoreReading($note) {

        $requete = "SELECT * FROM score WHERE idQuestion = :note_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);

            $values = array (
                "note_tag" => (100 + $note)
            );

            $req_prep->execute($values);

        } catch (PDOException $e) {
            return 1;
        }

        return $req_prep->fetchAll()[0]['valeur'];
    }
}

//session_destroy();