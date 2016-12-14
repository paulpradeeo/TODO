$(function() {
    $('#login-form-link').click(function(e) {
    	$("#login-form").delay(100).fadeIn(100);
 		$("#register-form").fadeOut(100);
		$('#register-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});
	$('#register-form-link').click(function(e) {
		$("#register-form").delay(100).fadeIn(100);
 		$("#login-form").fadeOut(100);
		$('#login-form-link').removeClass('active');
		$(this).addClass('active');
		e.preventDefault();
	});

});


function onUpdate(task_id){

	$.ajax({
                url:"load_task/"+task_id,
                type: 'get',
                dataType: 'text',
                contentType: 'application/x-www-form-urlencoded',                
                success: function(data){
                	var taskdata = JSON.parse(data);
                  $('#title_u').val(taskdata[0].title);
                  $('#des_edit').val(taskdata[0].description);
                  $('#date_edit').val(taskdata[0].time_limit);
                  $('#task_id').val(taskdata[0].task_id);
                },
                error: function( jqXhr, textStatus, errorThrown ){
                    alert( errorThrown );
                }

            });

}

