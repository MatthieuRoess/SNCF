<?php 
    include "$racine/vue/vueEntete.php";
    include "$racine/modele/modeleFonction.php";
    $lesObjets = ModeleFonction::getJson("https://data.sncf.com/api/records/1.0/search/?dataset=objets-trouves-restitution&q=&sort=date&facet=date&facet=gc_obo_date_heure_restitution_c&facet=gc_obo_gare_origine_r_name&facet=gc_obo_nature_c&facet=gc_obo_type_c&facet=gc_obo_nom_recordtype_sc_c&refine.gc_obo_gare_origine_r_name=Strasbourg");

    include "$racine/vue/vueObjetReclame.php";
?>