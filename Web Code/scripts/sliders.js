$(window).load(function(){
    var sliders = $("#sliders .slider");

    sliders.each(function() {
        var value = $(this).val(),
            availableTotal = 100;

        $(this).empty().slider({
            highlight: true,
            theme: "a",
            trackTheme: "a",
            value: 0,
            min: 0,
            max: 100,
            step: 10,
            slide: function(event, ui) {
                console.log("test")
                // Get current total
                var total = 0;    

                sliders.not(this).each(function() {
                    console.log("Value:")
                    console.log($(this).slider( "option", "value" ))
                    total += $(this).slider( "option", "value" );
                });
                console.log("Total:")
                console.log(total)

                var max = availableTotal - total;
                
                if (max - $(this).slider( "option", "value" ) >= 0) {
                    console.log("test 2")
                    // Need to do this because apparently jQ UI
                    // does not update value until this event completes
                    total += $(this).slider( "option", "value" );
                    //$(this).siblings().text($(this).slider( "option", "value" ));
                } else {
                    $(this).slider( "option", "value", max );
                }
            }
        });
    });
});