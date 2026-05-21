<?php

/**
 * Template name: Бесплатная диагностика
 */
get_header();
?>

<main id="primary" class="site-main">

	<div class="container">
		<!-- nominify begin --><!-- Marquiz script start -->
		<script>
			(function(w, d, s, o) {
				var j = d.createElement(s);
				j.async = true;
				j.src = '//script.marquiz.ru/v2.js';
				j.onload = function() {
					if (document.readyState !== 'loading') Marquiz.init(o);
					else document.addEventListener("DOMContentLoaded", function() {
						Marquiz.init(o);
					});
				};
				d.head.insertBefore(j, d.head.firstElementChild);
			})(window, document, 'script', {
				host: '//quiz.marquiz.ru',
				region: 'ru',
				id: '68da59f4d25bd600191644f9',
				autoOpen: 40,
				autoOpenFreq: 'always',
				openOnExit: true,
				disableOnMobile: false
			});
		</script> <!-- Marquiz script end --><!-- nominify end -->
		<script type="text/javascript">
			window.dataLayer = window.dataLayer || [];
		</script>
		<script type="text/javascript">
			(function() {
				if ((/bot|google|yandex|baidu|bing|msn|duckduckbot|teoma|slurp|crawler|spider|robot|crawling|facebook/i.test(navigator.userAgent)) === false && typeof(sessionStorage) != 'undefined' && sessionStorage.getItem('visited') !== 'y' && document.visibilityState) {
					var style = document.createElement('style');
					style.type = 'text/css';
					style.innerHTML = '@media screen and (min-width: 980px) {.t-records {opacity: 0;}.t-records_animated {-webkit-transition: opacity ease-in-out .2s;-moz-transition: opacity ease-in-out .2s;-o-transition: opacity ease-in-out .2s;transition: opacity ease-in-out .2s;}.t-records.t-records_visible {opacity: 1;}}';
					document.getElementsByTagName('head')[0].appendChild(style);

					function t_setvisRecs() {
						var alr = document.querySelectorAll('.t-records');
						Array.prototype.forEach.call(alr, function(el) {
							el.classList.add("t-records_animated");
						});
						setTimeout(function() {
							Array.prototype.forEach.call(alr, function(el) {
								el.classList.add("t-records_visible");
							});
							sessionStorage.setItem("visited", "y");
						}, 400);
					}
					document.addEventListener('DOMContentLoaded', t_setvisRecs);
				}
			})();
		</script>
		</head>

		<body class="t-body" style="margin:0;"> <!--allrecords-->
			<div id="allrecords" class="t-records" data-hook="blocks-collection-content-node" data-tilda-project-id="15514616" data-tilda-page-id="81979266" data-tilda-page-alias="besplatnaja-diagnostika" data-tilda-formskey="a00a95e94b004cc2e9df01e315514616" data-tilda-cookie="no" data-tilda-lazy="yes" data-tilda-root-zone="com" data-tilda-project-headcode="yes" data-tilda-project-country="RU">
				<div id="rec1364491911" class="r t-rec" style=" " data-animationappear="off" data-record-type="131"> <!-- T123 -->
					<div class="t123">
						<div class="t-container_100 ">
							<div class="t-width t-width_100 "> <!-- nominify begin -->
								<html>

								<head>
									<meta http-equiv="X-UA-Compatible" content="IE=edge" />
									<meta charset="utf-8" />
									<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
									<title>Marquiz</title> <!-- Marquiz script start -->
									<script>
										(function(w, d, s, o) {
											var j = d.createElement(s);
											j.async = true;
											j.src = '//script.marquiz.ru/v2.js';
											j.onload = function() {
												if (document.readyState !== 'loading') Marquiz.init(o);
												else document.addEventListener("DOMContentLoaded", function() {
													Marquiz.init(o);
												});
											};
											d.head.insertBefore(j, d.head.firstElementChild);
										})(window, document, 'script', {
											host: '//quiz.marquiz.ru',
											region: 'eu',
											id: '68da59e9d25bd600191644f7',
											autoOpen: 0,
											autoOpenFreq: 'always',
											openOnExit: false,
											disableOnMobile: false
										});
									</script> <!-- Marquiz script end -->
									<style>
										.marquiz__bg_open .marquiz__modal {
											max-width: 100% !important;
											min-height: 100% !important;
											width: 100% !important;
											height: 100% !important;
											padding: 0 !important;
										}

										.marquiz__bg_open .marquiz__frame_open {
											height: 100% !important;
										}

										#marquiz__close {
											display: none
										}
									</style>
							</div>

</main>

<?php get_footer(); ?>