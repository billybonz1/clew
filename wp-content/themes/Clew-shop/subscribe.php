<?php 
/* 
Template Name: Підписка на доставку
*/ 
?>

<?php get_header(); ?>

<div class="c-subscribe">
        <div class="inner">
            <form class="sert__form" id="example-form">
                <div>
                    <h3><span class="step-name">Крок</span> 1</h3>
                    <section>
                        <div class="section__title section__product-title bd-none bgc-f">
                            <h2>Оберіть кількість</h2>
                            <span>(Підписка)</span>
                        </div>
                        <div class="sub__list">
                            <div class="sub__item"><input type="radio" id="sert1" required name="sert"><label
                                    for="sert1"> <img class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid1.png" alt=""><img class="img-hover"
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid1a.png" alt=""></label></div>
                            <div class="sub__item"><input type="radio" id="sert2" name="sert"><label for="sert2"><img
                                        class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid2.png" alt=""><img class="img-hover"
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid2a.png" alt=""></label></div>
                            <div class="sub__item"> <input type="radio" id="sert3" name="sert"><label for="sert3"><img
                                        class="img-displ" src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid3.png" alt=""><img class="img-hover"
                                        src="<?php echo get_stylesheet_directory_uri(); ?>/img/pid3a.png" alt=""></label></div>
                        </div>
                        <div class="variation__wrap">
                            <div class="variation-size">

                                <span class="var-title">Оберіть розмір</span>

                                <div class="size-container">
                                    <div class="var-size">
                                        <input id="radio" type="radio" required name="group1">
                                        <label for="radio" class="label-size">
                                            30-35
                                        </label>
                                    </div>
                                    <div class="var-size">
                                            <input id="radio1" type="radio" name="group1">
                                        <label for="radio1" class="label-size1">
                                            40-45
                                        </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="confidient__section">
                            <input type="checkbox" name="check" required checked>
                            <span>Погодитись із <a href="">правилами оплати, умовами доставки і повернення</a> <br> та
                                <a href="">політикою конфіденційності</a></span>
                        </div>
                    </section>
                    <h3><span class="step-name">Крок</span> 2</h3>
                    <section>
                        <div class="section__title section__product-title bd-none bgc-f">
                            <h2>Оберіть набір</h2>
                            <span>(Підписка)</span>
                        </div>
                        <div class="sub__list sub__list-nabor">
                            <div class="sub__item sert__nabor"><input type="radio" id="sert1" required
                                    name="sert"><label for="sert1">
                                    <img class="img-displ img-imp" src="<?php echo get_stylesheet_directory_uri(); ?>/img/podgr.png" alt=""></label></div>
                            <div class="sub__item sert__nabor"><input type="radio" id="sert2" name="sert"><label
                                    for="sert2"><img class="img-displ img-imp" src="<?php echo get_stylesheet_directory_uri(); ?>/img/podgr.png" alt=""></label></div>
                            <div class="sub__item sert__nabor"> <input type="radio" id="sert3" name="sert"><label
                                    for="sert3"><img class="img-displ img-imp" src="<?php echo get_stylesheet_directory_uri(); ?>/img/podgr.png" alt=""></label></div>
                        </div>
                    </section>
                    <h3><span class="step-name">Крок</span> 3</h3>
                    <section>
                        <div class="section__title section__product-title bd-none bgc-f">
                            <h2>Налаштування</h2>
                            <span>(Підписка)</span>
                        </div>
                        <div class="variation__wrap variation__between">
                            <div class="variation-size">

                                <span class="var-title">Оберіть тривалість підписки</span>

                                <div class="size-container size-between">
                                    <div class="var-size">
                                            <input id="radio3" type="radio" required name="group2">
                                        <label for="radio3" class="label-size1">
                                            3
                                        </label>
                                    </div>

                                    <div class="var-size">
                                            <input id="radio4" type="radio" name="group2">
                                        <label for="radio4" class="label-size1">
                                            6
                                        </label>
                                    </div>
                                    <div class="var-size">
                                            <input id="radio5" type="radio" name="group2">
                                        <label for="radio5" class="label-size1">
                                            12 
                                        </label>
                                    </div>
                                </div>

                                <span class="var-title-bot">місяців</span>

                            </div>
                        </div>
                        <div class="sert__format sert__format-date">
                            <span class="sert__format-title">Оберіть кількість відправлень та <br> зручну дату для
                                отримання</span>
                            <div class="format__block">
                                <div class="fblock__line">
                                    <input type="radio" name="format" required id="format1">
                                    <label for="format1">
                                        <span>Один раз в тиждень</span>
                                    </label>
                                    <a href="#">i</a>
                                </div>
                                <div class="fblock__line">
                                    <input type="radio" name="format" id="format2">
                                    <label for="format2">
                                        <span>Один раз на місяць</span>
                                    </label>
                                    <a href="#">i</a>
                                </div>
                                <div class="fblock__line">
                                    <input type="radio" name="format" id="format3">
                                    <label for="format3">
                                        <span>Один раз на три місяці</span>
                                    </label>
                                    <a href="#">i</a>
                                </div>
                            </div>
                        </div>
                        <div class="sert__btn">
                            <input type="submit" class="hover-theme" value="Додати до кошику">
                        </div>
                    </section>
                </div>
            </form>
        </div>
    </div>

<?php get_footer(); ?>