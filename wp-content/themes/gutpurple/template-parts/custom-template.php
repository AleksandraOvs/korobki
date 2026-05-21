<?php

$template_id = $args['id'] ?? 0;

if (!$template_id) return;

/**
 * =========================
 * HERO
 * =========================
 */
$title = carbon_get_post_meta($template_id, 'hero_title');
$subtitle = carbon_get_post_meta($template_id, 'hero_subtitle');
$bg = carbon_get_post_meta($template_id, 'hero_bg');
$btn_link = carbon_get_post_meta($template_id, 'hero_btn_link');
$btn_text = carbon_get_post_meta($template_id, 'hero_btn_text');

if ($title || $subtitle) : ?>

    <section class="hero">

        <?php if ($bg): ?>
            <div class="hero__bg">
                <?= wp_get_attachment_image($bg, 'full'); ?>
            </div>
        <?php endif; ?>

        <div class="hero__content">
            <div class="container">

                <?php if ($title): ?>
                    <h1 class="hero__title"><?= esc_html($title); ?></h1>
                <?php endif; ?>

                <?php if ($subtitle): ?>
                    <div class="hero__subtitle"><?= wp_kses_post($subtitle); ?></div>
                <?php endif; ?>

                <?php if ($btn_link && $btn_text): ?>
                    <a class="button" href="<?= esc_url($btn_link); ?>">
                        <?= esc_html($btn_text); ?>
                    </a>
                <?php endif; ?>

            </div>
        </div>

    </section>

<?php endif; ?>
<?php
/**
 * =========================
 * RUNNING STROKE
 * =========================
 */
?>
<div id="marquee" class="marquee">
    <div class="marquee__inner">
        <p>БЕСПЛАТНАЯ ДИАГНОСТИКА</p>
        <p>БЕСПЛАТНЫЙ ЭВАКУАТОР
        </p>
        <p>ЛИЧНОЕ ПРИСУТСТВИЕ
        </p>
        <p>СВОИ ЗАПЧАСТИ
        </p>
        <p>КОМФОРТНАЯ ЗОНА ОЖИДАНИЯ
        </p>
    </div>
</div>


<style>
    .marquee__inner {
        display: flex;
        width: max-content;
        animation: marquee 60s linear infinite;
    }

    .marquee {
        overflow: hidden;
        position: relative;
        width: 100%;
        padding: 15px 0;
        background: var(--theme-color-accent);
        color: #fff;
        letter-spacing: 1px;
    }

    .marquee__inner p {
        margin-right: 25px;
        display: flex;
        align-items: center;
        gap: 25px;
        position: relative;
        white-space: nowrap;
    }

    .marquee__inner p:after {
        content: '';
        width: 5px;
        height: 5px;
        border-radius: 100%;
        font-weight: 400;
        background: #fff;
        display: block;
    }

    @keyframes marquee {
        0% {
            transform: translateX(0);
        }

        100% {
            transform: translateX(-50%);
        }
    }
</style>

<script>
    const marquee = document.querySelector('.marquee');
    const inner = marquee.querySelector('.marquee__inner');

    // Клонируем элементы до тех пор, пока ширина inner не станет больше контейнера
    function makeMarqueeSeamless() {
        const containerWidth = marquee.offsetWidth;
        let totalWidth = inner.scrollWidth;

        // клонируем пока inner не превышает ширину контейнера * 2
        while (totalWidth < containerWidth * 2) {
            Array.from(inner.children).forEach(child => {
                inner.appendChild(child.cloneNode(true));
            });
            totalWidth = inner.scrollWidth;
        }
    }

    makeMarqueeSeamless();

    // Запуск анимации
    let speed = 1; // px за кадр
    let offset = 0;

    function animate() {
        offset += speed;
        if (offset >= inner.scrollWidth / 2) offset = 0; // зацикливаем
        inner.style.transform = `translateX(${-offset}px)`;
        requestAnimationFrame(animate);
    }

    animate();
</script>

<?php
/**
 * =========================
 * NUMBERS
 * =========================
 */
?>

<section class="about-us">
    <div class="container">
        <h2>Профессионалы своего дела</h2>
        <div class="heading-description">
            Ремонтируем коробки передач с гарантией до 2-х лет
        </div>

        <div class="about-nums-section" id="numbers">
            <div class="about-num">
                <div class="about-num__value"><span class="js-anim-numbers">18</span>&nbsp;лет</div>
                <div class="about-num__desc">Ремонтируем коробки</div>
            </div>

            <div class="about-num">
                <div class="about-num__value"><span class="js-anim-numbers">26&nbsp;000</span>&nbsp;+</div>
                <div class="about-num__desc">Коробок починили</div>
            </div>

            <div class="about-num">
                <div class="about-num__value"><span class="js-anim-numbers">19</span>&nbsp;+</div>
                <div class="about-num__desc">Сотрудников в штате</div>
            </div>

            <div class="about-num">
                <div class="about-num__value"><span class="js-anim-numbers">12</span>&nbsp;лет</div>
                <div class="about-num__desc">Средний стаж сотрудников</div>
            </div>

        </div>
    </div>
</section>

<?php
/**
 * =========================
 * MARQUIZ
 * =========================
 */
?>

...

<?php
/**
 * =========================
 * ADVANTAGES
 * =========================
 */
?>
<?php
$advs = carbon_get_post_meta($template_id, 'advs');

if (!empty($advs)) : ?>

    <section class="advs">

        <div class="container">
            <h2>Некоторые преимущества </h2>
            <div class="heading-description">
                Нашего профессионального ремонта коробок передач
            </div>


            <div class="advs__grid">

                <?php foreach ($advs as $item) :

                    $img = $item['crb_adv_img'] ?? '';
                    $title = $item['crb_adv_h3'] ?? '';
                    $text = $item['crb_adv_text'] ?? '';

                ?>

                    <div class="advs__item">

                        <?php if ($img): ?>
                            <div class="advs__img">
                                <?= wp_get_attachment_image($img, 'full'); ?>
                            </div>
                        <?php endif; ?>

                        <?php if ($title): ?>
                            <h3 class="advs__title">
                                <?= esc_html($title); ?>
                            </h3>
                        <?php endif; ?>

                        <?php if ($text): ?>
                            <div class="advs__text">
                                <?= wp_kses_post($text); ?>
                            </div>
                        <?php endif; ?>

                    </div>

                <?php endforeach; ?>

            </div>

        </div>

    </section>

<?php endif; ?>