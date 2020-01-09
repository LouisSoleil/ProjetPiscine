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

    public function get_1toeic()
    {
        $requete = "SELECT * FROM repondre ";
        $rep = Model::$pdo->query($requete);
        return $rep->fetchAll();
    }

	public function get_partie(){
		$requete = "SELECT DISTINCT idPartie, libellePartie FROM souspartie";
		$rep = Model::$pdo->query($requete);
		$values = array ('IdPartie' => 'LibellePartie');
        $rep->execute($values);
        return $rep;
	}

	public function get_allreponses(){
		$requete = "SELECT codeINE, `date`, idToeic, SUM(score) FROM repondre GROUP BY codeINE, `date`, idToeic";
        $rep = Model::$pdo->query($requete);
        return $rep;
    }

    
    public function get_listening()
    {
        $requete = "SELECT codeINE, `date`, idToeic, IdPartie, SUM(score) FROM repondre WHERE IdPartie = '1' OR IdPartie = '2' OR IdPartie = '3' GROUP BY codeINE, `date`, idToeic";
        $rep = Model::$pdo->query($requete);
        return $rep;
    }

    public function get_reading()
    {
        $requete = "SELECT codeINE, `date`, idToeic, IdPartie, SUM(score) FROM repondre WHERE IdPartie = '4' OR IdPartie = '5' OR IdPartie = '6' OR IdPartie = '7' GROUP BY codeINE, `date`, idToeic";
        $rep = Model::$pdo->query($requete);
        return $rep->fetchAll();
    }


}
?>