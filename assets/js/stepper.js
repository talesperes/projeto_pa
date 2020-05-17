$(document).ready( function() {

	var current_fs, next_fs, previous_fs; //fieldsets
	var opacity;
	var validate_flag;
	var validate_password;

	$(".next").click( function() {

		validate_flag = 0;
		validate_password = [];

		current_fs = $(this).parent();
		next_fs = $(this).parent().next();

		$(".validate-error").remove();

		current_fs.find('.validate-stepper').each( function() {
			if (!$(this).val()) {
				$("<small class='validate-error'>Esse campo não pode ser vazio.</small>").css("color", "red").insertAfter($(this));
				validate_flag++;
			}
		});

		current_fs.find('.validate-password').each( function() {
			validate_password.push($(this).val());
		});

		if(!(validate_password.every( (val, i, arr) => val === arr[0]))){
			current_fs.find('.validate-password').each( function() {
				$("<small class='validate-error'>As senhas precisam ser iguais.</small>").css("color", "red").insertAfter($(this));
			});
			validate_flag++;
		}
		
		if(!validate_flag) {

			//Add Class Active
			$("#progressbar li").eq($("fieldset").index(next_fs)).addClass("active");

			//show the next fieldset
			next_fs.show();
			//hide the current fieldset with style
			current_fs.animate({opacity: 0}, {
				step: function(now) {
					// for making fielset appear animation
					opacity = 1 - now;

					current_fs.css({
						'display': 'none',
						'position': 'relative'
					});
					next_fs.css({'opacity': opacity});
				},
			duration: 600
			});
		}
	});

	$(".previous").click( function() {

		current_fs = $(this).parent();
		previous_fs = $(this).parent().prev();

		//Remove class active
		$("#progressbar li").eq($("fieldset").index(current_fs)).removeClass("active");

		//show the previous fieldset
		previous_fs.show();

		//hide the current fieldset with style
		current_fs.animate({opacity: 0}, {
			step: function(now) {
				// for making fielset appear animation
				opacity = 1 - now;

				current_fs.css({
				'display': 'none',
				'position': 'relative'
				});
				previous_fs.css({'opacity': opacity});
			},
		duration: 600
		});
	});

	$('.radio-group .radio').click(function(){
		$(this).parent().find('.radio').removeClass('selected');
		$(this).addClass('selected');
	});

	$(".submit").click(function(){
		return false;
	})

});