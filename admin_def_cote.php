<!DOCTYPE html>
<html>
    <head>
        <title>Page Admin</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="page_admin.css"/>
    </head>
    <body>
            <table class='titre'>
                <tr>
                <th>Interface Administration Rencontre et Cote des Matchs</th>
                </tr>
            </table>
            <?php
                //connection à la BDD
                $user = "admin";
                $pass = "pwd-2023";
                $dnspdo = "mysql:host=10.0.0.5;dbname=cote_match";
                 
                $mysqli = new PDO($dnspdo,$user,$pass);
                //include du fichier resultat.php pour l'affichage des noms des clubs
                include 'resultat.php';
            ?>

                <form action="admin_def_cote.php" method="POST">
                    <!-- Titre des colonnes -->                         
                    <table class="table_gauche">
                    <tr>
                        <th>Equipe 1</th>
                        <th>-</th>
                        <th>Equipe 2</th>
                        <th></th>
                        <th>Cote Victoire <br> Equipe 1</th>
                        <th>Cote Match <br> Nul</th>
                        <th>Cote Victoire <br> Equipe 2</th>
                    </tr>

                    <div class="Match1">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                                <!-- Sélection d'un club -->
                                <select name="match1_club1" id="match1_club1">
                                    <option value="verification">Sélectionner une équipe</option>
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php                    
                                    echo"<br>";
                                    $id_matchs = 1; //numéro de matchs
                                    if(empty($_POST['match1_club1']) == false)
                                    {
                                        if($_POST['match1_club1'] != "verification")
                                        {   
                                            $id_client = $_POST['match1_club1']; // On récupère le POST
                                            // requête de type SELECT pour récupérer le logo, le club et id
                                            $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");
                                            
                                            while ( $donnees = $logo->fetch())//récupération de la données
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club
                                                //requête Update pour modifier la table matchs avec l'id de l'équipe choisie
                                                $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';"); 
                                            }      
                                        }
                                        if($_POST['match1_club1'] == "verification")
                                            // sinon si rien est entré pa l'utilisateur
                                        {    // requête de type SELECT pour récupérer le logo et le club                                    
                                            $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                            while ( $donnees = $club->fetch())//récupération de la données
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club                       
                                            }
                                        }
                                    }
                                    //sinon si l'admin appuie sur le bonton effacer
                                    elseif(isset($_POST['Effacer']))
                                    {                                  
                                        $effacer =$_POST['Effacer']; // On récupère le POST
                                        //requête Update pour modifier la table matchs.equipe_1 à NULL
                                        $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {   
                                        // requête de type SELECT pour récupérer le logo et le club                          
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];// affichage du logo
                                            echo "</br>";
                                            echo$donnees['club']; // affichage du club                          
                                        }
                                    }
                                ?>
                            </td>
                            <td>-</td>
                            <td>
                                <!-- Sélection d'un club -->
                                <select name="match1_club2" id="match1_club2">
                                    <option value="verification">Sélectionner une équipe</option>
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php
                                    echo"<br>";
                                    if(empty($_POST['match1_club2']) == false)
                                    {
                                        if($_POST['match1_club2'] != "verification")
                                        {   
                                            $id_client = $_POST['match1_club2']; // On récupère le POST
                                            // requête de type SELECT pour récupérer le logo, le club et id
                                            $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");
                                            
                                            while ( $donnees = $logo->fetch())//récupération de la données
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club
                                                //requête Update pour modifier la table matchs avec l'id de l'équipe choisie
                                                $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';"); 
                                            }      
                                        }
                                        if($_POST['match1_club2'] == "verification")
                                            // sinon si rien est entré pa l'utilisateur
                                        {    // requête de type SELECT pour récupérer le logo et le club                                    
                                            $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                            while ( $donnees = $club->fetch())//récupération de la données
                                            {
                                                echo $donnees["logo"];// affichage du logo
                                                echo "</br>";
                                                echo$donnees['club']; // affichage du club                       
                                            }
                                        }
                                    }
                                    //sinon si l'admin appuie sur le bonton effacer
                                    elseif(isset($_POST['Effacer']))
                                    {                                  
                                        //requête Update pour modifier la table matchs.equipe_2 à NULL
                                        $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {   
                                        // requête de type SELECT pour récupérer le logo et le club                          
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())//récupération de la données
                                        {
                                            echo $donnees["logo"];// affichage du logo
                                            echo "</br>";
                                            echo$donnees['club']; // affichage du club                          
                                        }
                                    }
                                ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match1" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    if(empty($_POST['Cote_Equipe1_Match1']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match1'];// On récupère le POST
                                    
                                        // requête de type UPDATE pour entrer la valeur choisie par l'utilisateur dans matchs.cote_victoire_equipe_1
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        // requête de type SELECT pour récupérer la cote victoire equipe 1
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");   
                                        while($donnees = $cote->fetch())//récupération de la données
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];// affichage du cote
                                            echo"<br>";
                                        }  
                                    }
                                     //sinon si l'admin appuie sur le bonton effacer
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        //requête Update pour modifier la table matchs.cote_victoire_equipe_1 à NULL
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {   
                                        // requête de type SELECT pour récupérer la cote victoire equipe 1                               
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                        while($donnees = $cote->fetch())//récupération de la données
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];// affichage du cote
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match1" min="0" max="10" step="0.01" placeholder="Entrez une cote"/> 
                                <?php
                                    if(empty($_POST['Cote_Nul_Match1']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match1'];// On récupère le POST
                                    
                                        // requête de type UPDATE pour entrer la valeur choisie par l'utilisateur dans matchs.cote_nul
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        // requête de type SELECT pour récupérer la cote nul
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())//récupération de la données
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];// affichage du cote
                                            echo"<br>";
                                        }  
                                    }
                                     //sinon si l'admin appuie sur le bonton effacer
                                     elseif(isset($_POST['Effacer']))
                                     {
                                         //requête Update pour modifier la table matchs.cote_nul à NULL
                                         $effacer = $mysqli->query("update matchs set matchs.cote_nul= NULL where matchs.id = '".$id_matchs."';");                                   
                                     }
                                     else
                                     {   
                                         // requête de type SELECT pour récupérer la cote nul                             
                                         $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                         while($donnees = $cote->fetch())//récupération de la données
                                         {
                                             echo"<br>";
                                             echo $donnees["cote_nul"];// affichage du cote
                                             echo"<br>";
                                         } 
                                     }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match1" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    if(empty($_POST['Cote_Equipe2_Match1']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe2_Match1'];// On récupère le POST
                                    
                                        // requête de type UPDATE pour entrer la valeur choisie par l'utilisateur dans matchs.cote_victoire_equipe_2
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        // requête de type SELECT pour récupérer la cote victoire equipe 2
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");   
                                        while($donnees = $cote->fetch())//récupération de la données
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];// affichage du cote
                                            echo"<br>";
                                        }  
                                    }
                                     //sinon si l'admin appuie sur le bonton effacer
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        //requête Update pour modifier la table matchs.cote_victoire_equipe_2 à NULL
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {   
                                        // requête de type SELECT pour récupérer la cote victoire equipe 2                              
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                        while($donnees = $cote->fetch())//récupération de la données
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];// affichage du cote
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class="Match2">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                                <select name="match2_club1" id="match2_club1">
                                    <option value="verification">Sélectionner une équipe</option>
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php                    
                                echo"<br>";
                                $id_matchs = 2;
                                // On récupère les POST
                                if(empty($_POST['match2_club1']) == false)
                                {
                                    if($_POST['match2_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match2_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match2_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                   
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                                ?>
                            </td>
                            <td>-</td>
                            <td>
                                <select name="match2_club2" id="match2_club2">
                                    <option value="verification">Sélectionner une équipe</option>    
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php
                                    echo"<br>";
                                    // On récupère les POST                  
                                    if(empty($_POST['match2_club2']) == false)
                                    {
                                        if($_POST['match2_club2'] != "verification")
                                        {                                       
                                            $id_client = $_POST['match2_club2'];
                                        
                                            // requête de type UPDATE
                                            $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                            while ( $donnees = $logo->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club']; 
                                                $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                            }      
                                        }
                                        if($_POST['match2_club2'] == "verification")
                                            # sinon si rien est entré pa l'utilisateur
                                        {                                       
                                            $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                            while ( $donnees = $club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        }
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                        
                                    }
                                    else
                                    {                                    
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match2" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 2;
                                    if(empty($_POST['Cote_Equipe1_Match2']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match2'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match2" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php	
                                    $id_matchs = 2;
                                    if(empty($_POST['Cote_Nul_Match2']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match2'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                        }
                                        elseif(isset($_POST['Effacer']))
                                        {
                                            $effacer =$_POST['Effacer'];
                                            $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                        }
                                        else
                                        {                                   
                                            $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                            while ( $donnees = $cote->fetch())
                                            {
                                                echo"<br>";
                                                echo $donnees["cote_nul"];
                                                echo"<br>";
                                            } 
                                        }
                                ?>    
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match2" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 2;
                                    if(empty($_POST['Cote_Equipe2_Match2']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match2'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class="Match3">
                        <tr>
                        <div class="Choix_equipe">                      
                            <td>
                            <select name="match3_club1" id="match3_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php
                                echo"<br>";
                                $id_matchs = 3;                
                                if(empty($_POST['match3_club1']) == false)
                                {
                                    if($_POST['match3_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match3_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match3_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                                
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>                       
                            <td>-</td>
                            <td>
                            <select name="match3_club2" id="match3_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 3;
                                // On récupère les POST                  
                                if(empty($_POST['match3_club2']) == false)
                                {
                                    if($_POST['match3_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match3_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match3_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                        </div>
                        </td>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match3" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 3;
                                    if(empty($_POST['Cote_Equipe1_Match3']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match3'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match3" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 3;
                                    if(empty($_POST['Cote_Nul_Match3']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match3'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match3" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 3;
                                    if(empty($_POST['Cote_Equipe2_Match3']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match3'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class="Match4">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                                <select name="match4_club1" id="match4_club1">
                                    <option value="verification">Sélectionner une équipe</option>
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php                    
                                    echo"<br>";
                                    $id_matchs = 4;
                                    // On récupère les POST
                                    if(empty($_POST['match4_club1']) == false)
                                    {
                                        if($_POST['match4_club1'] != "verification")
                                        {                                       
                                            $id_client = $_POST['match4_club1'];
                                        
                                            // requête de type UPDATE
                                            $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                            while ( $donnees = $logo->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club']; 
                                                $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                            }      
                                        }
                                        if($_POST['match4_club1'] == "verification")
                                            # sinon si rien est entré pa l'utilisateur
                                        {                                       
                                            $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                            while ( $donnees = $club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        }
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {                                    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                    
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                ?>
                            </td>
                            <td>-</td>
                            <td>
                                <select name="match4_club2" id="match4_club2">
                                    <option value="verification">Sélectionner une équipe</option>
                                    <option value='1'><?php echo implode($tableau[1]); ?></option>
                                    <option value='2'><?php echo implode($tableau[2]); ?></option>
                                    <option value='3'><?php echo implode($tableau[3]); ?></option>
                                    <option value='4'><?php echo implode($tableau[4]); ?></option>
                                    <option value='5'><?php echo implode($tableau[5]); ?></option>
                                    <option value='6'><?php echo implode($tableau[6]); ?></option>
                                    <option value='7'><?php echo implode($tableau[7]); ?></option>
                                    <option value='8'><?php echo implode($tableau[8]); ?></option>
                                    <option value='9'><?php echo implode($tableau[9]); ?></option>
                                    <option value='10'><?php echo implode($tableau[10]); ?></option>
                                    <option value='11'><?php echo implode($tableau[11]); ?></option>
                                    <option value='12'><?php echo implode($tableau[12]); ?></option>
                                    <option value='13'><?php echo implode($tableau[13]); ?></option>
                                    <option value='14'><?php echo implode($tableau[14]); ?></option>
                                    <option value='15'><?php echo implode($tableau[15]); ?></option>
                                    <option value='16'><?php echo implode($tableau[16]); ?></option>
                                    <option value='17'><?php echo implode($tableau[17]); ?></option>
                                    <option value='18'><?php echo implode($tableau[18]); ?></option>
                                    <option value='19'><?php echo implode($tableau[19]); ?></option>
                                    <option value='20'><?php echo implode($tableau[20]); ?></option>
                                </select>
                                <?php                    
                                    echo"<br>";
                                    $id_matchs = 4;
                                    // On récupère les POST                  
                                    if(empty($_POST['match4_club2']) == false)
                                    {
                                        if($_POST['match4_club2'] != "verification")
                                        {                                       
                                            $id_client = $_POST['match4_club2'];
                                        
                                            // requête de type UPDATE
                                            $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");
        
                                            while ( $donnees = $logo->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club']; 
                                                $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                            }      
                                        }
                                        if($_POST['match4_club2'] == "verification")
                                            # sinon si rien est entré pa l'utilisateur
                                        {                                       
                                            $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
        
                                            while ( $donnees = $club->fetch())
                                            {
                                                echo $donnees["logo"];
                                                echo "</br>";
                                                echo$donnees['club'];                           
                                            }
                                        }
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                        
                                    }
                                    else
                                    {                                    
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");
        
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match4" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 4;
                                    if(empty($_POST['Cote_Equipe1_Match4']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match4'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match4" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 4;
                                    if(empty($_POST['Cote_Nul_Match4']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match4'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match4" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs =4;
                                    if(empty($_POST['Cote_Equipe2_Match4']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match4'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>
                    
                    <div class ="Match5">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                            <select name="match5_club1" id="match5_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 5;
                                // On récupère les POST
                                if(empty($_POST['match5_club1']) == false)
                                {
                                    if($_POST['match5_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match5_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match5_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match5_club2" id="match5_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                            echo"<br>";
                            $id_matchs = 5;
                            // On récupère les POST
                            if(empty($_POST['match5_club2']) == false)
                            {
                                if($_POST['match5_club2'] != "verification")
                                {                                       
                                    $id_client = $_POST['match5_club2'];
                                
                                    // requête de type UPDATE
                                    $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                    while ( $donnees = $logo->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club']; 
                                        $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                    }      
                                }
                                if($_POST['match5_club2'] == "verification")
                                    # sinon si rien est entré pa l'utilisateur
                                {                                       
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            }
                            elseif(isset($_POST['Effacer']))
                            {
                                
                                $effacer =$_POST['Effacer'];
                                $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                
                            }
                            else
                            {                                    
                                $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                while ( $donnees = $club->fetch())
                                {
                                    echo $donnees["logo"];
                                    echo "</br>";
                                    echo$donnees['club'];                           
                                }
                            }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match5" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 5;
                                    if(empty($_POST['Cote_Equipe1_Match5']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match5'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match5" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 5;
                                    if(empty($_POST['Cote_Nul_Match5']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match5'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match5" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 5;
                                    if(empty($_POST['Cote_Equipe2_Match5']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match5'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>                
                    </div>

                    <div class="Match6">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                            <select name="match6_club1" id="match6_club1">
                                <option value="verification">Sélectionner une équipe</option>   
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 6;
                                // On récupère les POST
                                if(empty($_POST['match6_club1']) == false)
                                {
                                    if($_POST['match6_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match6_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match6_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match6_club2" id="match6_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 6;
                                // On récupère les POST
                                if(empty($_POST['match6_club2']) == false)
                                {
                                    if($_POST['match6_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match6_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match6_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match6" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 6;
                                    if(empty($_POST['Cote_Equipe1_Match6']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match6'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match6" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 6;
                                    if(empty($_POST['Cote_Nul_Match6']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match6'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>    
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match6" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 6;
                                    if(empty($_POST['Cote_Equipe2_Match6']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match6'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class="Match7">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                            <select name="match7_club1" id="match7_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 7;
                                // On récupère les POST
                                if(empty($_POST['match7_club1']) == false)
                                {
                                    if($_POST['match7_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match7_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match7_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                                ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match7_club2" id="match7_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                // On récupère les POST
                                if(empty($_POST['match7_club2']) == false)
                                {
                                    if($_POST['match7_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match7_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match7_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match7" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 7;
                                    if(empty($_POST['Cote_Equipe1_Match7']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match7'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match7" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 7;
                                    if(empty($_POST['Cote_Nul_Match7']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match7'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>    
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match7" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 7;
                                    if(empty($_POST['Cote_Equipe2_Match7']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match7'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class="Match8">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                            <select name="match8_club1" id="match8_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 8;
                                // On récupère les POST
                                if(empty($_POST['match8_club1']) == false)
                                {
                                    if($_POST['match8_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match8_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match8_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match8_club2" id="match8_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                // On récupère les POST
                                if(empty($_POST['match8_club2']) == false)
                                {
                                    if($_POST['match8_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match8_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match8_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match8" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 8;
                                    if(empty($_POST['Cote_Equipe1_Match8']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match8'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match8" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 8;
                                    if(empty($_POST['Cote_Nul_Match8']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match8'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>    
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match8" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 8;
                                    if(empty($_POST['Cote_Equipe2_Match8']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match8'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                                
                    </div>

                    <div class="Match9">
                        <tr>
                        <div class="Choix_equipe">
                            <td>
                            <select name="match9_club1" id="match9_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                $id_matchs = 9;
                                // On récupère les POST
                                if(empty($_POST['match9_club1']) == false)
                                {
                                    if($_POST['match9_club1'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match9_club1'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match9_club1'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {                                
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match9_club2" id="match9_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                // On récupère les POST
                                if(empty($_POST['match9_club2']) == false)
                                {
                                    if($_POST['match9_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match9_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match9_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match9" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 9;
                                    if(empty($_POST['Cote_Equipe1_Match9']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match9'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match9" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 9;
                                    if(empty($_POST['Cote_Nul_Match9']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match9'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>    
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match9" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 9;
                                    if(empty($_POST['Cote_Equipe2_Match9']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match9'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>

                    <div class ="Match10">
                        <tr>
                        <div class="Choix_equipe">
                            <td>                        
                            <select name="match10_club1" id="match10_club1">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                            echo"<br>";
                            $id_matchs = 10;
                            // On récupère les POST
                            if(empty($_POST['match10_club1']) == false)
                            {
                                if($_POST['match10_club1'] != "verification")
                                {                                       
                                    $id_client = $_POST['match10_club1'];
                                
                                    // requête de type UPDATE
                                    $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                    while ( $donnees = $logo->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club']; 
                                        $mysqli->query("update matchs set matchs.equipe_1='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                    }      
                                }
                                if($_POST['match10_club1'] == "verification")
                                    # sinon si rien est entré pa l'utilisateur
                                {                                       
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            }
                            elseif(isset($_POST['Effacer']))
                            {                                
                                $effacer =$_POST['Effacer'];
                                $effacer = $mysqli->query("update matchs set matchs.equipe_1= NULL where matchs.id = '".$id_matchs."';");                               
                            }
                            else
                            {                                    
                                $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id = '".$id_matchs."';");

                                while ( $donnees = $club->fetch())
                                {
                                    echo $donnees["logo"];
                                    echo "</br>";
                                    echo$donnees['club'];                           
                                }
                            }
                            ?>
                            </td>
                            <td>-</td>
                            <td>
                            <select name="match10_club2" id="match10_club2">
                                <option value="verification">Sélectionner une équipe</option>
                                <option value='1'><?php echo implode($tableau[1]); ?></option>
                                <option value='2'><?php echo implode($tableau[2]); ?></option>
                                <option value='3'><?php echo implode($tableau[3]); ?></option>
                                <option value='4'><?php echo implode($tableau[4]); ?></option>
                                <option value='5'><?php echo implode($tableau[5]); ?></option>
                                <option value='6'><?php echo implode($tableau[6]); ?></option>
                                <option value='7'><?php echo implode($tableau[7]); ?></option>
                                <option value='8'><?php echo implode($tableau[8]); ?></option>
                                <option value='9'><?php echo implode($tableau[9]); ?></option>
                                <option value='10'><?php echo implode($tableau[10]); ?></option>
                                <option value='11'><?php echo implode($tableau[11]); ?></option>
                                <option value='12'><?php echo implode($tableau[12]); ?></option>
                                <option value='13'><?php echo implode($tableau[13]); ?></option>
                                <option value='14'><?php echo implode($tableau[14]); ?></option>
                                <option value='15'><?php echo implode($tableau[15]); ?></option>
                                <option value='16'><?php echo implode($tableau[16]); ?></option>
                                <option value='17'><?php echo implode($tableau[17]); ?></option>
                                <option value='18'><?php echo implode($tableau[18]); ?></option>
                                <option value='19'><?php echo implode($tableau[19]); ?></option>
                                <option value='20'><?php echo implode($tableau[20]); ?></option>
                            </select>
                            <?php                    
                                echo"<br>";
                                // On récupère les POST
                                if(empty($_POST['match10_club2']) == false)
                                {
                                    if($_POST['match10_club2'] != "verification")
                                    {                                       
                                        $id_client = $_POST['match10_club2'];
                                    
                                        // requête de type UPDATE
                                        $logo = $mysqli->query("select logo,club,id from equipe WHERE id='".$id_client."';");

                                        while ( $donnees = $logo->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                            $mysqli->query("update matchs set matchs.equipe_2='".$donnees["id"]."' where matchs.id = '".$id_matchs."';");
                                        }      
                                    }
                                    if($_POST['match10_club2'] == "verification")
                                        # sinon si rien est entré pa l'utilisateur
                                    {                                       
                                        $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club'];                           
                                        }
                                    }
                                }
                                elseif(isset($_POST['Effacer']))
                                {
                                    
                                    $effacer =$_POST['Effacer'];
                                    $effacer = $mysqli->query("update matchs set matchs.equipe_2= NULL where matchs.id = '".$id_matchs."';");
                                    
                                }
                                else
                                {                                    
                                    $club = $mysqli->query("select logo,club from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id = '".$id_matchs."';");

                                    while ( $donnees = $club->fetch())
                                    {
                                        echo $donnees["logo"];
                                        echo "</br>";
                                        echo$donnees['club'];                           
                                    }
                                }
                            ?>
                            </td>
                        </div>
                        <td></td>
                        <div class="Choix_cote">
                            <td class ="border">
                                <input type="number" name="Cote_Equipe1_Match10" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 10;
                                    if(empty($_POST['Cote_Equipe1_Match10']) == false)
                                    {                                     
                                        $cote_equipe1 = $_POST['Cote_Equipe1_Match10'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_1 ='".$cote_equipe1."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_1= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_1 from matchs where matchs.id = '".$id_matchs."';");

                                        while($donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_1"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Nul_Match10" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 10;
                                    if(empty($_POST['Cote_Nul_Match10']) == false)
                                    {                                                                          
                                        $cote_null = $_POST['Cote_Nul_Match10'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_nul  ='".$cote_null."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_nul  from matchs where matchs.id = '".$id_matchs."';");
                                        
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_nul = NULL where matchs.id = '".$id_matchs."';");                                        
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_nul from matchs where matchs.id = '".$id_matchs."';");
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_nul"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>   
                            </td>
                            <td class ="border">
                                <input type="number" name="Cote_Equipe2_Match10" min="0" max="10" step="0.01" placeholder="Entrez une cote"/>
                                <?php
                                    $id_matchs = 10;
                                    if(empty($_POST['Cote_Equipe2_Match10']) == false)
                                    {                                     
                                        $cote_equipe2 = $_POST['Cote_Equipe2_Match10'];
                                    
                                        // requête de type UPDATE
                                        $mysqli->query("update matchs set matchs.cote_victoire_equipe_2 ='".$cote_equipe2."' where matchs.id = '".$id_matchs."';");
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");
                                            
                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        }  
                                    }
                                    elseif(isset($_POST['Effacer']))
                                    {
    
                                        $effacer =$_POST['Effacer'];
                                        $effacer = $mysqli->query("update matchs set matchs.cote_victoire_equipe_2= NULL where matchs.id = '".$id_matchs."';");                                   
                                    }
                                    else
                                    {                                   
                                        $cote = $mysqli->query("select cote_victoire_equipe_2 from matchs where matchs.id = '".$id_matchs."';");

                                        while ( $donnees = $cote->fetch())
                                        {
                                            echo"<br>";
                                            echo $donnees["cote_victoire_equipe_2"];
                                            echo"<br>";
                                        } 
                                    }
                                ?>
                            </td>
                        </div>
                        </tr>
                    </div>
                    </table>
                    
                    <input type="submit" name="Valider" value="Valider">
                </form>
                <form action="admin_def_cote.php" method="POST">
                    <input type="submit" name="Effacer" value="Effacer">
                </form>
                <form action="Accueil.php" method="POST">
                    <input type="submit" name="Accueil" value="Accueil">
                </form>
    </body>
</html>