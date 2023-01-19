<!doctype html>
<html>
    <header>
        <title>Page Admin</title>
        <meta charset="UTF-8"/>
        <link rel="stylesheet" href="page_admin.css"/>
    </header>
    <body>
        <div >
            <table class="titre">
                <tbody>
                    <tr>
                        <th>Accueil</th>
                    </tr>
                </tbody>
            </table>
        </div>
        <div >
            <table class="table_gauche">
                <tbody>
                    <tr>
                        <td>Nos Client</td>
                        <td></td>
                        <td>Nos Administrateur</td>
                    </tr>
                    <tr>
                        <td><form action="client_def_cote.php" method="POST">Vous pouvez accéder a votre page pour faire vos paries<br><input type="submit" value="Page de Parie"></form></td>
                        <td></td>
                        <td><form action="admin_def_cote.php" method="POST">Vous définir les cote des matchs ainsi que les équipes qui s'affronte<br><input type="submit" value="Page initiale"></form></td>
                    </tr>
                    <tr>
                        <td><form action="Client_resultat.php" method="POST">Vous pourrez voir le résultat de vos match<br><input type="submit" value="Page des Resultats"></form></td>
                        <td></td>
                        <td><form action="Selection_admin.php" method="POST">Vous pouvez rentré les réstultats des matchs<br><input type="submit" value="Page initialisation des Resultats"></form</td>
                    </tr>
                </tbody>
            </table>
        </div>
    </body>
</html>
