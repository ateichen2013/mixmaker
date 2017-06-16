var sliders = $("#sliders .slider");

sliders.each(function() {
    var value = parseInt($(this).text(), 10),
        availableTotal = 400;

    $(this).empty().slider({
        value: 0,
        min: 0,
        max: 400,
        range: "max",
        step: 10,
        animate: 100,
        slide: function(event, ui) {

            // Get current total
            var total = 0;    
            
            sliders.not(this).each(function() {
                total += $(this).slider("option", "value");
            });    
            

            var max = availableTotal - total;            
                
            if (max - ui.value >= 0) {
                // Need to do this because apparently jQ UI
                // does not update value until this event completes
                total += ui.value;
                console.log(max-ui.value);
                $(this).siblings().text(ui.value);
            } else {
                return false;
            }
        }
    });
});