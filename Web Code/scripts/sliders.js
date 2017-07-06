$(window).load(function(){
    var sliders = $("#sliders .slider");

    sliders.each(function() {
        var value = parseInt($(this).text(), 10),
            availableTotal = 100;

        $(this).empty().slider({
            value: 0,
            min: 0,
            max: 100,
            range: "min",
            step: 1,
            animate: 100,
            create: function(event, ui) {

                // Get current total
                var total = 0;    

                sliders.not(this).each(function() {
                    total += $(this).value;
                });    


                var max = availableTotal - total;            

                if (max - ui.value >= 0) {
                    // Need to do this because apparently jQ UI
                    // does not update value until this event completes
                    total += ui.value;
                    $(this).siblings().text(ui.value);
                } else {
                    return false;
                }
            }
        });
    });
});