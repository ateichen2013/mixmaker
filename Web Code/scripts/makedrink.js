function MakeDrink(dr1, dr2, dr3, dr4) {
    console.log("submitted");
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
            if(data == "success!"){
                alert("Drink poured successfully")
            }
            else if(data == "failure!"){
                alert("Please insert cup")
            }
        }
    });
}

function SaveDrinkSlider() {
    console.log("saved");
}

function MakeDrinkSlider() {
    console.log("submitted");
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
            if(data == "success!"){
                alert("Drink poured successfully")
            }
            else if(data == "failure!"){
                alert("Please insert cup")
            }
        }
    });
}