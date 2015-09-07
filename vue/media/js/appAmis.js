$(document).ready(function()
{
	var ami, erreur, compteurErreur, user, i, amisSend, amisReceiv, amis, validerAmis, refuserAmis, userRefuserAmi;
	compteurErreur = 0;
	if (localStorage.login == undefined) {
		window.location.href = 'index.php';
	}
	user = {'login' : localStorage.login, 'token' : localStorage.token};
	$.post('http://37.187.20.82:9999/api.js/userAmisSend', JSON.stringify(user), function (response) {
		if (response.error == null) {
			if (response.data.length == 0) {
				$('#amisSend').html('<tr><td>PAS DE DEMANDE</td><td>D\'AMIS FAIT ENCORE</td></tr>');
			} else {
				for (i = 0; i < response.data.length; i = i + 1) {
					amisSend = amisSend + '<tr><td>' + response.data[i].login + '</td><td>' + response.data[i].reponse + '</td></tr>';
				}
				amisSend = amisSend.substr(9);
				$('#amisSend').html(amisSend);
			}
		} else {
			$('#erreur').html('Erreur lors de la récuperation des demande d\'ami fait !! Refresh la page pour re-essayer !!');
		}
	}, 'json');
	$.post('http://37.187.20.82:9999/api.js/userAmisReceiv', JSON.stringify(user), function (response) {
		if (response.error == null) {
			if (response.data.length == 0) {
				$('#amisReceiv').html('<tr><td>PAS DE DEMANDE</td><td>D\'AMIS RECUT FOREVER ALONE</td></tr>');
			} else {
				for (i = 0; i < response.data.length; i = i + 1) {
					amisReceiv = amisReceiv + '<tr><td>' + response.data[i].login + '</td><td><img class="valider ' + response.data[i].login + '" src="media/css/validate.png" alt="valider"><img class="refuser ' + response.data[i].login + '" src="media/css/cross.png" alt="refuser"></td></tr>';
				}
				amisReceiv = amisReceiv.substr(9);
				$('#amisReceiv').html(amisReceiv);
			}
			$('.valider').click(function () {
				validerAmis = $(this).attr('class').split(' ');
				validerAmis = validerAmis[1];
				userValiderAmi = {'login' : localStorage.login, 'token' : localStorage.token, 'ami' : validerAmis};
				$.post('http://37.187.20.82:9999/api.js/userValiderAmi', JSON.stringify(userValiderAmi), function (reponse) {
					console.log(reponse);
					if (response.error == null) {
						$('div#successValider').html('<div class="alert alert-success" role="alert">Ami valider avec succès !!!</div>');
					}
				});
			});
			$('.refuser').click(function () {
				refuserAmis = $(this).attr('class').split(' ');
				refuserAmis = refuserAmis[1];
				userRefuserAmi = {'login' : localStorage.login, 'token' : localStorage.token, 'ami' : refuserAmis};
				$.post('http://37.187.20.82:9999/api.js/userRefuserAmi', JSON.stringify(userRefuserAmi), function (reponse) {
					console.log(reponse);
					if (response.error == null) {
						$('div#successValider').html('<div class="alert alert-success" role="alert">Ami refuser avec succès !!!</div>');
					}
				});
			});
			} else {
				$('#erreur').html('Erreur lors de la récuperation des demande d\'ami fait !! Refresh la page pour re-essayer !!');
			}
		}, 'json');
		$.post('http://37.187.20.82:9999/api.js/userAmis', JSON.stringify(user), function (response) {
		if (response.error == null) {
			if (response.data.length == 0) {
				$('#amis').html('<tr><td>PAS D\'AMIS ENCORE !!!</td></tr>');
			} else {
				for (i = 0; i < response.data.length; i = i + 1) {
					amis = amis + '<tr><td>' + response.data[i].login + '</td></tr>';
				}
				amis = amis.substr(9);
				$('#amis').html(amis);
			}
			$('.valider').click(function () {
				var validerAmis = $(this).attr('class').split(' ');
				validerAmis = validerAmis[1];
				userValiderAmi = {'login' : localStorage.login, 'token' : localStorage.token, 'ami' : validerAmis};
				$.post('http://37.187.20.82:9999/api.js/userValiderAmi', JSON.stringify(userValiderAmi), function (reponse) {
					console.log(reponse);
				});
			});
			} else {
				$('#erreur').html('Erreur lors de la récuperation de vos amis !! Refresh la page pour re-essayer !!');
			}
		}, 'json');
	$('h1').html('Ajouter vos amis à My Drawsomething ' + localStorage.login + ' !!');
	$('button#ajout').click(function () {
		if ($('input[name=login]').val() === localStorage.login) {
			erreur = "Vous ne pouvez pas vous ajouter en ami FOREVER ALONE !!";
			compteurErreur = compteurErreur + 1;
		}
		if ($('input[name=login]').val().length < 1) {
			erreur = "Vous ne pouvez pas vous ajouter en ami VIDE POKER FACE !!";
			compteurErreur = compteurErreur + 1;
		}
		$('#erreur').html(erreur);
		ami = {"login" : localStorage.login, "token" : localStorage.token ,"ami" : $('input[name=login]').val()};
		if (compteurErreur == 0) {
			$.post('http://37.187.20.82:9999/api.js/ajoutAmi', JSON.stringify(ami), function (response) {
				console.log(response);
				if (response.error == null) {
					$('div#successDemande').html('<div class="alert alert-success" role="alert">Demande d\'ami fait avec succès !!!</div>');
				} else {
					$('div#erreurDemande').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
				}
			}, 'json');
		}
		compteurErreur = 0;
	});
});