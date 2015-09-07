<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Dessiner le mieux possible pour que vos amis trouve la bonne reponse" />
    <title>My Drawsomething</title>
    <link href='http://fonts.googleapis.com/css?family=Abel|Pacifico' rel='stylesheet' type='text/css'>
    <link media="all" type="text/css" rel="stylesheet" href="media/css/bootstrap.min.css" />
    <link media="all" type="text/css" rel="stylesheet" href="media/css/bootstrap-theme.min.css" />
    <link media="all" type="text/css" rel="stylesheet" href="media/css/my_style.css" />
    <script src="media/js/jquery.js"></script>
    <script type="text/javascript">
        var deco = function () {
            localStorage.removeItem("login");
            localStorage.removeItem("token");
            window.location = 'index.php';
        }
    </script>
    <script src="media/js/appGuess.js"></script>
<!--[if lt IE 9]>
<script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
<script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
</head>
<body>
    <div class="container">
        <nav class="navbar navbar-default">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="home.php">
                        <img id="logoMenu" class="navbar-brand" src="media/logo.jpg" alt="logo">
                    </a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="home.php">Home</a></li>
                        <li><a href="amis.php">Amis</a></li>
                        <li><a href="profil.php">Profil</a></li>
                    </ul>
                    <ul class="nav navbar-nav navbar-right">
                        <li>
                            <a href="#" onclick="deco()">Deconnexion</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
        <div class="jumbotron">
            <h1></h1>
            <h2>ATTENTION 1 MIN DISPONIBLE !!!</h2>
            <button type="button" class="btn btn-primary form-control" name="guessBegin" id="guessBegin">Pret ?? Cliquer moi !!</button>
            <div id="erreur"></div>
        </div>
        <div class="jumbotron" id="guess">
        <h3>Voici le dessin que vous devez deviner !!</h3>
        <img id="imageGuess" src="" alt="guess that !!">
        <h4 id="countdown"></h4>
        <label class="form-control" id="help"></label>
        <input type="text" name="mot" id="mot" value="" maxlength="" class="form-control" placeholder="ecrivez le mot ici !!">
        <button type="button" class="btn btn-primary form-control" name="guessFinish" id="guessFinish">Envoyer la reponse !!</button>
        <div id="lettres"></div>
        </div>
    </div>
</body>
</html>