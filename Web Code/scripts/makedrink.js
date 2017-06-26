$(document).ready(function() {
	$('#make').click(function() {
		console.log("submitted");
		$.ajax({
			url: 'http://192.168.1.1:80/makedrink',
			type: 'post',
			data: {
				drink1: $('#dr1').val(),
				drink2: $('#dr2').val(),
				drink3: $('#dr3').val(),
				drink4: $('#dr4').val()
			},
			headers: {

			},
			dataType: 'text',
			success: function(data) {
                console.log(data)
				if(data == "success!"){
                    alert("Drink poured successfully")
                }
                else if(data == "failure!"){
                    alert("Please insert cup")
                }
			}
		});
	});
});