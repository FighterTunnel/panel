"use strict";
// Class definition
// set date timzeone to Asia/Jakarta
Intl.DateTimeFormat().resolvedOptions().timeZone = "Asia/Jakarta";
const ResetTimeCountdown = (function (resetTime) {
    // Private functions
    var now = new Date();
    const getResetTime = (resetTime) => {
        var resetTime = [];
        var resetTime = resetTime;
        var closestTime = resetTime.filter(function (time) {
            // if time is 00:00, set it to 24:00
            if (time === "00:00") {
                time = 24;
            } else {
                time = parseInt(time);
            }
            // get hours and minutes
            return time > now.getHours();
        })[0];
        return closestTime;
    };

    const _setCountdown = (resetTime) => {
        var closestTime = getResetTime(resetTime);
        if (closestTime === undefined) {
            closestTime = "00:00";
        } else if (closestTime === "00:00") {
            closestTime = "24:00";
        } else {
            closestTime = parseInt(closestTime);
        }
        closestTime = parseInt(closestTime);
        if (closestTime == 24) {
            closestTime = new Date(
                now.getFullYear(),
                now.getMonth(),
                now.getDate() + 1,
                0,
                0,
                0
            );
        } else {
            closestTime = new Date(
                now.getFullYear(),
                now.getMonth(),
                now.getDate(),
                closestTime,
                0,
                0
            );
        }
        // Set the date we're counting down to
        var countDownDate = new Date(closestTime).getTime();

        // using jquery countdown plugin
        $("#clock2").countdown(countDownDate, function (event) {
            $(this).html(event.strftime("Reset in: %H:%M:%S"));
        });
        $("clockwelcome").countdown(countDownDate, function (event) {
            $(this).html(event.strftime("Reset in: %H:%M:%S"));
        });
    };

    // public functions
    return {
        init: function () {
            _setCountdown(resetTime);
        },
    };
})();
