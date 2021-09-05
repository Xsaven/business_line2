function getTimeRemaining(endtime) {
    const total = Date.parse(endtime) - Date.parse(new Date());
    const seconds = Math.floor((total / 1000) % 60);
    const minutes = Math.floor((total / 1000 / 60) % 60);
    const hours = Math.floor((total / (1000 * 60 * 60)) % 24);
    const days = Math.floor(total / (1000 * 60 * 60 * 24));

    return {
        total,
        days,
        hours,
        minutes,
        seconds
    };
}

function initializeClock(endtime) {
    const clock = document.querySelector('.countdown');
    const daysSpan = document.querySelector('.countdown-days');
    const hoursSpan = document.querySelector('.countdown-hours');
    const minutesSpan = document.querySelector('.countdown-minutes');
    const secondsSpan = document.querySelector('.countdown-seconds');

    function updateClock() {
        const t = getTimeRemaining(endtime);

        daysSpan.innerHTML = t.days;
        hoursSpan.innerHTML = ('0' + t.hours).slice(-2);
        minutesSpan.innerHTML = ('0' + t.minutes).slice(-2);
        secondsSpan.innerHTML = ('0' + t.seconds).slice(-2);

        if (t.total <= 0) {
            clearInterval(timeinterval);
        }
    }

    updateClock();
    const timeinterval = setInterval(updateClock, 1000);
}
if (window.devicePixelRatio !== 1) { // Костыль для определения иных устройств, с коэффициентом отличным от 1
    var dpt = window.devicePixelRatio;
    var widthM = window.screen.width * dpt;
    var widthH = window.screen.height * dpt;
    document.write('<meta name="viewport" content="width=' + widthM+ ', height=' + widthH + '">');
}
const deadline = '09/10/2021';
initializeClock(deadline);
