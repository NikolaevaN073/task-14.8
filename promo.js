const entryTime = document.querySelector('#specialPromo').innerHTML;
const timer = document.querySelector('#timer');

document.addEventListener('DOMContentLoaded', function () {
    const entryDate = new Date(Date.parse(entryTime));  
    const addOneDay = +(entryTime.substring(8, 10)) + 1;
    const deadline = new Date(entryDate.setDate(addOneDay));
    let timerId = null;

    function timerStart () {
        const diff = deadline - new Date();
        
        if (diff <= 0) {
            clearInterval(timerId);
        }
        const hours = diff > 0 ? Math.floor(diff / 1000 / 60 / 60) % 24 : 0;
        const minutes = diff > 0 ? Math.floor(diff / 1000 / 60) % 60 : 0;
        const seconds = diff > 0 ? Math.floor(diff / 1000) % 60 : 0;

        let hh = hours < 10 ? '0' + hours : hours;
        let mm = minutes < 10 ? '0' + minutes : minutes;
        let ss = seconds < 10 ? '0' + seconds : seconds;

        timer.textContent = hh + ':' + mm + ':' + ss;
    }
    timerStart();
    timerId = setInterval(timerStart, 1000);
})
