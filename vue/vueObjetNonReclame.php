
<div class="container" >
<h1>Liste des objets non réclamés</h1>
<form method = "POST">
        <div class="input">
            <input
            required
            type="text"
            name="name"
            placeholder=" Nom objet"/>
        </div>
    <input type = "submit" value="Rechercher"/>
</form>

<form method = "POST">
    <input name="voirTout" type = "submit" value="Voir tout les objets"/>
</form>
<?php
    if(isset($_POST['name'])){
        echo "<table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Gare</th>
                    </tr>
                </thead>";
        foreach($lesObjets->{'records'} as $unObjet){
            //on vérifie si le mot recherche est dans un mot retourné par l'api et s'il n'a pas encore été retrouvé
            //on met le mot en minuscule puis la  1er lettre du mot chercher en maj 
            if(strpos($unObjet->{'fields'}->{'gc_obo_nature_c'},ucfirst(strtolower($_POST['name']))) !== false && !isset($unObjet->{'fields'}->{'gc_obo_date_heure_restitution_c'})){
                $detail = $unObjet->{'fields'};
                echo "<tbody>
                        <tr>   
                            <td>".$detail->{'gc_obo_nature_c'}."</td>";  
                echo        "<td>".substr($detail->{'date'},0,10)."</td>";
                echo        "<td>".$detail->{'gc_obo_gare_origine_r_name'}."</td></tr>
                    </tbody>";    
            }
        }
    }

    if(isset($_POST['voirTout'])){
        echo "<table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Gare</th>
                    </tr>
                </thead>";
        foreach($lesObjets->{'records'} as $unObjet){
            if(!isset($unObjet->{'fields'}->{'gc_obo_date_heure_restitution_c'})){
                $detail = $unObjet->{'fields'};
                echo "<tbody>
                        <tr>   
                            <td>".$detail->{'gc_obo_nature_c'}."</td>";  
                echo        "<td>".substr($detail->{'date'},0,10)."</td>";
                echo        "<td>".$detail->{'gc_obo_gare_origine_r_name'}."</td></tr>
                    </tbody>";    
            }
        }
    }
?>
</div>