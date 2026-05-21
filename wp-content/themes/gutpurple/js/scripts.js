// ================= RELOAD STYLES =================
function reloadGutenbergStyles() {
    const styles = [
        '/wp-includes/css/dist/block-library/style.min.css',
        '/wp-includes/css/dist/block-library/theme.min.css'
    ];

    styles.forEach(href => {
        if (!document.querySelector(`link[href*="${href}"]`)) {
            const link = document.createElement('link');
            link.rel = 'stylesheet';
            link.href = href;
            document.head.appendChild(link);
        }
    });
}

// ================= INIT =================
function initFrontend() {

    initFancybox();
    initSmoothScroll();
    initArrowUp();
    initMenu();
    initDropdowns();
    initNumbers();
    initSwiper();
    initFaq();

}

// ================= FANCYBOX =================
function initFancybox() {
    if (typeof Fancybox !== 'undefined') {
        Fancybox.bind("[data-fancybox]", {
            autoFocus: true,
        });
    }
}

// ================= SMOOTH SCROLL =================
function smoothScrollToElement(selector, duration = 700) {
    const target = document.querySelector(selector);
    if (!target) return;

    document.documentElement.style.scrollBehavior = "auto";

    const element = document.scrollingElement || document.documentElement;
    const start = element.scrollTop;
    const targetTop = target.getBoundingClientRect().top + start - 160;
    const change = targetTop - start;
    const startTime = performance.now();

    function easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
    }

    function animateScroll(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easedProgress = easeInOutQuad(progress);

        element.scrollTop = start + change * easedProgress;

        if (elapsed < duration) {
            requestAnimationFrame(animateScroll);
        } else {
            document.documentElement.style.scrollBehavior = "";
        }
    }

    requestAnimationFrame(animateScroll);
}

function smoothScrollToTop(duration = 700) {
    const element = document.scrollingElement || document.documentElement;
    const start = element.scrollTop;
    const change = -start;
    const startTime = performance.now();

    function easeInOutQuad(t) {
        return t < 0.5 ? 2 * t * t : -1 + (4 - 2 * t) * t;
    }

    function animateScroll(currentTime) {
        const elapsed = currentTime - startTime;
        const progress = Math.min(elapsed / duration, 1);
        const easedProgress = easeInOutQuad(progress);

        element.scrollTop = start + change * easedProgress;

        if (elapsed < duration) {
            requestAnimationFrame(animateScroll);
        }
    }

    requestAnimationFrame(animateScroll);
}

function initSmoothScroll() {

    if (window.smoothScrollInit) return;
    window.smoothScrollInit = true;

    document.addEventListener('click', function (e) {
        const link = e.target.closest('a[href^="#"]');
        if (!link) return;

        const href = link.getAttribute("href");
        if (href === "#") return;

        e.preventDefault();
        smoothScrollToElement(href, 800);
    });

}

// ================= ARROW UP =================
function initArrowUp() {
    const upArrow = document.querySelector('.arrow-up');
    if (!upArrow) return;

    if (upArrow.dataset.init) return;
    upArrow.dataset.init = "true";

    upArrow.addEventListener('click', (e) => {
        e.preventDefault();
        smoothScrollToTop(800);
    });

    window.addEventListener('scroll', () => {
        if (window.scrollY > 300) {
            upArrow.classList.add('show');
        } else {
            upArrow.classList.remove('show');
        }
    });
}

// ================= MENU =================
function initMenu() {
    if (window.menuInit) return;

    const body = document.body;
    const menu = document.querySelector('.mobile-menu');
    const burger = document.querySelector('.menu-toggle');

    document.addEventListener('click', function (e) {
        if (!menu || !burger) return;

        if (e.target.closest('.menu-toggle')) {
            e.preventDefault();
            burger.classList.toggle('active');
            menu.classList.toggle('active');
            body.classList.toggle('_fixed');
            return;
        }

        if (e.target.closest('.mobile-menu .main-navigation a')) {
            burger.classList.remove('active');
            menu.classList.remove('active');
            body.classList.remove('_fixed');
            return;
        }

        if (!e.target.closest('.mobile-menu') && !e.target.closest('.menu-toggle')) {
            burger.classList.remove('active');
            menu.classList.remove('active');
            body.classList.remove('_fixed');
        }
    });

    window.menuInit = true;
}

// ================= DROPDOWNS =================
function initDropdowns() {
    const body = document.body;
    const menuItems = document.querySelectorAll('.menu-item-has-children');

    menuItems.forEach(item => {

        if (item.dataset.init) return;
        item.dataset.init = "true";

        const link = item.querySelector('a');
        const dropdown = item.querySelector('.dropdown-menu');

        if (!link || !dropdown) return;

        link.addEventListener('click', (e) => {
            const isOpen = dropdown.classList.contains('show');

            if (!isOpen) {
                e.preventDefault();

                document.querySelectorAll('.dropdown-menu.show').forEach(openDropdown => {
                    openDropdown.classList.remove('show');
                });

                dropdown.classList.add('show');
                body.classList.add('fixed');
            }
        });

        document.addEventListener('click', (event) => {
            if (!item.contains(event.target)) {
                dropdown.classList.remove('show');
                if (!document.querySelector('.dropdown-menu.show')) {
                    body.classList.remove('fixed');
                }
            }
        });

        dropdown.addEventListener('mouseleave', () => {
            dropdown.classList.remove('show');
            if (!document.querySelector('.dropdown-menu.show')) {
                body.classList.remove('fixed');
            }
        });
    });
}

// ================= NUMBERS =================
function animateNumbers(elements, duration = 1500) {
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
    if (!numbersBlock) return;

    if (numbersBlock.dataset.init) return;
    numbersBlock.dataset.init = "true";

    const animEls = numbersBlock.querySelectorAll('.js-anim-numbers');
    if (!animEls.length) return;

    let isAnim = false;

    function scrollTracking() {
        if (isAnim) return;

        const rect = numbersBlock.getBoundingClientRect();
        const windowHeight = window.innerHeight;

        if (rect.top <= windowHeight && rect.bottom >= 0) {
            isAnim = true;

            animEls.forEach(el => el.classList.add('_show'));

            setTimeout(() => animateNumbers(animEls), 800);

            window.removeEventListener('scroll', scrollTracking);
        }
    }

    window.addEventListener('scroll', scrollTracking);
    scrollTracking();
}

// ================= SWIPER =================
function initSwiper() {
    const slider = document.querySelector('.slider-feedback');
    if (!slider) return;

    if (window.feedbackSwiper) {
        window.feedbackSwiper.destroy(true, true);
    }

    window.feedbackSwiper = new Swiper(".slider-feedback", {
        slidesPerView: 1,
        spaceBetween: 20,
        navigation: {
            nextEl: ".slider__button-next",
            prevEl: ".slider__button-prev",
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
    });
}

// ================= FAQ =================
function initFaq() {
    const faqButtons = document.querySelectorAll(".faq-question");

    faqButtons.forEach(btn => {
        btn.addEventListener("click", () => {
            // родительский элемент faq-item
            const parent = btn.closest(".faq-item");

            // ответ внутри faq-item
            const answer = parent.querySelector(".faq-answer");

            // если у тебя есть иконка внутри вопроса
            const icon = btn.querySelector(".faq-icon");

            // переключаем класс active
            parent.classList.toggle("active");
            if (icon) icon.classList.toggle("active");

            // плавное раскрытие/сворачивание
            if (parent.classList.contains("active")) {
                answer.style.maxHeight = answer.scrollHeight + "px";
            } else {
                answer.style.maxHeight = null;
            }
        });
    });
}

// ================= START =================
document.addEventListener('DOMContentLoaded', initFrontend);

// важно для AJAX
window.initFrontend = initFrontend;

// ================= DEBUG =================
window.debugStyles = function () {

    const styles = [...document.styleSheets];

    const result = styles.map((sheet, index) => {
        let href = sheet.href || 'INLINE STYLE';

        let rulesCount = null;

        try {
            rulesCount = sheet.cssRules ? sheet.cssRules.length : 0;
        } catch (e) {
            rulesCount = 'NO ACCESS (CORS)';
        }

        return {
            index,
            href,
            rules: rulesCount
        };
    });

    console.table(result);
    return result;
};