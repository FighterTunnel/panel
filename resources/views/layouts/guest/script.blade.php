<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
    integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
    crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="{{ asset('guests/js/scripts.js') }}"></script>
<script src="{{ asset('guests/js/jquery.countdown.min.js') }}"></script>
<script>
    // set date timzeone to Asia/Jakarta
    Intl.DateTimeFormat().resolvedOptions().timeZone = 'Asia/Jakarta';
    var now = new Date();
    const getResetTime = () => {
        var resetTime = [];
        var resetTime = @json(getResetTime());
        var closestTime = resetTime.reduce(function(prev, curr) {
            return (Math.abs(curr - now) < Math.abs(prev - now) ? curr : prev);
        });
        return closestTime;
    }
    var closestTime = getResetTime();
    if (closestTime === undefined) {
        closestTime = '00:00';
    } else if (closestTime == '00:00') {
        closestTime = 24;
    } else {
        closestTime = parseInt(closestTime);
    }
    closestTime = new Date(now.getFullYear(), now.getMonth(), now.getDate(), closestTime, 0, 0);
    // Set the date we're counting down to
    var countDownDate = new Date(closestTime).getTime();
    // Update the count down every 1 second
    $('#clock2').countdown(countDownDate, function(event) {
        var $this = $(this).html(event.strftime('Reset in: %H:%M:%S'));
    });
    $('#clockwelcome').countdown(countDownDate, function(event) {
        var $this = $(this).html(event.strftime('Reset in: %H:%M:%S'));
    });

    // set the resetTime element to time H:i
</script>
<script src="https://unpkg.com/aos@2.3.1/dist/aos.js"></script>
<script>
    AOS.init({
        disable: 'mobile',
        duration: 600,
        once: true,
    });
</script>
<script src="{{ asset('guests/js/script.min.js') }}"></script>

<!-- Custom scripts -->
<script src="{{ asset('js/toastr.js') }}"></script>
<script src="{{ asset('js/sweetalert.js') }}"></script>

<script src="{{ asset('js/anti-adblock-killer.user.js') }}"></script>
<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id={{ getSeoSettings('google_analytics') }}"></script>
<script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
        dataLayer.push(arguments);
    }
    gtag('js', new Date());

    gtag('config', '{{ getSeoSettings('google_analytics') }}');
</script>

@if (getSeoSettings('histats_code'))
    {!! getSeoSettings('histats_code') !!}
@endif
@yield('scripts')
