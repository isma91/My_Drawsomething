$(document).ready(function()
{
	var form, compteurErreur, profil, erreur, fileImage, reader, read, match, formData, request;
	compteurErreur = 0;
	if (localStorage.login == undefined) {
		window.location.href = 'index.php';
	}
	$('h1').html('Bienvenue à votre panel Profil ' + localStorage.login + ' !!');
	user = {'login' : localStorage.login, 'token' : localStorage.token};
	$.post('http://37.187.20.82:9999/api.js/userInfo', JSON.stringify(user), function (response) {
		console.log(response);
		$('#image').html('<img class="img-rounded img-circle" src="http://37.187.20.82/avatar/' + response.data[0].avatar + '" alt="avatar" >');
		$('input[name=email]').val(response.data[0].email);
		$('input[name=naissance]').val(response.data[0].date);
		$('#genre option[value="'+ response.data[0].genre + '"]').prop('selected', true);
		$('input[name=adresse]').val(response.data[0].adresse);
		$('input[name=ville]').val(response.data[0].ville);
		$('input[name=pays]').val(response.data[0].pays);
		$('#pays option[value="'+ response.data[0].pays + '"]').prop('selected', true);
		$('#avatarLogin').val(localStorage.login);
		$('#avatarToken').val(localStorage.token);
	}, 'json');
	$('button#profil').click(function () {
		form = $('form#formProfil').serializeArray();
		for (i = 0; i < form.length; i = i + 1) {
			if (form[i].value.length < 1) {
				if (form[i].name == "adresse" || form[i].name == "ville") {
				} else {
					compteurErreur = compteurErreur + 1;
					erreur = erreur + "Votre " + form[i].name + " ne peut etre vide !!<br/>";
				}
			}
		}
		if (erreur !== undefined) {
			erreur = erreur.substr(9);
		}
		$('h3#erreur').html(erreur);
		erreur = "";
		if (compteurErreur == 0) {
			profil = {"login" : localStorage.login, "token" : localStorage.token ,"email" : form[0].value, "date" : form[1].value , "genre" : form[2].value, "adresse" : form[3].value, "ville" : form[4].value, "pays" : form[5].value};
			$.post('http://37.187.20.82:9999/api.js/changeUserInfo', JSON.stringify(profil), function (response) {
				console.log(response);
				if (response.error == null) {
					$('div#success').html('<div class="alert alert-success" role="alert">Profil mise a jour avec succès !!!</div>');
				}
			}, 'json');
		}
	});
	$('button#avatar').click(function (event) {
		request = new XMLHttpRequest();
		request.open("POST", "http://37.187.20.82:9999/api.js/changeUserAvatar", true);
		formData = new FormData();
		formData.append("login", localStorage.login);
		formData.append("token", localStorage.token);
		formData.append("imageAvatar", $('#imageAvatar')[0].files[0]);
		request.send(formData);
	});
	compteurErreur = 0;
});