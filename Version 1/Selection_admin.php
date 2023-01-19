<!doctype html>
<html>
    <header>
        <title>Page Admin</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="page_admin.css"/>
    </header>
    <body>
        <?php
            /* Connexion a la base */
            $user = "admin";
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
            <label for="lang"></label>
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
                                <td> </td>
                                <div class="Cote_match1">
                                <td>
                                <input type="radio" name="choix1" id="cot_v1_club1"value="1cot_v1_club1">
                                <label for="cot_v1_club1">
                                <?php 
                                    $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                    while ($donnees = $affichage->fetch())
                                    {
                                        echo $donnees['cote_victoire_equipe_1'];
                                    }
                                ?>
                                </label>
                                </td>
                                <td>
                                    <input type="radio" name="choix1" id="cot_n1_1"value="1cot_n1_1">
                                    <label for="cot_n1_1">
                                        <?php 
                                            $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                            while ($donnees = $affichage->fetch())
                                            {
                                                echo $donnees['cote_nul'];
                                            }
                                        ?>
                                    </label>
                                </td>
                                <td>
                                    <input type="radio" name="choix1" id="cot_v1_club2"value="1cot_v1_club2">
                                    <label for="cot_v1_club2">
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
                        <div class="Match2">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 2;
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
                                <td> </td>
                                <div class="Cote_match2">
                                    <td>
                                        <input type="radio" name="choix2" id="2cot_v1_club1"value="2cot_v1_club1">
                                        <label for="2cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix2" id="2cot_n1_1"value="2cot_n1_1">
                                        <label for="2cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix2" id="2cot_v1_club2"value="2cot_v1_club2">
                                        <label for="2cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match3">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 3;
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
                                <td> </td>
                                <div class="Cote_match3">
                                    <td>
                                        <input type="radio" name="choix3" id="3cot_v1_club1"value="3cot_v1_club1">
                                        <label for="3cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix3" id="cot_n1_1"value="3cot_n1_1">
                                        <label for="3cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix3" id="3cot_v1_club2"value="3cot_v1_club2">
                                        <label for="3cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match4">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 4;
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
                                <td> </td>
                                <div class="Cote_match4">
                                    <td>
                                        <input type="radio" name="choix4" id="4cot_v1_club1"value="4cot_v1_club1">
                                        <label for="4cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix4" id="4cot_n1_1"value="4cot_n1_1">
                                        <label for="4cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix4" id="4cot_v1_club2"value="4cot_v1_club2">
                                        <label for="4cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match5">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 5;
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
                                <td> </td>
                                <div class="Cote_match5">
                                    <td>
                                        <input type="radio" name="choix5" id="5cot_v1_club1"value="5cot_v1_club1">
                                        <label for="5cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choi5" id="5cot_n1_1"value="5cot_n1_1">
                                        <label for="5cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix5" id="5cot_v1_club2"value="5cot_v1_club2">
                                        <label for="5cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match6">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 6;
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
                                <td> </td>
                                <div class="Cote_match6">
                                    <td>
                                        <input type="radio" name="choix6" id="6cot_v1_club1"value="6cot_v1_club1">
                                        <label for="6cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix6" id="6cot_n1_1"value="6cot_n1_1">
                                        <label for="6cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix6" id="6cot_v1_club2"value="6cot_v1_club2">
                                        <label for="6cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match7">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 7;
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
                                <td> </td>
                                <div class="Cote_match7">
                                    <td>
                                        <input type="radio" name="choix7" id="7cot_v1_club1"value="7cot_v1_club1">
                                        <label for="7cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix7" id="7cot_n1_1"value="7cot_n1_1">
                                        <label for="7cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix7" id="7cot_v1_club2"value="7cot_v1_club2">
                                        <label for="7cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match8">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 8;
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
                                <td> </td>
                                <div class="Cote_match8">
                                    <td>
                                        <input type="radio" name="choix8" id="8cot_v1_club1"value="8cot_v1_club1">
                                        <label for="8cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix8" id="8cot_n1_1"value="8cot_n1_1">
                                        <label for="8cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix8" id="8cot_v1_club2"value="8cot_v1_club2">
                                        <label for="8cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match9">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 9;
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
                                <td> </td>
                                <div class="Cote_match9">
                                    <td>
                                        <input type="radio" name="choix9" id="9cot_v1_club1"value="9cot_v1_club1">
                                        <label for="9cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix9" id="9cot_n1_1"value="9cot_n1_1">
                                        <label for="9cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix9" id="9cot_v1_club2"value="9cot_v1_club2">
                                        <label for="9cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                        <div class="Match10">
                            <tr>
                                <td>
                                    <?php
                                        $id_client = 10;
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
                                <td> </td>
                                <div class="Cote_match10">
                                    <td>
                                        <input type="radio" name="choix1" id="10cot_v1_club1"value="10cot_v1_club1">
                                        <label for="10cot_v1_club1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_1'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix10" id="10cot_n1_1"value="10cot_n1_1">
                                        <label for="10cot_n1_1">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_nul'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                    <td>
                                        <input type="radio" name="choix10" id="10cot_v1_club2"value="10cot_v1_club2">
                                        <label for="10cot_v1_club2">
                                            <?php 
                                                $affichage = $mysqli->query("select * from matchs where id ='".$id_client."';");
                                                while ($donnees = $affichage->fetch())
                                                {
                                                    echo $donnees['cote_victoire_equipe_2'];
                                                }
                                            ?>
                                        </label>
                                    </td>
                                </div>
                            </tr>
                        </div>
                    </tbody>
                </table>
            </label>
            <input type="submit" value="Validé">
        </from>
        <form action="Accueil.php" method="POST">
            <div classe="bouton3">
                <input type="submit" name="Accueil" value="Accueil">
            </div>
        </form>
        <?php
            if(isset($_POST['choix1'])) 
            {
                $id_matchs = 1;
                $id_client = $_POST['choix1'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix2'])) 
            {
                $id_matchs = 2;
                $id_client = $_POST['choix2'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix3'])) 
            {
                $id_matchs = 3;
                $id_client = $_POST['choix3'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix4'])) 
            {
                $id_matchs = 4;
                $id_client = $_POST['choix4'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix5'])) 
            {
                $id_matchs = 5;
                $id_client = $_POST['choix5'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix6'])) 
            {
                $id_matchs = 6;
                $id_client = $_POST['choix6'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix7'])) 
            {
                $id_matchs = 7;
                $id_client = $_POST['choix7'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix8'])) 
            {
                $id_matchs = 8;
                $id_client = $_POST['choix8'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix9'])) 
            {
                $id_matchs = 9;
                $id_client = $_POST['choix9'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
            if(isset($_POST['choix10'])) 
            {
                $id_matchs = 10;
                $id_client = $_POST['choix10'];
                $ecritrure = $mysqli->query("update matchs set matchs.resultat = '".$id_client."' where matchs.id ='".$id_matchs."';");
            }
        ?>
    </body>
</html>