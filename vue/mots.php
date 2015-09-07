<!DOCTYPE html>
<html>
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
	<script src="media/js/appMots.js"></script>
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
						<li class="active"><a href="mots.php">Mots</a></li>
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
			<div id="erreur"></div>
			<input type="text" name="mot" id="mot" class="form-control" placeholder="Le mot que la persone doit dessiner !!!">
			<input type="text" name="lettre" id="lettre" class="form-control" placeholder="Ecrivez les lettres et n'oubliez pas que le mot doit pouvoir s'ecrire !!">
			<button type="button" class="btn btn-primary form-control" name="createMot" id="createMot">Creer le mot !!</button>
		</div>
	</div>
</body>
</html>