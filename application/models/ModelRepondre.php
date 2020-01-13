<?php  

require_once ("Model.php");
abstract class ModelRepondre 
{

	protected $codeINE;
	protected $date;
	protected $idTOEIC; 
	protected $idPartie;
	protected $score;


	public function __construct($codeINE = NULL, $date = NULL, $idTOEIC = NULL, $idPartie = NULL, $score = NULL) {
        if (!is_null($codeINE) && !is_null($date) && !is_null($idTOEIC) && !is_null($idPartie) && !is_null($score)) {
            $this->codeINE = $codeINE;
            $this->date = $date;
            $this->idTOEIC = $idTOEIC;
            $this->idPartie = $idPartie;
            $this->score = $score;
        }
    }

    public function get_toeic($codeINE)
    {
        $requete = "SELECT DISTINCT idTOEIC FROM repondre WHERE codeINE = :codeINE_tag";
        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
        $rep = $req_prep->fetchAll();
        return $rep;
    }

    public function get_1toeic($codeINE, $idToeic)
    {
        $requete = "SELECT sum(score) FROM repondre WHERE codeINE = :codeINE_tag AND idToeic = :idToeic_tag";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE,
                "idToeic_tag" => $idToeic
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $rep = $req_prep->fetchAll();
        return $rep;
    }

	public function get_allreponses($codeINE){
		$requete = "SELECT codeINE, `date`, idToeic, SUM(score) FROM repondre WHERE codeINE = :codeINE_tag GROUP BY codeINE, `date`, idToeic";
         try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
        $rep = $req_prep->fetchAll();
        return $rep;
    }

    
    public function get_listening($codeINE)
    {
        $requete = "SELECT codeINE, `date`, idToeic, IdPartie, SUM(score) FROM repondre WHERE codeINE = :codeINE_tag AND IdPartie = '1' OR codeINE = :codeINE_tag AND IdPartie = '2' OR codeINE = :codeINE_tag AND IdPartie = '3' OR codeINE = :codeINE_tag AND IdPartie = '4' GROUP BY codeINE, `date`, idToeic";
        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
        $rep = $req_prep->fetchAll();
        return $rep;
    }

    public function get_reading($codeINE)
    {
        $requete = "SELECT codeINE, `date`, idToeic, IdPartie, SUM(score) FROM repondre WHERE codeINE = :codeINE_tag AND IdPartie = '5' OR codeINE = :codeINE_tag AND IdPartie = '6' OR codeINE = :codeINE_tag AND IdPartie = '7' GROUP BY codeINE, `date`, idToeic";
        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }
        $rep = $req_prep->fetchAll();
        return $rep;
    }

    public function sum_reading($codeINE, $idToeic) {
        $requete = "SELECT sum(score) FROM repondre WHERE codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '5' OR codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '6' OR codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '7' GROUP BY codeINE, `date`, idToeic";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE,
                "idToeic_tag" => $idToeic
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $rep = $req_prep->fetchAll();
        return $rep;
    }

    public function sum_listening($codeINE, $idToeic) {
        $requete = "SELECT sum(score) FROM repondre WHERE codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '1' OR codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '2' OR codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '3' OR codeINE = :codeINE_tag AND idToeic = :idToeic_tag AND IdPartie = '4' ";

        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE,
                "idToeic_tag" => $idToeic
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $rep = $req_prep->fetchAll();
        return $rep;
    }

    public function get_partie($codeINE, $idToeic) {
        $requete = "SELECT  idPartie, score FROM repondre WHERE codeINE = :codeINE_tag AND idToeic = :idToeic_tag ";
        try {
            $req_prep = Model::$pdo->prepare($requete);
            $values = array (
                "codeINE_tag" => $codeINE,
                "idToeic_tag" => $idToeic
            );
            $req_prep->execute($values);
        } catch (PDOException $e) {
            return 1;
        }

        $rep = $req_prep->fetchAll();
        return $rep;
    }


}
?>