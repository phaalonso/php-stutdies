//const $ = require('jquery');

$(document).ready(() => {
	// Armazena a referencia para nao precisar percorrer
	// a DOM html procurando novamente
	const nomeInput = $('#nome');
	const senhaInput = $('#senha');
	const form = $('form');
	
	nomeInput.val("");
	senhaInput.val("");

	function mudou () {
		if ($(this).val() === "") {
			$(this).css('border-color', 'red');
		} else {
			$(this).css('border-color', "");
		}
	}

	//nomeInput.focusout(mudou);
	//senhaInput.focusout(mudou);
	
	$('#deslogar').click(() => {
		$.get('./src/control/deslogar.php', () => {
			alert('Deslogado');
		}).fail(() => {
			alert('Voce nao esta logado');
		});
	});

	nomeInput.on('keyup', mudou);
	senhaInput.on('keyup', mudou);

	form.submit((e) => {
		e.preventDefault();
		
		const formData = form.serialize(); 

		$.post('src/control/process.php', formData, (data) => {
			console.log(data.responseJSON);
			location.href = './src/view/final.php';
		}, "json").fail(({ responseJSON }) => {
			const { error, missing } = responseJSON;

			if (error) {
				$('#error').text(error).css('display', 'contents')

				// Para cada valor de missing, pesquise pela sua 
				// propriedade e troque a cor da borda para vermelho
				missing.map(name => {
					$(`#${name}`).css('border-color', 'red');
				});
			}

		});

	});
});
