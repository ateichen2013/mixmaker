$(document).ready(function() {
	$('#make').click(function() {
		console.log("submitted");
		$.ajax({
			url: 'http://131.91.4.35:70/makedrink',
			type: 'post',
			data: {
				drink1: $('#dr1').text(),
				drink2: $('#dr2').text(),
				drink3: $('#dr3').text(),
				drink4: $('#dr4').text()
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