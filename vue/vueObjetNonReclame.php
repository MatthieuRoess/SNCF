
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
    <input type = "submit" name="Rechercher" value="Rechercher"/>
</form>

<form method = "POST">
    <input name="voirTout" type = "submit" value="Voir tout les objets"/>
</form>

<?php
            
    if(isset($_POST['Rechercher'])){
        echo "<table>
                <thead>
                    <tr>
                        <th>Nom</th>
                        <th>Date</th>
                        <th>Gare</th>
                    </tr>
                </thead>";
                foreach ($resultat as $ligne){
                        echo "<tr>";
                        foreach ($ligne as $valeur){
                            echo "<td>".$valeur."</td>";
                        }
                        echo "</tr>";
                }
                echo "</table>";
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
        foreach ($resultatTout as $ligne){
                echo "<tr>";
                foreach ($ligne as $valeur){
                    echo "<td>".$valeur."</td>";
                }
                echo "</tr>";
        }
        echo "</table>";
    }
?>
</div>