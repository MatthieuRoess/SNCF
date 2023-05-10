<?php

class Routeur{
    
    //Attributs
    private static $lesActions = array(
        'defaut' => 'ctrlAcceuil.php',
        'reclame' => 'ctrlObjetReclame.php',
        'nonReclame' => 'ctrlObjetNonReclame.php'
    );
    
        
    //Fonction qui retourne le fichier controleur à utiliser
    public static function getControleur($action){
   
        $controleur = self::$lesActions["defaut"];

        //Permet de vérifier que l'action existe et renvoie le nom du contrôleur PHP    
        if (array_key_exists ( $action , self::$lesActions )){
            $controleur = self::$lesActions[$action];
        }

        return $controleur;
    }
}