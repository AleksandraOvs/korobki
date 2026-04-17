function animateNumbers(elements, duration = 3500) {
    elements.forEach(el => {
        const target = parseInt(el.dataset.target || el.textContent, 10);
        let start = 0;

        el.textContent = '0';

        const stepTime = Math.max(Math.floor(duration / target), 20);
        const increment = Math.ceil(target / (duration / stepTime));

        const timer = setInterval(() => {
            start += increment;
            if (start >= target) {
                start = target;
                clearInterval(timer);
            }
            el.textContent = start;
        }, stepTime);
    });
}

function initNumbers() {
    const numbersBlock = document.querySelector('#numbers');
    if (!numbersBlock) return; // ❗ полностью выходим, если блока нет

    const animEls = numbersBlock.querySelectorAll('.js-anim-numbers');
    if (!animEls.length) return;

    let isAnim = false;

    function scrollTracking() {
        const rect = numbersBlock.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        // блок появился в зоне видимости
        if (rect.top <= windowHeight && rect.bottom >= 0) {
            isAnim = true;

            animEls.forEach(el => el.classList.add('_show'));

            setTimeout(() => animateNumbers(animEls, 1500), 800);

            window.removeEventListener('scroll', scrollTracking); // ❗ убираем слушатель
        }
    }

    window.addEventListener('scroll', scrollTracking);
    scrollTracking(); // проверка при загрузке
}

window.addEventListener('DOMContentLoaded', initNumbers);