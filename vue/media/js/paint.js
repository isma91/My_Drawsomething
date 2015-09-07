/*jslint browser: true, node : true*/
/*jslint devel : true*/
/*global $, jQuery, alert, window*/
$(document).ready(function () {
    "use strict";
    var canvas, context, colorContour, colorInterne, colorShadow, largeur, shadow, pos, type, trait, rectangleCreux, rectanglePlein, cercleCreux, cerclePlein, url, departClique, departMove, img, img64, request, formData, blob;
    if (localStorage.login == undefined) {
        window.location.href = 'index.php';
    }
    if (localStorage.ami == undefined) {
        window.location.href = 'home.php';
    }
    $('#dessiner').html('Veuillez dessiner ceci : ' + localStorage.mot + ' ');
    colorContour = document.getElementById('colorContour').value;
    colorInterne = document.getElementById('colorInterne').value;
    largeur = document.getElementById('largeur').value;
    canvas = document.getElementById('paint');
    context = canvas.getContext('2d');
    pos = $('canvas#paint').offset();
    trait = [];
    rectangleCreux = [];
    rectanglePlein = [];
    cercleCreux = [];
    cerclePlein = [];
    departClique = false;
    departMove = false;
    $('input#colorContour').change(function () {
        colorContour = document.getElementById('colorContour').value;
    });
    $('input#colorInterne').change(function () {
        colorInterne = document.getElementById('colorInterne').value;
    });
    $('input#colorShadow').change(function () {
        colorShadow = document.getElementById('colorShadow').value;
    });
    $('input#largeur').change(function () {
        largeur = document.getElementById('largeur').value;
        $('div#valueLargeur').html(largeur);
    });
    $('input#shadow').change(function () {
        shadow = document.getElementById('shadow').value;
        $('div#valueShadow').html(shadow);
    });
    $('button#trait').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'trait';
    });
    $('button#rectangleCreux').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'rectangleCreux';
    });
    $('button#rectanglePlein').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'rectanglePlein';
    });
    $('button#cercleCreux').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'cercleCreux';
    });
    $('button#cerclePlein').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'cerclePlein';
    });
    $('button#crayon').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'crayon';
    });
    $('button#gomme').click(function () {
        $('button').css('border', '1px solid transparent');
        $(this).css('border', '5px solid red');
        type = 'gomme';
    });
    $('button#erase').click(function () {
        context.clearRect(0, 0, canvas.width, canvas.height);
    });
    $('button#save').click(function () {
        url = canvas.toDataURL("image/png", 1.0).replace("image/png", "image/octet-stream");
        window.location.href = url;
    });
    $('button#finish').click(function () {
        img = canvas.toDataURL("image/png");
        img64 = img.replace('data:image/png;base64,');
        img64 = img64.substr(9);
        blob = new Blob([img64], { type: "image/png,base64"});
        request = new XMLHttpRequest();
        request.open("POST", "http://37.187.20.82:9999/api.js/playPartie", true);
        formData = new FormData();
        formData.append("login", localStorage.login);
        formData.append("token", localStorage.token);
        formData.append("ami", localStorage.ami);
        formData.append("imagePartie", blob);
        request.send(formData);
        $('#success').html('<div class="alert alert-success" role="alert">Vous allez etre rediriger vers la page HOME !!</div>')
        setTimeout(function(){ window.location.href = 'home.php'; }, 3000);
    });
    $('canvas#paint').on("mousedown", function () {
        if (type === 'crayon' || type === 'gomme') {
            departClique = true;
        }
    });
    $('canvas#paint').on("mouseup", function () {
        if (type === 'crayon' || type === 'gomme') {
            departClique = false;
            departMove = false;
        }
    });
    $('canvas#paint').click(function (event) {
        if (type === 'trait') {
            trait.push(event.pageX - pos.left, event.pageY - pos.top);
            context.beginPath();
            context.shadowBlur = shadow;
            context.shadowColor = colorShadow;
            context.moveTo(trait[0], trait[1]);
            context.lineTo(trait[2], trait[3]);
            context.strokeStyle = colorInterne;
            context.lineWidth = largeur;
            context.stroke();
        }
        if (trait.length >= 4) {
            trait = [];
        }
        if (type === 'rectangleCreux') {
            rectangleCreux.push(event.pageX - pos.left, event.pageY - pos.top);
            context.beginPath();
            context.shadowBlur = shadow;
            context.shadowColor = colorShadow;
            context.rect(rectangleCreux[0], rectangleCreux[1], (rectangleCreux[2] - rectangleCreux[0]), (rectangleCreux[3] - rectangleCreux[1]));
            context.strokeStyle = colorContour;
            context.lineWidth = largeur;
            context.stroke();
        }
        if (rectangleCreux.length >= 3) {
            rectangleCreux = [];
        }
        if (type === 'rectanglePlein') {
            rectanglePlein.push(event.pageX - pos.left, event.pageY - pos.top);
            context.beginPath();
            context.shadowBlur = shadow;
            context.shadowColor = colorShadow;
            context.fillRect(rectanglePlein[0], rectanglePlein[1], (rectanglePlein[2] - rectanglePlein[0]), (rectanglePlein[3] - rectanglePlein[1]));
            context.fillStyle = colorInterne;
            context.strokeStyle = colorContour;
            context.lineWidth = largeur;
            context.stroke();
        }
        if (rectanglePlein.length >= 3) {
            rectanglePlein = [];
        }
        if (type === 'cercleCreux') {
            cercleCreux.push(event.pageX - pos.left, event.pageY - pos.top);
            context.beginPath();
            if (cercleCreux[0] > cercleCreux[2]) {
                context.shadowBlur = shadow;
                context.shadowColor = colorShadow;
                context.arc(cercleCreux[0], cercleCreux[1], Math.sqrt(Math.pow(cercleCreux[0] - cercleCreux[2], 2) + Math.pow(cercleCreux[1] - cercleCreux[3], 2)), 0, 2 * Math.PI);
                context.strokeStyle = colorContour;
                context.lineWidth = largeur;
                context.stroke();
            } else {
                context.shadowBlur = shadow;
                context.shadowColor = colorShadow;
                context.arc(cercleCreux[0], cercleCreux[1], Math.sqrt(Math.pow(cercleCreux[2] - cercleCreux[0], 2) + Math.pow(cercleCreux[3] - cercleCreux[1], 2)), 0, 2 * Math.PI);
                context.strokeStyle = colorContour;
                context.lineWidth = largeur;
                context.stroke();
            }
        }
        if (cercleCreux.length >= 3) {
            cercleCreux = [];
        }
        if (type === 'cerclePlein') {
            cerclePlein.push(event.pageX - pos.left, event.pageY - pos.top);
            context.beginPath();
            if (cerclePlein[0] > cerclePlein[2]) {
                context.shadowBlur = shadow;
                context.shadowColor = colorShadow;
                context.arc(cerclePlein[0], cerclePlein[1], Math.sqrt(Math.pow(cerclePlein[0] - cerclePlein[2], 2) + Math.pow(cerclePlein[1] - cerclePlein[3], 2)), 0, 2 * Math.PI);
                context.fill();
                context.fillStyle = colorInterne;
                context.strokeStyle = colorContour;
                context.lineWidth = largeur;
                context.stroke();
            } else {
                context.shadowBlur = shadow;
                context.shadowColor = colorShadow;
                context.arc(cerclePlein[0], cerclePlein[1], Math.sqrt(Math.pow(cerclePlein[2] - cerclePlein[0], 2) + Math.pow(cerclePlein[3] - cerclePlein[1], 2)), 0, 2 * Math.PI);
                context.fill();
                context.fillStyle = colorInterne;
                context.strokeStyle = colorContour;
                context.lineWidth = largeur;
                context.stroke();
            }
        }
        if (cerclePlein.length >= 3) {
            cerclePlein = [];
        }
    });
    $('canvas#paint').on("mousemove", function (event) {
        if (type === 'crayon' || type === 'gomme') {
            if (departClique === true) {
                if (departMove === false) {
                    context.beginPath();
                    context.moveTo(event.pageX - pos.left, event.pageY - pos.top);
                    departMove = true;
                } else {
                    context.lineTo(event.pageX - pos.left, event.pageY - pos.top);
                    if (type === 'crayon') {
                        context.shadowBlur = shadow;
                        context.shadowColor = colorShadow;
                        context.strokeStyle = colorInterne;
                        context.lineWidth = largeur;
                    }
                    if (type === 'gomme') {
                        context.shadowBlur = 0;
                        context.shadowColor = colorShadow;
                        context.strokeStyle = '#ffffff';
                        context.lineWidth = largeur;
                    }
                    context.stroke();
                }
            }
        }
    });
});