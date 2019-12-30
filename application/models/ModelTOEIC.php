<?php  

require_once ("Model.php");
abstract class ModelTOEIC 
{

	protected $idTOEIC;
	protected $libelleTOEIC;


	public function __construct($idTOEIC = NULL, $libelleTOEIC = NULL) {
        if (!is_null($idTOEIC) && !is_null($libelleTOEIC)) {
            $this->idTOEIC = $idTOEIC;
            $this->libelleTOEIC = $libelleTOEIC;
        }
    }


	public function get_toeic(){
        $requete = "SELECT DISTINCT idTOEIC, libelleTOEIC FROM toeic";
        $rep = Model::$pdo->query($requete);
        $values = array ('idTOEIC' => 'libelleTOEIC');
        $rep->execute($values);
        return $rep;
    }

}
?>