$(document).ready(function()
{
	if (localStorage.login !== undefined) {
		window.location.href = 'home.php';
	}
	var form, i, erreur, inscription, compteurErreur, formData, requete, formConnexion, j, erreurConnexion, compteurErreurConnexion, connexion, fileImage, reader, read;
	compteurErreur = 0;
	compteurErreurConnexion = 0;
	$('button#inscription').click(function () {
		form = $('form#formInscription').serializeArray();
		for (i = 0; i < form.length; i = i + 1) {
			if (form[i].value.length < 1) {
				if (form[i].name == "adresse" || form[i].name == "ville") {
				} else {
					compteurErreur = compteurErreur + 1;
					erreur = erreur + "Votre " + form[i].name + " ne peut etre vide !!<br/>";
				}
			}
			if (form[1].value !== form[2].value) {
				compteurErreur = compteurErreur + 1;
				erreur = erreur + "Vous n'avez pas ecrit deux fois le meme pass !!!<br/>";
			}
		}
		if (erreur !== undefined) {
			erreur = erreur.substr(9);
		}
		$('h3#erreur').html(erreur);
		erreur = "";
		if (compteurErreur == 0) {
			inscription = {"login" : form[0].value, "password" : form[1].value, "email" : form[3].value, "date" : form[4].value , "genre" : form[5].value, "adresse" : form[6].value, "ville" : form[7].value, "pays" : form[8].value, "avatar" : null};
			$.post('http://37.187.20.82:9999/api.js/inscription', JSON.stringify(inscription), function (response) {
				console.log(response);
				if (response.error == null) {
					$('div#inscriptionSuccess').html('<div class="alert alert-success" role="alert">Inscrpition fait avec succès !!!</div>');
				}
			}, 'json');
		}
		compteurErreur = 0;
	});

	$('button#connexion').click(function () {
		formConnexion = $('form#formConnexion').serializeArray();
		for (j = 0; j < formConnexion.length; j = j + 1) {
			if (formConnexion[j].value.length < 1) {
				erreurConnexion = erreurConnexion + "Votre " + formConnexion[j].name + " ne peut etre vide !!<br/>";
				compteurErreurConnexion = compteurErreurConnexion + 1;
			}
		}
		if (erreurConnexion !== undefined) {
			erreurConnexion = erreurConnexion.substr(9);
		}
		if (compteurErreurConnexion == 0) {
			connexion = {"login" : formConnexion[0].value, "password" : formConnexion[1].value};
			$.post('http://37.187.20.82:9999/api.js/connexion', JSON.stringify(connexion), function (response) {
				console.log(response);
				if (response.error == null) {
					localStorage.setItem("login",response.data[0].login);
					localStorage.setItem("token",response.data[0].token);
					window.location = 'home.php';
				}
			});
		}
	});
});