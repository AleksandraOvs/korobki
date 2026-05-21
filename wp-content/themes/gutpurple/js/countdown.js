function getEndOfDayTimestamp() {
    const now = new Date();
    const end = new Date();
    end.setHours(23, 59, 59, 999);
    return end.getTime();
}

function getSavedEndTime() {
    const saved = localStorage.getItem('endOfDay');
    const now = Date.now();

    if (saved && parseInt(saved) > now) {
        return parseInt(saved);
    } else {
        const newEnd = getEndOfDayTimestamp();
        localStorage.setItem('endOfDay', newEnd);
        return newEnd;
    }
}

function updateCountdown() {
    const hoursEl = document.getElementById('hours');
    const minutesEl = document.getElementById('minutes');
    const secondsEl = document.getElementById('seconds');

    // Если хотя бы одного элемента нет — просто выходим
    if (!hoursEl || !minutesEl || !secondsEl) return;

    const now = Date.now();
    let endTime = getSavedEndTime();
    let diff = endTime - now;

    if (diff <= 0) {
        // Новый день, сбрасываем
        localStorage.removeItem('endOfDay');
        diff = getEndOfDayTimestamp() - now;
        localStorage.setItem('endOfDay', getEndOfDayTimestamp());
    }

    const hours = Math.floor(diff / 1000 / 60 / 60);
    const minutes = Math.floor((diff / 1000 / 60) % 60);
    const seconds = Math.floor((diff / 1000) % 60);

    hoursEl.textContent = String(hours).padStart(2, '0');
    minutesEl.textContent = String(minutes).padStart(2, '0');
    secondsEl.textContent = String(seconds).padStart(2, '0');
}

// Обновляем каждую секунду
setInterval(updateCountdown, 1000);
updateCountdown();