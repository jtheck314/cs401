$(function() {
	$(".fadeout").click(function () {
		$(this).parent(".bad").fadeOut(500);
	});
});
$(function() {
	$(".fadeout").click(function () {
		$(this).parent(".badphp").fadeOut(500);
	});
});
$(function() {

	$("#newUser.f").submit(function(e) {
		e.preventDefault();
		var values = $("#newUser.f").serialize();
		var errors = [0, 0, 0, 0, 0];

		if(/\W+|^$/.test($("#firstName").val())){
			errors[0] = 1;
		}
		else{
			$("#0.bad").fadeOut(500);
		}

		if(/\W+|^$/.test($("#lastName").val())){
			errors[1] = 1;
		}
		else{
			$("#1.bad").fadeOut(500);
		}

		if(!/\w{5,}/.test($("#password").val())){
			errors[2] = 1;
		}
		else{
			$("#2.bad").fadeOut(500);
		}

		if(!/\w+[\@]\w+[\.]\w+/.test($("#email").val())){
			errors[3] = 1;
		}
		else{
			$("#3.bad").fadeOut(500);
		}

		if(!/\(?[0-9]{3}\)?\-?[0-9]{3}\-?[0-9]{4}/.test($("#phone").val())){
			errors[4] = 1;
		}
		else{
			$("#4.bad").fadeOut(500);
		}
		
		$.ajax({
			type: "POST",
			url: "newUser_handler.php",
			data: values,
			success: function(){
				if(errors[0] == 1){
					$("#0.bad").show();
				}
				if(errors[1] == 1){
					$("#1.bad").show();
				}
				if(errors[2] == 1){
					$("#2.bad").show();
				}
				if(errors[3] == 1){
					$("#3.bad").show();
				}
				if(errors[4] == 1){
					$("#4.bad").show();
				}
				if(errors[0] == 0 && errors[1] == 0 && errors[2] == 0 && errors[3] == 0 && errors[4] == 0){
					window.location = "photographs.php";
				}

			},
			error: function(){
				alert("Failure");
			}
		});
	});
});

