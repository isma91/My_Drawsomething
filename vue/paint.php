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
        <h1 id="dessiner"></h1>
        <canvas id="paint" width="1000" height="500" style='border:1px solid black'></canvas>
        <h2 class="center">Vos accesoires :</h2>
        <div class="jumbotron">
            <div id="success"></div>
            <noscript>VOUS DEVEZ ACTIVER JAVASCRIPT SI IL VOUS PLAIT !! MERCI BEAUCOUP</noscript>
            <div class="selectedColor"></div>
            <br/>
            <label>La couleur du contour :</label>
            <input type="color" name="colorContour" id="colorContour" />
            <label>La couleur interne :</label>
            <input type="color" name="colorInterne" id="colorInterne" />
            <label>La couleur de l'ombre :</label>
            <input type="color" name="colorShadow" id="colorShadow" />
            <br/>
            <label>largeur du contour :</label>
            <div id="valueLargeur"></div>
            <input type="range" name="largeur" id="largeur" value="5" min="1" max="20" />
            <label>largeur de l'ombre :</label>
            <div id="valueShadow"></div>
            <input type="range" name="shadow" id="shadow" value="0" min="0" max="30" />
            <br/>
            <label>Rectangle creux:</label>
            <button id="rectangleCreux"><img src="media/icones/rectangleCreux.png" alt="un rectangle creux" /></button>
            <label>Rectangle plein:</label>
            <button id="rectanglePlein"><img src="media/icones/rectangleRempli.png" alt="un rectangle plein" /></button>
            <br/>
            <label>Un trait:</label>
            <button id="trait"><img src="media/icones/trait.jpg" alt="un trait" /></button>
            <label>Crayon:</label>
            <button id="crayon"><img src="media/icones/crayon.png" alt="un crayon" /></button>
            <br/>
            <label>Cercle creux:</label>
            <button id="cercleCreux"><img src="media/icones/cercleCreux.png" alt="un cercle creux" /></button>
            <label>Cercle plein:</label>
            <button id="cerclePlein"><img src="media/icones/cerclePlein.PNG" alt="un cercle rempli" /></button>
            <br/>
            <label>Gomme:</label>
            <button id="gomme"><img src="media/icones/gomme.png" alt="une gomme pour effacer" /></button>
            <br/>
            <button id="erase">Effacer le dessin</button>
            <button id="finish">Envoyer le dessin !!!</button>
        </div>
    </div>
    <div id="picture" style="visibility: hidden;"></div>
    <div id="picturePaint" style="visibility: hidden;"></div>
    <script type="text/javascript" src="media/js/paint.js"></script>
</body>
</html>