<?php
    $user = "admin";
    $pass = "pwd-2023";
    $dnspdo = "mysql:host=10.0.0.5;dbname=cote_match";

    $mysqli = new PDO($dnspdo,$user,$pass);

    for($id=1;$id<21;$id++)
    {
        $nom_club= $mysqli->query("select club from equipe where id ='".$id."';");
        while($club = $nom_club->fetch())
        {
            $tableau[$id] =array($club['club']);
        }
    }
?>
