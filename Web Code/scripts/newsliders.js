$(window).load(function(){
    var sliders = $("#sliders .slider");
    
    sliders.each(function() {
        $(this).slider({
            max:350,
            min:100,
            step:10,
            value:100,
            animate: 'true',
            highlight: true,
            theme: "a",
            trackTheme: "a",
            create: function (event, ui) {
                $(this).bind('change', function (event, ui) {
                    console.log(typeof $(this).attr("value"))
                });
            }
        });
    });
});