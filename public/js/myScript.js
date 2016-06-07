$(document).ready(function()
{
	/*
	 * ******************** ADD. ********************
	 */
	// Subcategorías
	var formSub = $('.add-sub');
	formSub.on('submit', function()
	{
		$.ajax({
			type: formSub.attr('method'),
			url: formSub.attr('action'),
			data: formSub.serialize(),
			success: function(data)
			{
				$('.error').html('');
				$('.success').hide().html('');
				if(data.success == false)
				{
					var errors = '';
						errors += '<div class="alert alert-warning">';
						errors += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						errors += '<h4><i class="fa fa-exclamation-triangle fa-fw"></i> Por favor corrige los siguentes errores:</h4>';
					for(datos in data.errors)
					{
						errors += '<li>' + data.errors[datos] + '</li>'
					}
						errors += '</div>';
					$('.error').html(errors);
				}else{
					var successMessage = '';
						successMessage += '<div class="alert alert-success">';
						successMessage += '<button type="button" class="close" data-dismiss="alert">&times;</button>';
						successMessage += '<p><i class="fa fa-check fa-fw"></i>' + data.message + '</p>';
						successMessage += '</div>';
					$(formSub)[0].reset();
					location.reload();								
					$('#myModal').modal('hide');
					//$('.success').show().html(successMessage).fadeOut(4000);
				}
			},
			error: function(errors)
			{
				$('.error').html(errors);
			}
		});
		return false;
	});
	
	// End Subcategorías
});
