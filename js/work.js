


document.getElementById('loginopen').onclick = function () {
    if (document.getElementById('openlogin')) {
        var fertigkeitenfeld = document.getElementById('openlogin');
        fertigkeitenfeld.style.visibility = 'visible';


    }
}


document.getElementById('close').onclick = function () {
    if (document.getElementById('openlogin')) {
        var fertigkeitenfeld = document.getElementById('openlogin');
        fertigkeitenfeld.style.visibility = 'hidden';


    }
}


document.getElementById('newaccopen').onclick = function () {
    if (document.getElementById('opennewacc')) {
        var newaccopen = document.getElementById('opennewacc');
        newaccopen.style.visibility = 'visible';


    }
}



document.getElementById('close2').onclick = function () {
    if (document.getElementById('opennewacc')) {
        var fertigkeitenfeld = document.getElementById('opennewacc');
        fertigkeitenfeld.style.visibility = 'hidden';


    }
}
