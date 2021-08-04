$(document).ready(function() {

	$('input#phone-number').mask("+7 (999) 999-99-99");

	$('.btn__action').on('click', function(event) {
		event.preventDefault();
		$('.popup').fadeIn();
	});
	$('.popup__close').on('click', function(event) {
		event.preventDefault();
		$('.popup').fadeOut();
	});

	$('.popup__form').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: '../mailer/smart.php',
			type: 'POST',
			data: $(this).serialize()
		})
		.done(function() {
			$('.popup__message').fadeIn();
			$('.popup__message').delay(3000).fadeOut();
			$(this).find("input").val("");
			$("form#form").trigger('reset');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('.builder__form').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: 'mailer/smart.php',
			type: 'POST',
			data: $(this).serialize()
		})
		.done(function() {
			$('.builder__form-message').fadeIn();
			$('.builder__form-message').delay(3000).fadeOut();
			$(this).find("input").val('');
			$("form#form").trigger('reset');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('.app__form').submit(function(event) {
		event.preventDefault();
		$.ajax({
			url: 'mailer/smart.php',
			type: 'POST',
			data: $(this).serialize()
		})
		.done(function() {
			$(this).find("input").val("");
			alert("СООБЩЕНИЕ УСПЕШНО ОТПРАВЛЕНО, НАШ МЕНЕДЖЕР СКОРО С ВАМИ СВЯЖЕТСЯ");
			$(this).find("input").val('');
			$("form#form").trigger('reset');
		})
		.fail(function() {
			console.log("error");
		})
		.always(function() {
			console.log("complete");
		});
		
	});

	$('.header__burger').click(function(event) {
		$('.header__burger, .header__menu').toggleClass('active');
	});
});