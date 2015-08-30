function chk() {
	if ($("#pass").val() != "" && $("#pass").val() != " "){
		if($("#pass").val() !== ($("#cpass").val())){
			$('#submit').addClass('disabled');
		}
		else{
			$('#submit').removeClass('disabled');
		}
	}
	else
		$('#submit').addClass('disabled');
}
function resettxt() {
	$('#uname').val("");
	$('#pass').val("");
	$('#cpass').val("");
}
function notify(string){
	$.notify(string,{
		className: 'success',
		globalPosition: 'top center'
	});
}
$(document).ready(function() {
	$('.usert').click(function() {
		$('.usert').addClass('active');
		$('.bust').removeClass('active');
		$('.settingt').removeClass('active');
		$('#one').css('display', 'block');
		$('#two').css('display', 'none');
		$('#three').css('display', 'none');
	});
	$('.bust').click(function() {
		$('.usert').removeClass('active');
		$('.bust').addClass('active');
		$('.settingt').removeClass('active');
		$('#one').css('display', 'none');
		$('#two').css('display', 'block');
		$('#three').css('display', 'none');
	});
	$('.settingt').click(function() {
		$('.usert').removeClass('active');
		$('.bust').removeClass('active');
		$('.settingt').addClass('active');
		$('#one').css('display', 'none');
		$('#two').css('display', 'none');
		$('#three').css('display', 'block');
	});
	$('#submit').click(function(){
		$.post('../insertusers.php',
			{
				uname: $('#uname').val(),
				pword: $('#pass').val()
			}
		);
		var message = $('#uname').val() + " has been added to the database.";
		notify(message);
		resettxt();
	});
});