$(document).ready(function()
{
	var i, allMot, j, partiesSend, partiesReceiv, k;
	if (localStorage.login == undefined) {
		window.location.href = 'index.php';
	}
	$('h1').html('Bienvenue à My Drawsomething ' + localStorage.login + ' !!');
	$.post('http://37.187.20.82:9999/api.js/userPartiesSend', JSON.stringify({'login' : localStorage.login, 'token' : localStorage.token}), function (response) {
		if (response.error !== null) {
			partiesSend = '<tr><td>' + response.error + '</td></tr>';
		} else {
			console.log(response);
			for (j = 0; j < response.data.length; j = j + 1) {
				if (response.data[j].etat == "en cours") {
					partiesSend = partiesSend + '<tr><td>' + response.data[j].login + '</td></tr>';
				}
			}
			partiesSend = partiesSend.substr(9);
		}
		$('#partiesSend').html(partiesSend);
	});
	$.post('http://37.187.20.82:9999/api.js/userPartiesReceiv', JSON.stringify({'login' : localStorage.login, 'token' : localStorage.token}), function (response) {
		if (response.error !== null) {
			partiesReceiv = '<tr><td>' + response.error + '</td></tr>';
		} else {
			console.log(response);
			for (k = 0; k < response.data.length; k = k + 1) {
				if (response.data[k].etat == "en cours") {
					partiesReceiv = partiesReceiv + '<tr><td>' + response.data[k].login + '</td><td><button type="button" class="btn btn-primary form-control continueGame" name="continueGame" id="' + response.data[k].login + ' /:/ ' + response.data[k].id_mot + '">Deviner le mot !!</button></td></tr>';
				}
			}
			partiesReceiv = partiesReceiv.substr(9);
		}
		$('#partiesReceiv').html(partiesReceiv);
		$('button[name=continueGame]').click(function () {
			localStorage.setItem('ami', $(this).attr('id').split(' /:/ ')[0]);
			localStorage.setItem('idMot', $(this).attr('id').split(' /:/ ')[1]);
			localStorage.setItem('tour', $(this).attr('id').split(' /:/ ')[0]);
			window.location.href = 'guess.php';
		});
	});
	$('#newGame').click(function () {
		$.post('http://37.187.20.82:9999/api.js/allMot', JSON.stringify({'login': localStorage.login, 'token': localStorage.token}), function (response) {
			console.log(response);
			if (response.error !== null) {
			} else {
				allMot = '<div class="form-group"><label class="form-control">Choisir le mot</label><select class="form-control">';
				for (i = 0; i < response.data.length; i = i + 1) {
					allMot = allMot + '<option value="' + response.data[i].mot + '">' + response.data[i].mot + '</option>';
				}
				allMot = allMot + '</select></div>';
				$('#mots').html(allMot);
			}
		}, 'json');
		$("#jouer").fadeIn();
	});
	$('#createGame').click(function () {
		$.post('http://37.187.20.82:9999/api.js/createGame', JSON.stringify({'login': localStorage.login, 'token': localStorage.token, 'ami': $('input#login').val(), 'mot' : $("select option:selected").text()}), function (response) {
			if (response.error !== null) {
				$('#erreur').html('<div class="alert alert-danger" role="alert">' + response.error + '</div>');
			} else {
				localStorage.setItem("ami", $('input#login').val());
				localStorage.setItem("mot", $("select option:selected").text());
				localStorage.setItem("tour", localStorage.login);
				window.location.href = 'paint.php';
			}
		}, 'json');
	});
});