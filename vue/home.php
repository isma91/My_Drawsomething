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
	<script src="media/js/appHome.js"></script>
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
						<li class="active"><a href="home.php">Home</a></li>
						<li><a href="amis.php">Amis</a></li>
						<li><a href="profil.php">Profil</a></li>
						<li><a href="mots.php">Mots</a></li>
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
			<button type="button" class="btn btn-primary form-control" name="newGame" id="newGame">Nouvelle partie</button>
		</div>
		<div class="jumbotron" id="jouer">
			<div class="form-group" id="mots"></div>
			<input type="text" name="login" id="login" class="form-control" placeholder="Login de votre ami pour jouer avec lui !!!">
			<button type="button" class="btn btn-primary form-control" name="createGame" id="createGame">Demarrer le jeux !!</button>
		</div>
		<div class="jumbotron">
			<h2>Les parties que vous devez attendre le tour de votre ami !!!</h2>          
			<div class="table-responsive">
				<table class="table">
					<thead>
						<tr>
							<th>Login</th>
						</tr>
					</thead>
					<tbody id="partiesSend">
					</tbody>
				</table>
			</div>
		</div>
		<div class="jumbotron">
			<h2>Vos amis attendent votre tour !!!</h2>
			<div class="table-responsive">          
				<table class="table">
					<thead>
						<tr>
							<th>Login</th>
						</tr>
					</thead>
					<tbody id="partiesReceiv">
					</tbody>
				</table>
			</div>
		</div>
	</div>
</body>
</html>