<!DOCTYPE html>
<html>
    <head>
        <title>Page Client</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="page_client.css"/>
    </head>
    <body>
            <table class='titre'>
                <tr>
                <th>Interface Utilisateur Paris</th>
                </tr>
            </table>
            <?php
                //connection à la BDD
                $user = "client";
                $pass = "pwd-2023";
                $dnspdo = "mysql:host=10.0.0.5;dbname=cote_match";
                 
                $mysqli = new PDO($dnspdo,$user,$pass);

            ?>
            <form action="client_def_cote.php" method="POST">                                
                    <table class="table_gauche">
                        <!-- Titre des colonnes --> 
                        <div class="titre_du_tableau">
                            <tr>
                                <th>Equipe 1</th>
                                <th>-</th>
                                <th>Equipe 2</th>
                                <th></th>
                                <th>Cote Victoire <br> Equipe 1</th>
                                <th>Cote Match <br> Nul</th>
                                <th>Cote Victoire <br> Equipe 2</th>
                            </tr>
                        </div>
                        <div class="Match1">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 1;    //numéro de matchs
                                            // requête de type SELECT pour récupérer le logo, le club par rapport à l'équipe1 choisie par admin
                                            $affichage_club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php
                                            // requête de type SELECT pour récupérer le logo, le club par rapport à l'équipe2 choisie par admin                                                                    
                                            $affichage_club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club                       
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match1">
                                    <td class ="match1_choix1">
                                        <input type="radio" name="choix1" id="Vic_Equipe1_Match1" value="1cot_v1_club1">
                                        <label for="Vic_Equipe1_Match1">                                   
                                            <?php
                                                // requête de type SELECT pour récupérer la cote_victoire_equipe_1 par rapport à l'id du matchs
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())//récupération de la données
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];// affichage du cote
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match1_choix2">
                                        <input type="radio" name="choix1" id="Nul_Match1" value="1cot_n1_1" >                                        
                                        <label for="Nul_Match1">
                                            <?php
                                                // requête de type SELECT pour récupérer la cote_nul par rapport à l'id du matchs                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())//récupération de la données
                                                {
                                                    echo " ".$donnees["cote_nul"];// affichage du cote
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match1_choix3">
                                        <input type="radio" name="choix1" id="Vic_Equipe2_Match1" value="1cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match1">
                                            <?php
                                                // requête de type SELECT pour récupérer la cote_victoire_equipe_2 par rapport à l'id du matchs                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())//récupération de la données
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];// affichage du cote
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix1']) == false)// Si une choix est fait
                                        {
                                            $choix_utilisateur = $_POST['choix1'];// On récupère le POST
                                            // requête de type UPDATE pour entrer le choix de l'utilisateur dans matchs.choix_utilisateur
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            // Pour afficher la couleur en fond
                                            // requête de type SELECT pour récupérer le choix_utilisateur par rapport à l'id du matchs
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $recup_choix_cote->fetch())//récupération de la données
                                                {
                                                    if($donnees['choix_utilisateur'] =='1cot_v1_club1')
                                                    {
                                                        $couleur_fond=1;// Variable = 1;
                                                    }
                                                    elseif($donnees['choix_utilisateur'] =='1cot_n1_1')
                                                    {
                                                        $couleur_fond=2;// Variable = 2;
                                                    }
                                                    elseif($donnees['choix_utilisateur'] =='1cot_v1_club2')
                                                    {
                                                        $couleur_fond=3;// Variable = 3;
                                                    }
                                                }
                                            // Affichage de la couleur de fond par rapport au choix de l'utilisateur.
                                            echo"<style> .match1_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            //requête Update pour modifier la table matchs.choix_utilisateur à NULL par rapport à l'id du matchs
                                            $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                        
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match2">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 2;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                    <?php                                                                    
                                        $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $affichage_club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match2">
                                    <td class ="match2_choix1">
                                        <input type="radio" name="choix2" id="Vic_Equipe1_Match2" value="2cot_v1_club1" >
                                        <label for="Vic_Equipe1_Match2">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match2_choix2">
                                        <input type="radio" name="choix2" id="Nul_Match2" value="2cot_n1_1" >                                        
                                        <label for="Nul_Match2">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match2_choix3">
                                        <input type="radio" name="choix2" id="Vic_Equipe2_Match2" value="2cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match2">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix2']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix2'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='2cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='2cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='2cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match2_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }                             
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match3">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 3;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match3">
                                    <td class ="match3_choix1">
                                        <input type="radio" name="choix3" id="Vic_Equipe1_Match3" value="3cot_v1_club1">
                                        <label for="Vic_Equipe1_Match3">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match3_choix2">
                                        <input type="radio" name="choix3" id="Nul_Match3" value="3cot_n1_1" >                                        
                                        <label for="Nul_Match3">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match3_choix3">
                                        <input type="radio" name="choix3" id="Vic_Equipe2_Match3" value="3cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match3">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix3']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix3'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='3cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='3cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='3cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match3_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match4">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 4;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match4">
                                    <td class ="match4_choix1">
                                        <input type="radio" name="choix4" id="Vic_Equipe1_Match4" value="4cot_v1_club1">
                                        <label for="Vic_Equipe1_Match4">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match4_choix2">
                                        <input type="radio" name="choix4" id="Nul_Match4" value="4cot_n1_1" >                                        
                                        <label for="Nul_Match4">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match4_choix3">
                                        <input type="radio" name="choix4" id="Vic_Equipe2_Match4" value="4cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match4">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix4']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix4'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='4cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='4cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='4cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match4_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match5">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 5;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match5">
                                    <td class ="match5_choix1">
                                        <input type="radio" name="choix5" id="Vic_Equipe1_Match5" value="5cot_v1_club1">
                                        <label for="Vic_Equipe1_Match5">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match5_choix2">
                                        <input type="radio" name="choix5" id="Nul_Match5" value="5cot_n1_1" >                                        
                                        <label for="Nul_Match5">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match5_choix3">
                                        <input type="radio" name="choix5" id="Vic_Equipe2_Match5" value="5cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match5">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix5']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix5'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='5cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='5cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='5cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match5_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match6">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 6;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match6">
                                    <td class ="match6_choix1">
                                        <input type="radio" name="choix6" id="Vic_Equipe1_Match6" value="6cot_v1_club1">
                                        <label for="Vic_Equipe1_Match6">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match6_choix2">
                                        <input type="radio" name="choix6" id="Nul_Match6" value="6cot_n1_1" >                                        
                                        <label for="Nul_Match6">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match6_choix3">
                                        <input type="radio" name="choix6" id="Vic_Equipe2_Match6" value="6cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match6">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix6']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix6'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='6cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='6cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='6cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match6_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match7">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 7;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match7">
                                    <td class ="match7_choix1">
                                        <input type="radio" name="choix7" id="Vic_Equipe1_Match7" value="7cot_v1_club1">
                                        <label for="Vic_Equipe1_Match7">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match7_choix2">
                                        <input type="radio" name="choix7" id="Nul_Match7" value="7cot_n1_1" >                                        
                                        <label for="Nul_Match7">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match7_choix3">
                                        <input type="radio" name="choix7" id="Vic_Equipe2_Match7" value="7cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match7">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix7']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix7'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='7cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='7cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='7cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match7_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match8">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 8;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match8">
                                    <td class ="match8_choix1">
                                        <input type="radio" name="choix8" id="Vic_Equipe1_Match8" value="8cot_v1_club1">
                                        <label for="Vic_Equipe1_Match8">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match8_choix2">
                                        <input type="radio" name="choix8" id="Nul_Match8" value="8cot_n1_1" >                                        
                                        <label for="Nul_Match8">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match8_choix3">
                                        <input type="radio" name="choix8" id="Vic_Equipe2_Match8" value="8cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match8">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix8']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix8'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='8cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='8cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='8cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match8_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match9">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 9;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match9">
                                    <td class ="match9_choix1">
                                        <input type="radio" name="choix9" id="Vic_Equipe1_Match9" value="9cot_v1_club1">
                                        <label for="Vic_Equipe1_Match9">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match9_choix2">
                                        <input type="radio" name="choix9" id="Nul_Match9" value="9cot_n1_1" >                                        
                                        <label for="Nul_Match9">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match9_choix3">
                                        <input type="radio" name="choix9" id="Vic_Equipe2_Match9" value="9cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match9">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix9']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix9'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='9cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='9cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='9cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match9_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>
                        <div class="Match10">
                            <tr>
                                <div class="Club">
                                    <td>
                                        <?php                    
                                            $id_matchs = 10;    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                    <td>-</td>
                                    <td>
                                        <?php                                                                    
                                            $affichage_club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $affichage_club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        ?>
                                    </td>
                                </div>
                                <td></td>
                                <div class="Cote_match10">
                                    <td class ="match10_choix1">
                                        <input type="radio" name="choix10" id="Vic_Equipe1_Match10" value="10cot_v1_club1">
                                        <label for="Vic_Equipe1_Match10">                                   
                                            <?php                                                                           
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                while($donnees = $affichage_cote->fetch())
                                                {                                            
                                                    echo " ".$donnees["cote_victoire_equipe_1"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match10_choix2">
                                        <input type="radio" name="choix10" id="Nul_Match10" value="10cot_n1_1" >                                        
                                        <label for="Nul_Match10">
                                            <?php                                               
                                                $affichage_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_nul"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td class ="match10_choix3">
                                        <input type="radio" name="choix10" id="Vic_Equipe2_Match10" value="10cot_v1_club2" >
                                        <label for="Vic_Equipe2_Match10">
                                            <?php                                                                            
                                                $affichage_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                while ( $donnees = $affichage_cote->fetch())
                                                {
                                                    echo " ".$donnees["cote_victoire_equipe_2"];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                                <div name="PHP_choix_utilisateur">
                                    <?php
                                        if(empty($_POST['choix10']) == false)
                                        {
                                            $choix_utilisateur = $_POST['choix10'];
                                            $mysqli->query("update matchs set matchs.choix_utilisateur ='".$choix_utilisateur."' where matchs.id = '".$id_matchs."';");
                                            $recup_choix_cote = $mysqli->query("select choix_utilisateur from matchs where matchs.id = '".$id_matchs."';");
                                            while($donnees = $recup_choix_cote->fetch())
                                            {
                                                if($donnees['choix_utilisateur'] =='10cot_v1_club1')
                                                {
                                                    $couleur_fond=1;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='10cot_n1_1')
                                                {
                                                    $couleur_fond=2;
                                                }
                                                elseif($donnees['choix_utilisateur'] =='10cot_v1_club2')
                                                {
                                                    $couleur_fond=3;
                                                }
                                            }
                                            echo"<style> .match10_choix$couleur_fond { background-color: green ;}</style>";
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.choix_utilisateur=NULL where matchs.id = '".$id_matchs."';");                                   
                                        }
                                    ?>
                                </div>
                            </tr>
                        </div>

                    </table>
                    <table class="mise_gain">
                        <div class="Mise">
                            <tr>
                                <th class ="bordure">Mise</th>
                                <td class ="bordure">
                                    <input type="number" name="Mise_Utilisateur" min="0" placeholder="Entrez une Mise"/>
                                    <?php
                                        if(empty($_POST['Mise_Utilisateur']) == false)
                                        {
                                            $mise_utilisateur = $_POST['Mise_Utilisateur'];
                                            echo"<br>";
                                            echo $mise_utilisateur;
                                            $mysqli->query("update matchs set matchs.mise ='".$mise_utilisateur."';");
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.mise=NULL;");                                   
                                        }                        
                                        else
                                        {
                                            echo" ";  
                                        }
                                    ?>
                                </td>
                                <td class ="bordure">Euros</td>
                            </tr>
                        </div>
                        <div class="gain">
                            <tr>
                                <th class ="bordure">Gain</th>
                                <td class ="bordure">
                                <?php
                                    $resultat_cote =1; 
                                    if(empty($_POST['Mise_Utilisateur']) == false)
                                    {
                                        for($id=1;$id<11;$id++)
                                        {
                                            $id_matchs="$id";
                                            $recup_choix_utilisateur = $mysqli->query("select * from matchs where matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $recup_choix_utilisateur->fetch())
                                            {                                         
                                                if($donnees["choix_utilisateur"] == $id."cot_v1_club1")
                                                {
                                                    $recup_cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                                    while ( $donnees = $recup_cote->fetch())
                                                    {
                                                        $resultat_cote= floatval($donnees["cote_victoire_equipe_1"]) * $resultat_cote;
                                                    } 
                                                }
                                                elseif($donnees["choix_utilisateur"] == $id."cot_n1_1")
                                                {
                                                    $recup_cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                                    while ( $donnees = $recup_cote->fetch())
                                                    {
                                                        $resultat_cote= floatval($donnees["cote_nul"]) * $resultat_cote;
                                                    }                                                
                                                }
                                                elseif($donnees["choix_utilisateur"] == $id."cot_v1_club2")
                                                {
                                                $recup_cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                                    while ( $donnees = $recup_cote->fetch())
                                                    {
                                                        $resultat_cote= floatval($donnees["cote_victoire_equipe_2"]) * $resultat_cote;
                                                    } 
                                                }
                                            }
                                        }
                                        $resultat= $mise_utilisateur * $resultat_cote;
                                        echo $resultat;
                                    }
                                    else
                                    {
                                        echo" ";                                   
                                    }
                                ?>
                                </td>
                                <td class ="bordure">Euros</td>
                            </tr>
                        </div>
                    </table>
                    <div classe="bouton1">
                        <input type="submit" name="Parier" value="Parier">
                    </div>
            </from>
            <form action="client_def_cote.php" method="POST">      
                    <div classe="bouton2">
                        <input type="submit" name="Effacer" value="Effacer">
                    </div>            
            </form>
            <form action="Accueil.php" method="POST">
                <div classe="bouton3">
                    <input type="submit" name="Accueil" value="Accueil">
                </div>
            </form>
    </body>
</html>