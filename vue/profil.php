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
	<script src="media/js/appProfil.js"></script>
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
						<li class="active"><a href="profil.php">Profil</a></li>
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
			<div id="image"></div>
			<div id="success"></div>
			<h1></h1>
			<h3 id="erreur"></h3>
			<form id="formProfil" enctype="multipart/form-data">
				<div class="form-group">
					<label class="form-control" for="email">Email</label>
					<input type="email" name="email" id="email" class="form-control" placeholder="Email">
				</div>
				<div class="form-group">
					<label class="form-control" for="naissance">Date de Naissance</label>
					<input type="date" name="naissance" id="naissance" class="form-control">
				</div>
				<div class="form-group">
					<label class="form-control" for="genre">Genre</label>
					<select class="form-control" id="genre" name="genre">
						<option value="Homme">Homme</option>
						<option value="Femme">Femme</option>
					</select>
				</div>
				<div class="form-group">
					<label class="form-control" for="adresse">Adresse</label>
					<input type="text" name="adresse" id="adresse" class="form-control" placeholder="Adresse">
				</div>
				<div class="form-group">
					<label class="form-control" for="ville">Ville</label>
					<input type="text" name="ville" id="ville" class="form-control" placeholder="Ville">
				</div>
				<div class="form-group">
					<label class="form-control" for="pays">Pays</label>
					<select class="form-control" id="pays" name="pays">
						<option value="Afghanistan">Afghanistan</option>
						<option value="Afrique du Sud">Afrique du Sud</option>
						<option value="Albanie">Albanie</option>
						<option value="Algérie">Algérie</option>
						<option value="Allemagne">Allemagne</option>
						<option value="Andorre">Andorre</option>
						<option value="Angola">Angola</option>
						<option value="Anguilla">Anguilla</option>
						<option value="Antigua et Barbuda">Antigua et Barbuda</option>
						<option value="Antilles néerlandaises">Antilles néerlandaises</option>
						<option value="Arabie saoudite">Arabie saoudite</option>
						<option value="Argentine">Argentine</option>
						<option value="Arménie">Arménie</option>
						<option value="Aruba">Aruba</option>
						<option value="Australie">Australie</option>
						<option value="Autriche">Autriche</option>
						<option value="Azerbaïdjan">Azerbaïdjan</option>
						<option value="Bahamas">Bahamas</option>
						<option value="Bahreïn">Bahreïn</option>
						<option value="Bangladesh">Bangladesh</option>
						<option value="Barbade">Barbade</option>
						<option value="Belgique">Belgique</option>
						<option value="Bermudes">Bermudes</option>
						<option value="Bhoutan">Bhoutan</option>
						<option value="Biélorussie">Biélorussie</option>
						<option value="Bolivie">Bolivie</option>
						<option value="Bosnie et Herzégovine">Bosnie et Herzégovine</option>
						<option value="Botswana">Botswana</option>
						<option value="Brunei Darussalam">Brunei Darussalam</option>
						<option value="Brésil">Brésil</option>
						<option value="Bulgarie">Bulgarie</option>
						<option value="Burkina Faso">Burkina Faso</option>
						<option value="Burundi">Burundi</option>
						<option value="Bélize">Bélize</option>
						<option value="Bénin">Bénin</option>
						<option value="Cambodge">Cambodge</option>
						<option value="Cameroun">Cameroun</option>
						<option value="Canada">Canada</option>
						<option value="Cap-Vert">Cap-Vert</option>
						<option value="Centrafrique">Centrafrique</option>
						<option value="Chili">Chili</option>
						<option value="Chine">Chine</option>
						<option value="Chypre">Chypre</option>
						<option value="Colombiae">Colombiae</option>
						<option value="Comores">Comores</option>
						<option value="Congo">Congo</option>
						<option value="Corée du Nord">Corée du Nord</option>
						<option value="Corée du Sud">Corée du Sud</option>
						<option value="Costa Rica">Costa Rica</option>
						<option value="Croatie">Croatie</option>
						<option value="Cuba">Cuba</option>
						<option value="Côte d'Ivoire">Côte d'Ivoire</option>
						<option value="Danemark">Danemark</option>
						<option value="Djibouti">Djibouti</option>
						<option value="Dominique">Dominique</option>
						<option value="El Salvador">El Salvador</option>
						<option value="Espagne">Espagne</option>
						<option value="Estonie">Estonie</option>
						<option value="Fidji">Fidji</option>
						<option value="Finlande">Finlande</option>
						<option value="France">France</option>
						<option value="Gabon">Gabon</option>
						<option value="Gambie">Gambie</option>
						<option value="Ghana">Ghana</option>
						<option value="Gibraltar">Gibraltar</option>
						<option value="Grenade">Grenade</option>
						<option value="Groënland">Groënland</option>
						<option value="Grèce">Grèce</option>
						<option value="Guadeloupe">Guadeloupe</option>
						<option value="Guam">Guam</option>
						<option value="Guatemala">Guatemala</option>
						<option value="Guinée">Guinée</option>
						<option value="Guinée équatoriale">Guinée équatoriale</option>
						<option value="Guinée-Bissau">Guinée-Bissau</option>
						<option value="Guyane">Guyane</option>
						<option value="Guyane française">Guyane française</option>
						<option value="Géorgie">Géorgie</option>
						<option value="Haïti">Haïti</option>
						<option value="Honduras">Honduras</option>
						<option value="Hong Kong">Hong Kong</option>
						<option value="Hongrie">Hongrie</option>
						<option value="Ile Bouvet">Ile Bouvet</option>
						<option value="Ile Christmas">Ile Christmas</option>
						<option value="Ile Heard et iles McDonald">Ile Heard et iles McDonald</option>
						<option value="Ile Maurice">Ile Maurice</option>
						<option value="Ile Norfolk">Ile Norfolk</option>
						<option value="Iles Cayman">Iles Cayman</option>
						<option value="Iles Cocos (Keeling)">Iles Cocos (Keeling)</option>
						<option value="Iles Cook">Iles Cook</option>
						<option value="Iles Falkland (Malouines)">Iles Falkland (Malouines)</option>
						<option value="Iles Faroe">Iles Faroe</option>
						<option value="Iles Marshall">Iles Marshall</option>
						<option value="Iles Northern Mariana">Iles Northern Mariana</option>
						<option value="Iles Salomon">Iles Salomon</option>
						<option value="Iles Vierges, G.B.">Iles Vierges, G.B.</option>
						<option value="Iles Vierges, É.U.">Iles Vierges, É.U.</option>
						<option value="Inde">Inde</option>
						<option value="Indonésie">Indonésie</option>
						<option value="Irak">Irak</option>
						<option value="Iran">Iran</option>
						<option value="Irlande">Irlande</option>
						<option value="Islande">Islande</option>
						<option value="Israël">Israël</option>
						<option value="Italie">Italie</option>
						<option value="Jamaïque">Jamaïque</option>
						<option value="Japon">Japon</option>
						<option value="Jordan">Jordan</option>
						<option value="Kazakhstan">Kazakhstan</option>
						<option value="Kenya">Kenya</option>
						<option value="Kirghizstan">Kirghizstan</option>
						<option value="Kiribati">Kiribati</option>
						<option value="Koweït">Koweït</option>
						<option value="Laos">Laos</option>
						<option value="Lettonie">Lettonie</option>
						<option value="Liban">Liban</option>
						<option value="Libye">Libye</option>
						<option value="Libéria">Libéria</option>
						<option value="Liechtenstein">Liechtenstein</option>
						<option value="Lituanie">Lituanie</option>
						<option value="Luxembourg">Luxembourg</option>
						<option value="Lésotho">Lésotho</option>
						<option value="Macao">Macao</option>
						<option value="Macédoine">Macédoine</option>
						<option value="Madagascar">Madagascar</option>
						<option value="Malaisie">Malaisie</option>
						<option value="Malawi">Malawi</option>
						<option value="Maldives">Maldives</option>
						<option value="Mali">Mali</option>
						<option value="Malte">Malte</option>
						<option value="Maroc">Maroc</option>
						<option value="Martinique">Martinique</option>
						<option value="Mauritanie">Mauritanie</option>
						<option value="Mayotte">Mayotte</option>
						<option value="Mexique">Mexique</option>
						<option value="Moldavie">Moldavie</option>
						<option value="Monaco">Monaco</option>
						<option value="Mongolie">Mongolie</option>
						<option value="Montserrat">Montserrat</option>
						<option value="Mozambique">Mozambique</option>
						<option value="Myanmar (Birmanie)">Myanmar (Birmanie)</option>
						<option value="Namibie">Namibie</option>
						<option value="Nauru">Nauru</option>
						<option value="Nicaragua">Nicaragua</option>
						<option value="Niger">Niger</option>
						<option value="Nigéria">Nigéria</option>
						<option value="Niue">Niue</option>
						<option value="Norvège">Norvège</option>
						<option value="Nouvelle Calédonie">Nouvelle Calédonie</option>
						<option value="Nouvelle-Zélande">Nouvelle-Zélande</option>
						<option value="Népal">Népal</option>
						<option value="Oman">Oman</option>
						<option value="Ouganda">Ouganda</option>
						<option value="Ouzbékistan">Ouzbékistan</option>
						<option value="Pakistan">Pakistan</option>
						<option value="Palau">Palau</option>
						<option value="Palestine">Palestine</option>
						<option value="Panama">Panama</option>
						<option value="Papouasie Nouvelle Guinée">Papouasie Nouvelle Guinée</option>
						<option value="Paraguay">Paraguay</option>
						<option value="Pays-Bas">Pays-Bas</option>
						<option value="Philippines">Philippines</option>
						<option value="Pitcairn">Pitcairn</option>
						<option value="Pologne">Pologne</option>
						<option value="Polynésie française">Polynésie française</option>
						<option value="Portugal">Portugal</option>
						<option value="Puerto Rico">Puerto Rico</option>
						<option value="Pérou">Pérou</option>
						<option value="Qatar">Qatar</option>
						<option value="Roumanie">Roumanie</option>
						<option value="Royaume-Uni">Royaume-Uni</option>
						<option value="Russie">Russie</option>
						<option value="Rwanda">Rwanda</option>
						<option value="République Démocratique du Congo">République Démocratique du Congo</option>
						<option value="République dominicaine">République dominicaine</option>
						<option value="République tchèque">République tchèque</option>
						<option value="Réunion, île de la">Réunion, île de la</option>
						<option value="Sahara Ouest">Sahara Ouest</option>
						<option value="Saint-Kitts et Nevis">Saint-Kitts et Nevis</option>
						<option value="Saint-Pierre et Miquelon">Saint-Pierre et Miquelon</option>
						<option value="Saint-Vincent et Les Grenadines">Saint-Vincent et Les Grenadines</option>
						<option value="Sainte-Hélène">Sainte-Hélène</option>
						<option value="Sainte-Lucie">Sainte-Lucie</option>
						<option value="Samoa">Samoa</option>
						<option value="amoa américaine">Samoa américaine</option>
						<option value="San Marino">San Marino</option>
						<option value="San Tomé et Principe">San Tomé et Principe</option>
						<option value="Seychelles">Seychelles</option>
						<option value="Sierra Leone">Sierra Leone</option>
						<option value="Singapour">Singapour</option>
						<option value="Slovaquie">Slovaquie</option>
						<option value="Slovénie">Slovénie</option>
						<option value="Somalie">Somalie</option>
						<option value="Soudan">Soudan</option>
						<option value="Sri Lanka">Sri Lanka</option>
						<option value="St-George et les iles Sandwich">St-George et les iles Sandwich</option>
						<option value="Suisse">Suisse</option>
						<option value="Surinam">Surinam</option>
						<option value="Suède">Suède</option>
						<option value="Svalbard et Jan Mayen">Svalbard et Jan Mayen</option>
						<option value="Swaziland">Swaziland</option>
						<option value="Syrie">Syrie</option>
						<option value="Sénégal">Sénégal</option>
						<option value="Tadjikistan">Tadjikistan</option>
						<option value="Tanzanie">Tanzanie</option>
						<option value="Taïwan">Taïwan</option>
						<option value="Tchad">Tchad</option>
						<option value="Territoire britannique de l'Océan Indien">Territoire britannique de l'Océan Indien</option>
						<option value="Territoires français du Sud">Territoires français du Sud</option>
						<option value="Thaïlande">Thaïlande</option>
						<option value="Timor Est">Timor Est</option>
						<option value="Togo">Togo</option>
						<option value="Tokelau">Tokelau</option>
						<option value="Tonga">Tonga</option>
						<option value="Trinidad et Tobago">Trinidad et Tobago</option>
						<option value="Tunisie">Tunisie</option>
						<option value="Turkmenistan">Turkmenistan</option>
						<option value="Turks et iles Caicos">Turks et iles Caicos</option>
						<option value="Turquie">Turquie</option>
						<option value="Tuvalu">Tuvalu</option>
						<option value="Ukraine">Ukraine</option>
						<option value="United States Minor Outlying Islands">United States Minor Outlying Islands</option>
						<option value="Uruguay">Uruguay</option>
						<option value="Vanuatu">Vanuatu</option>
						<option value="Vatican, cité du">Vatican, cité du</option>
						<option value="Vietnam">Vietnam</option>
						<option value="Vénézuela">Vénézuela</option>
						<option value="Wallis et Futuna">Wallis et Futuna</option>
						<option value="Yougoslavie">Yougoslavie</option>
						<option value="Yémen">Yémen</option>
						<option value="Zambie">Zambie</option>
						<option value="Zimbabwé">Zimbabwé</option>
						<option value="Égypte">Égypte</option>
						<option value="Émirats arabes unis">Émirats arabes unis</option>
						<option value="Équateur">Équateur</option>
						<option value="Érythrée">Érythrée</option>
						<option value="États fédérés de Micronésie">États fédérés de Micronésie</option>
						<option value="États-Unis">États-Unis</option>
						<option value="Éthiopie">Éthiopie</option>
					</select>
				</div>
				<div class="form-group">
					<button type="button" class="btn btn-primary form-control" name="valider" id="profil">Changer Profil</button>
				</div>
			</form>
			<form id="updateAvatar" enctype="multipart/form-data">
			<div class="form-group">
				<label class="form-control" for="avatar">Choisir Avatar</label>
				<input type="file" name="imageAvatar" id="imageAvatar" class="form-control" accept="image/*">
				<input type="hidden" name="avatarLogin" value="" id="avatarLogin">
				<input type="hidden" name="avatarToken" value="" id="avatarToken">
			</div>
			<div class="form-group">
				<button type="button" class="btn btn-primary form-control" name="valider" id="avatar">Changer Avatar</button>
			</div>
		</form>
	</div>
</div>
</body>
</html>