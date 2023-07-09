<?php 
    include "$racine/vue/vueEntete.php";
    include "$racine/modele/modeleFonction.php";

    $lesObjets = ModeleFonction::getJson("https://data.sncf.com/api/records/1.0/search/?dataset=objets-trouves-restitution&q=&sort=date&facet=date&facet=gc_obo_date_heure_restitution_c&facet=gc_obo_gare_origine_r_name&facet=gc_obo_nature_c&facet=gc_obo_type_c&facet=gc_obo_nom_recordtype_sc_c&refine.gc_obo_gare_origine_r_name=Strasbourg");

    $resultat = array();

    if(isset($_POST['Rechercher'])){
        foreach($lesObjets->{'records'} as $unObjet){
            // On vérifie si le mot recherché est dans un mot retourné par l'API et s'il n'a pas encore été retrouvé
            // On met le mot en minuscule puis la première lettre du mot recherché en majuscule
            if(strpos($unObjet->{'fields'}->{'gc_obo_nature_c'}, ucfirst(strtolower($_POST['name']))) !== false || strpos($unObjet->{'fields'}->{'gc_obo_nature_c'}, strtolower($_POST['name'])) !== false){
                if(!isset($unObjet->{'fields'}->{'gc_obo_date_heure_restitution_c'})){
                    // création d'un tbleau pour le mettre dans résulatat
                    $nouvelleListe = array($unObjet->{'fields'}->{'gc_obo_nature_c'},substr($unObjet->{'fields'}->{'date'}, 0, 10),$unObjet->{'fields'}->{'gc_obo_gare_origine_r_name'});
                    
                    array_push($resultat, $nouvelleListe);
                }
            }
        }
        
    }

    $resultatTout = array();

    if(isset($_POST['voirTout'])){
        foreach($lesObjets->{'records'} as $unObjet){
            if(!isset($unObjet->{'fields'}->{'gc_obo_date_heure_restitution_c'})){
                $detail = $unObjet->{'fields'};
                $nouvelleListe = array($detail->{'gc_obo_nature_c'},substr($detail->{'date'},0,10),$detail->{'gc_obo_gare_origine_r_name'}); 
                array_push($resultatTout, $nouvelleListe);  
            }
        }
    }

    include "$racine/vue/vueObjetNonReclame.php";
?>