<?php
namespace Application;
use PDO;
class ServicesManager
{
  private $_bdd; // Instance de PDO

  public function __construct($bdd)
  {
    $this->setDb($bdd);
  }
  public function setDb($bdd)
  {
    $this->_bdd = $bdd;
  }

  public function getList()
  {
    $array = array();
    $q = $this->_bdd->query("SELECT * FROM meeting ORDER BY titre");
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      $debut = date_create($donnees['debut']);
      $debut = date_format($debut, 'd-m-Y H:i');
      $fin = date_create($donnees['fin']);
      $fin = date_format($fin, 'd-m-Y H:i');
      array_push($array, "<strong>N° ".$donnees['id']." ".$donnees['titre']." ( ".$debut." - ".$fin." )  </strong><p>".$donnees['description']."<br/></p>");
    }
    return $array;
  }

  public function getUsers()
  {
    $array = array();
    $q = $this->_bdd->query('SELECT * FROM users ORDER BY nom');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      array_push($array, "<strong>".$donnees['nom']."  ".$donnees['prenom']."  </strong>");
    }
    return $array;
  }

  public function getParticipation()
  {
    $array = array();
    $q = $this->_bdd->query('SELECT DISTINCT * FROM users, meet, meeting WHERE users.id=meet.id_participant AND meeting.id=meet.id_meet ORDER BY nom');
    while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
    {
      array_push($array, "<strong><u>".$donnees['nom']."</u> participe au meeting : <u>".$donnees['titre']."</u> </strong>");
    }
    return $array;
  }
}