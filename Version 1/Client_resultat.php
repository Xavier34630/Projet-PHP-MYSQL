<!doctype html>
<html>
    <header>
        <title>Client</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="page_admin.css"/>
    </header>
    <body>
        <?php
            /* Connexion a la base */
            $user = "client";
            $pass = "pwd-2023";
            $dnspdo = "mysql:host=10.0.0.5;dbname=cote_match";
                 
                $mysqli = new PDO($dnspdo,$user,$pass);
        ?>
        <table class='titre'>
            <tr>
                <th>Interface Administration Rencontre et Cote des Matchs</th>
            </tr>
        </table>
        <form action="Selection_admin.php" method="POST">
                <table class="table_gauche" >
                    <tbody>
                            <tr>
                                <td>Equipe 1</td>
                                <td >-</td>
                                <td>Equipe 2</td>
                                <td ></td>
                                <td>Côte Victoire de l'équipe 1</td>
                                <td>Côte Match Nul</td>
                                <td>Côte Victoire de l'équipe 2</td>
                            </tr>
                            
                        <div class="Match1">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 1;
                                        $numero_match = 1;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif1">
                                <?php
                                    
                                    $recup = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $recup->fetch())
                                    {
                                        $mise = $donnees["mise"];                   
                                    }
                                    
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        

                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == '1cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == '1cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == '1cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        //echo"nop";
                                        $mise = $mise * 0;
                                        if($choix_admin == "1cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == "1cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == "1cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == "1cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == "1cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == "1cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id1_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id1_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id1_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                </td>
                            </tr>
                        </div>
                        <div class="Match2">
                            <tr>
                                <td>
                                    <?php
                                        
                                        $id_client = 2;
                                        $numero_match = 2;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php                                   
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                .$id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                .$id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }   
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id2_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id2_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id2_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>                    
                        <div class="Match3">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 3;
                                        $numero_match = 3;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                .$id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                .$id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }   
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id3_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id3_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id3_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match4">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =4;
                                        $numero_match =4;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id4_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id4_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id4_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match5">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =5;
                                        $numero_match =5;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id5_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id5_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id5_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match6">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =6;
                                        $numero_match =6;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id6_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id6_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id6_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match7">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =7;
                                        $numero_match =7;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id7_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id7_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id7_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match8">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =8;
                                        $numero_match =8;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id8_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id8_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id8_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match9">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =9;
                                        $numero_match =9;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id9_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id9_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id9_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                        <div class="Match10">
                            <tr>
                                <td>
                                    <?php
                                        $id_client =10;
                                        $numero_match =10;
                                        $id= '.id'.$numero_match.'_';
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_1 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                <td>
                                    -
                                </td>
                                <td>
                                    <?php
                                        $club = $mysqli->query("select * from equipe inner join matchs where equipe.id = matchs.equipe_2 and matchs.id ='".$id_client."';");
                                        while ( $donnees = $club->fetch())
                                        {
                                            echo $donnees["logo"];
                                            echo "</br>";
                                            echo$donnees['club']; 
                                        }
                                    ?>
                                </td>
                                
                                <div class="verif2">
                                <?php
                                    $admin = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ( $donnees = $admin->fetch())
                                    {
                                        $choix_admin = $donnees["resultat"];
                                        /*echo $donnees["resultat"];
                                        echo "</b>";*/
                                    }
                                    $user = $mysqli->query("select * from matchs where id ='".$id_client."';"); 
                                    while ( $donnees = $user->fetch())
                                    {
                                        $choix_user = $donnees["choix_utilisateur"];
                                        /*echo $donnees["choix_utilisateur"];
                                        echo "</br>";*/
                                    }
                                    //echo $choix_admin;echo"<br>"; echo $choix_user;echo"<br>";
                                    if ($choix_admin == $choix_user)
                                    {
                                        /*echo "verifier";/*
                                        echo "</br>";*/
                                        if($choix_admin == $numero_match.'cot_n1_1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_nul'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =2;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club1')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_1'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =1;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match.'cot_v1_club2')
                                        {
                                            $user = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ( $donnees = $user->fetch())
                                            {
                                                $cote = $donnees['cote_victoire_equipe_2'];
                                                $mise = $mise * $cote;
                                                /*echo $mise;
                                                echo "</br>";*/
                                                $nmb_match =3;
                                            }
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: green;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                    else
                                    {
                                        $mise = $mise * 0;
                                        if($choix_admin == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_admin == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: orange;
                                                }
                                            </style>
                                            ";
                                        }
                                        if($choix_user == $numero_match."cot_n1_1")
                                        {
                                            $nmb_match = 2;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club1")
                                        {
                                            $nmb_match = 1;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                        elseif($choix_user == $numero_match."cot_v1_club2")
                                        {
                                            $nmb_match = 3;
                                            echo "
                                            <style> 
                                                $id$nmb_match{
                                                    background-color: red;
                                                }
                                            </style>
                                            ";
                                        }
                                    }
                                ?>

                                <td> </td>                                

                                <td class = "id10_1">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_1'];
                                        }
                                    ?>  
                                </label>
                                </td>
                                <td class = "id10_2">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_nul'];
                                        }
                                    ?>
                                </td>
                                <td class = "id10_3">
                                    <?php 
                                        $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                        while ($donnees = $affichage->fetch())
                                        {
                                            echo $donnees['cote_victoire_equipe_2'];
                                        }
                                    ?>
                                    </label>
                                </td>
                            </tr>
                        </div>
                    </div>
                </tbody>
            </table>
            <form action="Accueil.php" method="POST">
                    <input type="submit" name="Accueil" value="Accueil">
                </form>
        </body>
</html>