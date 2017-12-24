<?php
require '../config.php';
namespace User;

declare(strict_types=1);

class PdoUser 
{

	public function supprimerMeeting($idmeeting){
		if(organiseDeja($idMeeting)){
			try{
				$reqOrganise = $bdd-> prepare('DELETE from meeting where organisateur = :idUser AND idmeeting = :idmeeting');
				$reqOrganise -> bindValue(':idUser', $this->$idUser);
				$reqOrganise -> bindValue(':idmeeting', $idmeeting);
				$reqOrganise -> execute();
			}catch(PDOException $e){
    			echo $e->getMessage();
 			}
		}else{
			echo 'Vous n\'êtes pas l\'organisateur de ce meeting';
		}
	}
	public function ajouterOrganisateur($id,$iduser){
		if(!organiseDeja($idUser)){
			
		}
	}
	public function getListeMeeting(){
		try{
			$l = $bdd-> prepare('SELECT * FROM meeting ');
			$l -> execute();
			$m = $l->fetch(PDO::FETCH_ASSOC);
			return $m;
		}catch(PDOException $e){
    			echo $e->getMessage();
 		}
	}
}


	