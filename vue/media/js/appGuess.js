$(document).ready(function()
{
	var underscore, i, lettres, lettresTab, j, secondes, countdown;
	secondes = 61;
	lettres = "";
	underscore = "";
	if (localStorage.login == undefined) {
		window.location.href = 'index.php';
	}
	if (localStorage.ami !== localStorage.tour) {
		window.location.href = 'home.php';
	}
	$('h1').html('Découvrer le mot en vous aidant du dessins et des lettre disponibles ... Bonne chance ' + localStorage.login + ' !!');
	$('button#guessBegin').click(function () {
		$("#guess").fadeIn();
		$.post('http://37.187.20.82:9999/api.js/continueGame', JSON.stringify({'login' : localStorage.login, 'token' : localStorage.token, 'ami' : localStorage.ami, 'idMot' : localStorage.idMot}), function (response) {
			console.log(response);
			if (response.error !== null) {
				$('#erreur').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
			} else {
				$.get("http://37.187.20.82/partie/" + response.data[0].image, function (imageBase64) {
					$('#imageGuess').attr('src', 'data:image/jpeg;base64,' + imageBase64);
					for (i = 0; i < response.data[1].mot.length; i = i + 1) {
						underscore = underscore + ' _ ';
					}
					$('input#mot').attr('maxlength', response.data[1].mot.length);
					$('label#help').html('Le mot est : ' + underscore);
					lettresTab = response.data[1].lettres.split('|');
					for (j = 0; j < lettresTab.length; j = j + 1) {
						lettres = lettres + '<button type="button" class="btn btn-lg btn-default" name="lettres" >' + lettresTab[j] + '</button>';
					}
					$('#lettres').html(lettres);
					countdown = setInterval(function () {
						if (secondes !== 0) {
							secondes = secondes - 1;
							$('h4').html('Il vous reste ' + secondes + ' s !!');
						} else {
							$('h4').html('Fini !!!!!');
							$('#guessFinish').addClass('disabled');
							$.post('http://37.187.20.82:9999/api.js/finishGame', JSON.stringify({'login' : localStorage.login, 'token' : localStorage.token, 'ami' : localStorage.ami, 'idMot' : response.data[1].idMot, 'reponse' : '', 'idPartie' : response.data[0].idPartie}), function () {
								window.location.href = 'home.php';
							});
							clearInterval(countdown);
						}
					}, 1000);
					$('#guessFinish').click(function () {
						clearInterval(countdown);
						$.post('http://37.187.20.82:9999/api.js/finishGame', JSON.stringify({'login' : localStorage.login, 'token' : localStorage.token, 'ami' : localStorage.ami, 'idMot' : response.data[1].idMot, 'reponse' : $('input#mot').val(), 'idPartie' : response.data[0].idPartie}), function () {
							window.location.href = 'home.php';
						});
					});
				});
			}
		});
	});
});