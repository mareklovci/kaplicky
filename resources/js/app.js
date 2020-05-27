require('./bootstrap');

// Center metadata page text
$(document).ready(function () {
    let display_width = $(window).width();

    if (display_width < 720)
    {
        $(".metadata").each(function() {
            let metadata = $(this);
            let width = metadata.width();

            metadata.css("margin-left", (display_width / 2)  - width);
        });
    }
    else
    {
        display_width = $(".metadata-area").width();

        $(".metadata").each(function() {
            let metadata = $(this);
            let width = metadata.width();

            metadata.css("margin-left", (display_width / 2)  - width);
        });
    }
});
