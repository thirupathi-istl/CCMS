let idleTime = 0;
let timeout = 900; 
let warningTime =timeout-120; 
let warningShown = false;
let timerInterval;

setInterval(timerIncrement, 1000); // 1 second

document.onclick = document.onkeypress = function () {
    idleTime = 0;
    if (!warningShown) {
        refreshSession();
    }
};

function timerIncrement() {
    idleTime++;
    if (idleTime >= warningTime && idleTime < timeout && !warningShown) {
        showModal();
        warningShown = true;
        startTimer();
    } else if (idleTime >= timeout) {
        checkSession();
    }
}

function startTimer() {
    let minutes = 2;
    let seconds = 0;
    updateTimer();

    function updateTimer() {
        let displayMinutes = minutes.toString().padStart(2, '0');
        let displaySeconds = seconds.toString().padStart(2, '0');
        document.getElementById('timeout_count').innerText = `${displayMinutes}:${displaySeconds}`;
    }

    function decrementTime() {
        if (seconds === 0) {
            if (minutes === 0) {
                clearInterval(timerInterval);
                return;
            } else {
                minutes--;
                seconds = 59;
            }
        } else {
            seconds--;
        }
        updateTimer();
    }

    timerInterval = setInterval(decrementTime, 1000);
}

function refreshSession() {
    fetch('../session/session-check.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'action=refresh'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'logout') {
            window.location.href = 'logout.php';
        }
    });
}

function checkSession() {

    fetch('../session/session-check.php', {
        method: 'POST',
        headers: {
            'Content-Type': 'application/x-www-form-urlencoded'
        },
        body: 'action=logout'
    })
    .then(response => response.json())
    .then(data => {
        if (data.status === 'logout') {
            window.location.href = 'logout.php';
        }
    });
}

function extendSession() {
    idleTime = 0;
    refreshSession();
    hideModal();
    warningShown = false;
}

function logout() {
    idleTime = 0;
    window.location.href = 'logout.php';
    warningShown = false;
}

function showModal() {
    document.getElementById('popup').style.display = 'flex';
}

function hideModal() {
    document.getElementById('popup').style.display = 'none';
}


