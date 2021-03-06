$(window).load(function() {
    console.log("loaded");
    
    $('*').enhanceWithin();
    
    sliders = $("#sliders .slider");
	$(".slider").on("change", function(event, ui) {
        console.log("moved");
		var total = 0;
		sliders.not(this).each(function() {
			total += parseInt($(this).val());
		});
		if (total + parseInt($(this).val()) > 100) {
			$(this).val(100 - total).slider("refresh");
		}
	});
});

$( document ).ready(function() {
	$("#Randomize").click(function() {
		n1 = 0;
		n2 = 0;
		n3 = 0;
		n4 = 0;
		while (n1 + n2 + n3 + n4 != 100) {
			n1 = Math.floor(Math.random() * 100);
			n2 = Math.floor(Math.random() * 100);
			n3 = Math.floor(Math.random() * 100);
			n4 = Math.floor(Math.random() * 100);
		}
		$("#slider1").val(n1).slider("refresh");
		$("#slider2").val(n2).slider("refresh");
		$("#slider3").val(n3).slider("refresh");
		$("#slider4").val(n4).slider("refresh");
	});

	$("#MakeDrinkSlider").click(function() {
		console.log("submitted");
        document.getElementById('audio').play();
		$.ajax({
			url: 'http://10.10.0.29:80/makedrink',
			type: 'post',
			data: {
				drink1: $("#slider1").val(),
				drink2: $("#slider2").val(),
				drink3: $("#slider3").val(),
				drink4: $("#slider4").val()
			},
			headers: {

			},
			dataType: 'text',
			success: function(data) {
				console.log(data)
				if (data == "success!") {
					alert("Drink poured successfully")
				} else if (data == "failure!") {
					alert("Please insert cup")
				}
			}
		});
	});
    
    $('#save').click(function() {
        var name = prompt("Please enter a drink name:");
        
        if (name === "") {
            // user pressed OK, but the input field was empty
            console.log("User pressed OK with empty field");
        } else if (name) {
            // user typed something and hit OK
            console.log("User entered text and hit OK");
            $.ajax({
                url: 'http://10.10.0.1/PHP/save.php',
                type:'POST',
                data:
                {
                    drinkname: name,
                    drink1: $("#slider1").val(),
                    drink2: $("#slider2").val(),
                    drink3: $("#slider3").val(),
                    drink4: $("#slider4").val()
                },
                success:function(data) {
                  alert("Drink Saved"); 
                }
            });
        } else {
            // user hit cancel
            console.log("User hit cancel")
        }
    });
    
    $('.reset').click(function() {
        $("#slider1").val(0).slider("refresh");
		$("#slider2").val(0).slider("refresh");
		$("#slider3").val(0).slider("refresh");
		$("#slider4").val(0).slider("refresh");
    });
});

function DeleteDrink(id) {
    console.log("Deleting:")
    console.log(id)
    $.ajax({
        url: 'http://10.10.0.1/PHP/delete.php',
        type:'POST',
        data:
        {
            drinkid: id
        },
        success:function(data) {
          alert("Drink Deleted"); 
        }
    });
}

function MakeDrink(dr1, dr2, dr3, dr4) {
	console.log("submitted");
    document.getElementById('audio').play();
	$.ajax({
		url: 'http://10.10.0.29:80/makedrink',
		type: 'post',
		data: {
			drink1: dr1,
			drink2: dr2,
			drink3: dr3,
			drink4: dr4
		},
		headers: {

		},
		dataType: 'text',
		success: function(data) {
			console.log(data)
			if (data == "success!") {
				alert("Drink poured successfully")
			} else if (data == "failure!") {
				alert("Please insert cup")
			}
		}
	});
}