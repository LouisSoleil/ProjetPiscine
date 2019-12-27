<?php  

require_once ("Model.php");
abstract class ModelStats 
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

    public function getScore() {
    	return $this-> score;
    }

	public function get_toeic() {
		$requete = "SELECT * FROM Toeic";
		$req_prep = Model::$pdo->prepare($requete);
        $values = array(
            "idTOEIC_tag" => $idTOEIC
        );
        $req_prep->execute($values);
        return $req_prep->fetchColumn();
	}


	public function get_allreponses(){
		$requete = "SELECT idTOEIC, score FROM repondre";
        $rep = Model::$pdo->query($requete);
        $i = 0;
        while ($data = $rep->fetch()) {
            $res[$i] = $data['score']/*." - ".$data['libelleGroupe']*/;
            $i++;
        }
        return $res;
	}


}
?>