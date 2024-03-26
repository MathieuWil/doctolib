<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Connexion à votre compte Doctolib</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            margin: 0;
            padding: 0;
        }

        form {
            max-width: 400px;
            margin: 50px auto;
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        h3 {
            text-align: center;
            color: #333;
        }

        table {
            width: 100%;
        }

        td {
            padding: 10px;
        }

        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 8px;
            margin-bottom: 10px;
            box-sizing: border-box;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="reset"],
        input[type="submit"] {
            background-color: #1599E3;
            color: #fff;
            padding: 10px 15px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="reset"]:hover,
        input[type="submit"]:hover {
            background-color: #247AE2;
        }
    </style>
</head>
<body>

<form method="post">
    <h3>Connexion Doctolib</h3>
    <table>
        <tr>
            <td>Email</td>
            <td><input type="text" name="email" required></td>
        </tr>
        <tr>
            <td>Mot de passe</td>
            <td><input type="password" name="mdp" required></td>
        </tr>
        <tr>
            <td><input type="reset" name="Annuler" value="Annuler"></td>
            <td><input type="submit" name="seConnecter" value="Se Connecter"></td>
        </tr>

        <!--Profil Admin-->
        <tr><p>Email : blucbert@gmail.com<br>Mot de passe : Superb@pt95!</p></tr>
        

    </table>
</form>

</body>
</html>