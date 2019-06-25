timeLeft()
header()

function timeLeft() {

    let start = new Date;
    start.setHours(21, 0, 0);

    function pad(num) {
        return ("0" + parseInt(num)).substr(-2); // uitzoeken wat dit doet
    }

    function tick() {
        let now = new Date;
        if (now > start) {
            start.setDate(start.getDate() + 1); // Als de tijd groter is dan start.setHours voeg extra dag toe
        }
        let remain = ((start - now) / 1000);
        let hh = pad((remain / 60 / 60) % 60);
        let mm = pad((remain / 60) % 60);
        let ss = pad(remain % 60);
        document.getElementById('timeLeft').innerHTML =
            hh + ":" + mm + ":" + ss;
        setTimeout(tick, 1000);
    }

    document.addEventListener('DOMContentLoaded', tick); // iedere tick uitvoeren (60x p/s)

}

function header() {
    //afbeeldingen inladen
}