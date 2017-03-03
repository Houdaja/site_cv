/*$(document).ready(function(){

});  C'est la même chose que celle d'en bas mais en plus long*/

$(function(){

	$('form').submit(function(){
		var nom = $('#nom').val();
		var email = $('#email').val();
		var telephone = $('#telephone').val();
		var objet = $('#objet').val();
		var message = $('#message').val();
		$.ajax({

			url:'front/recupMail.php',
			type:'POST',
			data: {nom:nom,email:email,telephone:telephone,objet:objet,message:message},
			dataType:'json',
			success: function(html){

				if(html.errors){
					$('#messageRetour').text('');
					$('#messageRetour').append('<div class="alert alert-danger">'+html.message+'</div>').show();

					console.log(html);

				}else{
					
					$('#messageRetour').text('');
					$('#messageRetour').append('<div class="alert alert-success">'+html.message+'</div>').show();

					setTimeout(setMessageRetourTrue,500);
					setTimeout(setMessageRetourFalse,3000);
					

					 nom = $('#nom').val('');
					 email = $('#email').val('');
					 telephone = $('#telephone').val('');
					 objet = $('#objet').val('');
					 message = $('#message').val('');

					}

			},

			error: function(error){

				alert("probleme de requête");

			}
		});

		return false;

	});

});

function setMessageRetourFalse(){

	$('#messageRetour').stop().animate({

		opacity : 0
	},500);
}

function setMessageRetourTrue(){

	$('#messageRetour').animate({

		opacity : 1
	},500);
}