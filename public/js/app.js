$(document).ready(function () {
    if ($(window).width() < 1000) $('nav').addClass('mobile-nav');
    else $('nav').removeClass('mobile-nav');

});

$(window).resize(function () {
    if ($(window).width() < 1000) $('nav').addClass('mobile-nav');
    else $('nav').removeClass('mobile-nav');
});

/*******************
 Helper Functions
 *******************/

/**
 * Converts milliseconds to a human readable string
 *
 * @param {Int} Milliseconds to be formatted
 * @return {String} Returns human readable string
 */
function millisecondsToStr(milliseconds) {
    var s = "";

    function numberEnding(number) {
        return (number > 1) ? 's' : '';
    }

    var temp = Math.floor(milliseconds / 1000);
    var days = Math.floor((temp %= 31536000) / 86400);
    if (days) {
        s += days + ' day' + numberEnding(days) + ' ';
    }
    var hours = Math.floor((temp %= 86400) / 3600);
    if (hours) {
        s += hours + ' hour' + numberEnding(hours) + ' ';
    }
    var minutes = Math.floor((temp %= 3600) / 60);
    if (minutes) {
        s += minutes + ' minute' + numberEnding(minutes) + ' ';
    }
    return s;
}

/**
 * Converts bytes to a human readable string
 *
 * @param {Int} Bytes to be formatted
 * @return {String} Returns human readable string
 */
function bytesToStr(bytes) {
    var sizes = ['Bytes', 'KB', 'MB', 'GB', 'TB'];
    if (bytes == 0) return '0 Byte';
    var i = parseInt(Math.floor(Math.log(bytes) / Math.log(1024)));
    return Math.round(bytes / Math.pow(1024, i), 2) + ' ' + sizes[i];
};

/**
 * Makes huge numbers easier to read by grouping 3 digits
 *
 * @param {Int} Number to be formatted
 * @return {String} Returns human readable string
 */
function commafy(num) {
    var str = num.toString().split('.');
    if (str[0].length >= 5) str[0] = str[0].replace(/(\d)(?=(\d{3})+$)/g, '$1,');
    if (str[1] && str[1].length >= 5) str[1] = str[1].replace(/(\d{3})/g, '$1 ');
    return str.join('.');
}