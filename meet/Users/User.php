<?php


declare(strict_types=1);

class utilisateur 
{

	public function __construct(){

	}


	/*
		Ajoute dans la bdd le participant avec l'idUser actuel.
		Le premier if sert à vérifier que l'utilisateur ne participe pas déjà au meeting
	 */
	public function inscrire($idmeeting){
		//si tu veux mettre un message en fonction de si l'utilisateur est organisateur ou inscrit séparer le if en deux
		if(!dejaInscrit($idmeeting) && !organiseDeja($idmeeting)){
			try{
				$reqInsertParticipant = $bdd->prepare('INSERT into participant VALUES( :idUser, :idMeeting');
				$reqInsertParticipant -> bindValue(':idUser', $this->$idUser);
		   	 	$reqInsertParticipant -> bindValue(':idMeeting', $idmeeting);
		   	 	$reqInsertParticipant -> execute();
	   	 		//a afficher dans un alert ou popup
	   	 		return 'Vous êtes à présent inscrit au meeting';
	   	 	}catch(PDOException $e){
	   	 		//j'ai mis ça par défaut, normalement mettre un msg d'érreur pour expliquer que les parametres ne peuvent pas passer
    			echo $e->getMessage();
 			}
		}
		else{
			//A afficher dans un alert, ou popup
			return 'Vous êtes déjà inscrit ou organisez déjà ce meeting';
		}

	}

	/*
		Permet de voir la liste des meeting
	*/

	/*
		permet de voir si l'utilisateur est déjà inscrit au meeting $idMeeting
	 */
	public function dejaInscrit($idmeeting){
		try{
			$reqInscrit = $bdd-> prepare('SELECT * from participant where idUser = :idUser AND idmeeting = :idmeeting');
			$reqInscrit -> bindValue(':idUser', $this->$idUser);
			$reqInscrit -> bindValue(':idmeeting', $idmeeting);
			$reqInscrit -> execute();
			$dejaInscrit = $reqInscrit->fetch(PDO::FETCH_ASSOC);
			return $dejaInscrit;
		}catch(PDOException $e){
	   	 		//j'ai mis ça par défaut, normalement mettre un msg d'érreur pour expliquer que les parametres ne peuvent pas passer
    			echo $e->getMessage();
 		}
	}


	/*
		permet de voir si l'utilisateur organise le meeting $idMeeting
	 */
	public function organiseDeja($idmeeting){
		try{
			$reqOrganise = $bdd-> prepare('SELECT * from meeting where organisateur = :idUser AND idmeeting = :idmeeting');
			$reqOrganise -> bindValue(':idUser', $this->$idUser);
			$reqOrganise -> bindValue(':idmeeting', $idmeeting);
			$reqOrganise -> execute();
			$organsieDeja = $reqOrganise->fetch(PDO::FETCH_ASSOC);
			return $organiseDeja;
		}catch(PDOException $e){
	   	 	//j'ai mis ça par défaut, normalement mettre un msg d'érreur pour expliquer que les parametres ne peuvent pas passer
    		echo $e->getMessage();
 		}
	}

	/*
		permet d'organiser un meeting, la variable ici c'est le $_post du formulaire qui va contenir toute les variables du meeting
		tu les places en parametres du constructeur je sais plus comment on fait donc je les ai ecrit à la va vite (j'ai juste mis le nom et la date pour l'exemple)
	*/
	public function organiser(){
		$nomMeeting = $_POST['nomMeeting'];
		$dateDebut $_POST['date_debut'];
		$meeting = new Meeting($nomMeeting, $dateDebut, $this->$idUser);
	}

	public function getListeMeeting(){
		return $listMeeting = Meeting::listeMeeting();
		/* Poste que tu doives echo les différentes valeurs de listMeeting je te laisse ça comme ça, je sais plus comment ça s'écrit et ou tu peux le mettre mais en gros t'echo les valeurs dans des select en fonction du nom de la clé
		foreach($listMeeting as $key => $values){
			if($key == 'nomMeeting')
				echo $listMeeting[$key];
		} 
		*/
	}

	public function getListeMeetingAvenir(){
		return $listMeeting = Meeting::listeMeetingAvenir();
	}

	public function supprimerMeeting($idmeeting){
		if(organiseDeja($idMeeting)){
			try{
				$reqOrganise = $bdd-> prepare('DELETE from meeting where organisateur = :idUser AND idmeeting = :idmeeting');
				$reqOrganise -> bindValue(':idUser', $this->$idUser);
				$reqOrganise -> bindValue(':idmeeting', $idmeeting);
				$reqOrganise -> execute();
			}catch(PDOException $e){
	   	 		//j'ai mis ça par défaut, normalement mettre un msg d'érreur pour expliquer que les parametres ne peuvent pas passer
    			echo $e->getMessage();
 			}
		}else{
			//a afficher dans un alert
			echo 'Vous n\'êtes pas l\'organisateur de ce meeting';
		}
	}

	//la je sais pas commentt t'obtiens le $user par contre puisque y a pas de méthode get user, j'ai supposer que t'avais directement l'id du user
	public function ajouterOrganisateur($id,$iduser){
		if(!organiseDeja($idUser)){
			
		}
	}

}