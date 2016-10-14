/**
 * Created by ben on 10/11/2016.
 * Learned and modified from:
 * https://www.youtube.com/watch?v=AWAnrQCYsVM
 */
function bounceInToContent(className) {
    $(className).each(function (i) {
        setTimeout(function () {
            $(className).eq(i).addClass('is-visible');
        }, 300 + (300 * i));
    });
}
