$(document).ready(function()
{
	var erreur;
	if (localStorage.login == undefined) {
		window.location.href = 'index.php';
	}
	$('h1').html('Commener à creer un mot à dessiner sur My Drawsomething ' + localStorage.login + ' !!')
	$('#createMot').click(function () {
		if ($('#mot').val().length < 4) {
			erreur = erreur + "Le mots doit avoir au moins 4 characteres !! <br/>";
		} else {
			if ($('#lettre').val().length < 10) {
				erreur = erreur + "Vous devez mettre au moins 10 characteres !! <br/>";
			} else {
				$.post('http://37.187.20.82:9999/api.js/createMot', JSON.stringify({'login': localStorage.login, 'token': localStorage.token, 'mot': $('#mot').val(), 'lettres': $('#lettre').val()}), function (response) {
					console.log(response);
					if (response.error !== null) {
						$('#erreur').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
					} else {
						$('#success').html('<div class="alert alert-success" role="alert">Mot creer avec success !!!</div>');
					}
				}, 'json');
			}
		}
		if (erreur !== undefined) {
			erreur = erreur.substr(9);
			$('#erreur').html('<div class="alert alert-danger" role="alert">' + erreur + '</div>');
		}
	});
});