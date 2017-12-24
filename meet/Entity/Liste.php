<?php

declare(strict_types=1);

namespace Meeting\Liste;
final class Liste
{
   
    public function getList()
    {
        $array = [];
        $q = $this->_db->query('SELECT * FROM meeting ORDER BY titre');
        while ($donnees = $q->fetch(PDO::FETCH_ASSOC))
        {
            array_push($array, "<strong>".$donnees['titre']."</strong><p>".$donnees['description']."</p>");;
        }
        return $array;
    }

}
