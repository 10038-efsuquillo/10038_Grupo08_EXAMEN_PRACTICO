$(document).ready(function() {
    var timer = 4000;
    var i = 0;
    var max = $('#c > li').length;

    function nextSlide() {
        $("#c > li").removeClass('active');

        if (i < max - 3) { // Display 3 elements at a time
            i = i + 3;
        } else {
            i = 0;
        }

        for (var j = 0; j < 3; j++) {
            $("#c > li").eq(i + j).css('left', (j * 33.33) + '%').addClass('active').css('transition-delay', (0.5 + j * 0.25) + 's');
        }
    }

    nextSlide(); // Call the function once when the page loads

    setInterval(nextSlide, timer);
});
