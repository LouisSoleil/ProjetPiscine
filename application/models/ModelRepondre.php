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

    public function get_toeic()
    {
        $requete = "SELECT DISTINCT idTOEIC FROM repondre";
        $rep = Model::$pdo->query($requete);
        $values = array ('idTOEIC');
        $rep->execute($values);
        return $rep;
    }

	public function get_partie(){
		$requete = "SELECT DISTINCT idPartie, libellePartie FROM souspartie";
		$rep = Model::$pdo->query($requete);
		$values = array ('IdPartie' => 'LibellePartie');
        $rep->execute($values);
        return $rep;
	}

	public function get_allreponses(){
		$requete = "SELECT date, score FROM repondre";
        $rep = Model::$pdo->query($requete);
        $value = array ('date' => 'score');
        $rep->execute($value);
        return $rep;
    }

    
    public function get_listening()
    {
        $requete = "SELECT DISTINCT date, score FROM repondre where idPartie = 0";
        $rep = Model::$pdo->query($requete);
        $values = array ('date' => 'score');
        $rep->execute($values);
        return $rep;
    }

    public function get_reading()
    {
        $requete = "SELECT DISTINCT date, score FROM repondre where idPartie = 1";
        $rep = Model::$pdo->query($requete);
        $values = array ('date' => 'score');
        $rep->execute($values);
        return $rep;
    }


}
?>