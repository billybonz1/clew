<?php 
/* 
Template Name: Подарунковий сертифікат
*/ 
?>

<?php get_header(); ?>

<div class="c-sertificate">
        <div class="inner">
            <div class="section__title section__product-title bd-none bgc-f">
                <h2>Подарунковий сертифікат</h2>
            </div>
            <form class="sert__form">
                <div class="sert__list">
                    <div class="sert__item"><input type="radio" id="sert1" name="sert" value="sert-500"><label for="sert1">  <img class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert1.png" alt=""><img class="img-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert1a.png" alt=""><span><svg width="33" height="30" viewBox="0 0 33 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1.50332" y="9.86736" width="2.75181" height="22.1467" rx="1.3759" transform="rotate(-33.4437 1.50332 9.86736)" fill="black" stroke="black"/>
                        <rect x="-0.692773" y="0.141655" width="2.75181" height="31.8022" rx="1.3759" transform="matrix(-0.834427 -0.551118 -0.551118 0.834427 31.8048 1.7094)" fill="black" stroke="black"/>
                        </svg>
                        </span></label></div>
                    <div class="sert__item"><input type="radio" id="sert2" name="sert" value="sert-1000"><label for="sert2"><img class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert2.png" alt=""><img class="img-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert2a.png" alt=""><span><svg width="33" height="30" viewBox="0 0 33 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1.50332" y="9.86736" width="2.75181" height="22.1467" rx="1.3759" transform="rotate(-33.4437 1.50332 9.86736)" fill="black" stroke="black"/>
                        <rect x="-0.692773" y="0.141655" width="2.75181" height="31.8022" rx="1.3759" transform="matrix(-0.834427 -0.551118 -0.551118 0.834427 31.8048 1.7094)" fill="black" stroke="black"/>
                        </svg>
                        </span></label></div>
                    <div class="sert__item"> <input type="radio" id="sert3" name="sert" value="sert-2000"><label for="sert3"><img class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert3.png" alt=""><img class="img-hover" src="<?php echo get_stylesheet_directory_uri(); ?>/img/sert3a.png" alt=""><span><svg width="33" height="30" viewBox="0 0 33 30" fill="none" xmlns="http://www.w3.org/2000/svg">
                        <rect x="1.50332" y="9.86736" width="2.75181" height="22.1467" rx="1.3759" transform="rotate(-33.4437 1.50332 9.86736)" fill="black" stroke="black"/>
                        <rect x="-0.692773" y="0.141655" width="2.75181" height="31.8022" rx="1.3759" transform="matrix(-0.834427 -0.551118 -0.551118 0.834427 31.8048 1.7094)" fill="black" stroke="black"/>
                        </svg>
                        </span></label></div>
                </div>
                <div class="sert__format">
                    <span class="sert__format-title">Оберіть формат</span>
                    <div class="format__block">
                        <div class="fblock__line">
                                <input type="radio" name="format" value="format-eticket" id="format1">
                            <label for="format1">
                                
                                <span>Електроний сертифікат</span>
                            </label>
                            <a href="#">i</a>
                        </div>
                        <div class="fblock__line">
                            <input type="radio" name="format" value="format-delivery" id="format2">
                            <label for="format2">
                                <span>З доставкою</span>
                            </label>
                            <a href="#">i</a>
                        </div>
                    </div>
                </div>
                <div class="sert__btn">
                    <input type="submit" class="hover-theme" value="Придбати">
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>