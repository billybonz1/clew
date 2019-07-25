<?php 
/* 
Template Name: Головна
*/ 
?>


<?php get_header(); ?>

<section class="home-top-banner">

<div class="owl-carousel top-banner__slider owl-theme">

    <!--<div class="item">
        <video width="100%" height="100%" autoplay muted loop>
            <source src="img/123.mp4" type='video/mp4;' width="100%">
        </video>
    </div>-->

    <?php if(get_field('slider', $page_id)): ?>

        <?php while(the_repeater_field('slider', $page_id)): ?>

            <div class="item" style="background-image: url(<?php echo the_sub_field('img', $page_id); ?>)">
                <h1 class="top-banner__title"><?php echo the_sub_field('text', $page_id); ?></h1>
            </div>

    <?php endwhile; ?>

    <?php endif; ?>

</div>

<div class="top-banner__controls">

    <a href="#" class="topsl-prev top-banner__control">
        <svg width="12" height="14" viewBox="0 0 12 14" fill="#000" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M9.53355 13.7105L1.26695 8.33412C0.914683 8.10502 0.727907 7.71099 0.74304 7.31586C0.727907 6.92073 0.914683 6.5267 1.26695 6.2976L9.53355 0.921218C10.0586 0.579706 10.7526 0.733977 11.0836 1.26579C11.4145 1.79761 11.2572 2.50558 10.7321 2.84709L3.86097 7.31586L10.7321 11.7846C11.2572 12.1261 11.4145 12.8341 11.0836 13.3659C10.7526 13.8977 10.0586 14.052 9.53355 13.7105ZM2.20615 6.28309C2.20631 6.28314 2.20646 6.28319 2.20661 6.28324L9.79775 1.34617C10.0914 1.15521 10.4794 1.24147 10.6644 1.53883C10.7244 1.63518 10.7557 1.74186 10.7606 1.84857C10.7558 1.74172 10.7245 1.63487 10.6644 1.53839C10.4794 1.24103 10.0913 1.15477 9.79773 1.34573L2.20615 6.28309ZM3.40252 7.61402L10.4679 12.2091C10.6503 12.3278 10.7534 12.5256 10.7609 12.7297C10.7532 12.5258 10.6502 12.3282 10.4679 12.2097L3.40212 7.61429L3.40252 7.61402Z" />
        </svg>
    </a>
    <a href="#" class="topsl-next top-banner__control">
        <svg width="12" height="14" viewBox="0 0 12 14" fill="#000" xmlns="http://www.w3.org/2000/svg">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M2.46645 13.7105L10.7331 8.33412C11.0853 8.10502 11.2721 7.71099 11.257 7.31586C11.2721 6.92073 11.0853 6.5267 10.7331 6.2976L2.46645 0.921218C1.94135 0.579706 1.24738 0.733977 0.91642 1.26579C0.585461 1.79761 0.742844 2.50558 1.26794 2.84709L8.13903 7.31586L1.26794 11.7846C0.742844 12.1261 0.585461 12.8341 0.91642 13.3659C1.24738 13.8977 1.94135 14.052 2.46645 13.7105ZM9.79385 6.28309C9.79369 6.28314 9.79354 6.28319 9.79339 6.28324L2.20225 1.34617C1.90864 1.15521 1.52061 1.24147 1.33555 1.53883C1.27559 1.63518 1.2443 1.74186 1.23938 1.84857C1.24424 1.74172 1.27553 1.63487 1.33557 1.53839C1.52063 1.24103 1.90866 1.15477 2.20227 1.34573L9.79385 6.28309ZM8.59748 7.61402L1.53212 12.2091C1.34969 12.3278 1.24663 12.5256 1.23914 12.7297C1.24679 12.5258 1.34983 12.3282 1.53211 12.2097L8.59788 7.61429L8.59748 7.61402Z" />
        </svg>
    </a>

</div>

<button href="#first-section" class="go-scroll">
    <span></span>
    <span></span>
</button>

</section>

<section id="first-section" class="section home-socks__category">

<div class="section__title">
    <h2>Шкарпетки</h2>
</div>

<div class="section__category-list">

    <?php $terms = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'child_of'   => 18,
        'number'     => 3,
        'orderby'    => 'id', 
	    'order'      => 'ASC',
        ] );
    ?>
    <?php foreach ($terms as $term) { ?>

        <a href="<?php echo get_term_link($term,'product_cat') ?>" class="section__category-item" style="background-image: url(<?php echo get_field("mini", "product_cat_".$term->term_id) ?>)">

            <img class="category__img" src="<?php echo get_field("mini", "product_cat_".$term->term_id) ?>" alt="">
            <img class="category__img-hover" src="<?php echo get_field("minih", "product_cat_".$term->term_id) ?>" alt="">
            <h3 class="category-item__title"><?php echo $term->name ?></h3> 
            <span class="category-item__arrow"></span>

        </a>

    <?php  } ?>

</div>

</section>

<section class="section home-accessories__category">

<div class="section__title">
    <h2>Аксесуари</h2>
</div>

<div class="section__category-list">

    <?php $terms = get_terms( [
        'taxonomy'   => 'product_cat',
        'hide_empty' => false,
        'child_of'   => 22,
        'number'     => 2,
        'orderby'    => 'id', 
	    'order'      => 'ASC',
        ] );
    ?>
    <?php foreach ($terms as $term) { ?>

        <a href="<?php echo get_term_link($term,'product_cat') ?>" class="section__category-item" style="background-image: url(<?php echo get_field("mini", "product_cat_".$term->term_id) ?>)">

            <img class="category__img" src="<?php echo get_field("mini", "product_cat_".$term->term_id) ?>" alt="">
            <img class="category__img-hover" src="<?php echo get_field("minih", "product_cat_".$term->term_id) ?>" alt="">
            <h3 class="category-item__title"><?php echo $term->name ?></h3> 
            <span class="category-item__arrow"></span>

        </a>

    <?php  } ?>

</div>

</section>

<section class="section home-colaboration__category">

<div class="section__title">
    <h2>Колаборація</h2>
</div>

<div class="section__colaboration-list">

            <?php $posts = get_posts ("category=25&orderby=date&order=ASC&numberposts=3"); ?> 
            <?php if ($posts) : ?>
            <?php foreach ($posts as $post) : setup_postdata ($post); ?>

                <div class="col__colaboration-item">
                    <a href="<?php the_permalink() ?>" class="section__colaboration-item">

                        <div class="section__colaboration-thumb">
                            <img src="<?php the_field('img'); ?>" alt="">
                        </div>
                        <div class="section__colaboration-descr">
                            <h3 class="colaboration-item__title"><?php the_title(); ?></h3>
                            <?php $excer = get_field('excer'); ?>
                            <p class="colaboration-item__excerpt"><?php echo wp_trim_words( $excer, 15, ' ...' ); ?></p>
                            <div class="colab-item__arrow"></div>
                            <div class="colaboration-descr__botlane">
                                <span class="category-item__date"><?php echo get_the_date(); ?></span>
                                <span class="category-item__arrow">читати все <svg width="25" height="8" viewBox="0 0 25 8"
                                        fill="#000000" xmlns="http://www.w3.org/2000/svg">
                                        <path
                                            d="M24.3536 4.35355C24.5488 4.15829 24.5488 3.84171 24.3536 3.64644L21.1716 0.464464C20.9763 0.269202 20.6597 0.269202 20.4645 0.464464C20.2692 0.659727 20.2692 0.976309 20.4645 1.17157L23.2929 4L20.4645 6.82843C20.2692 7.02369 20.2692 7.34027 20.4645 7.53553C20.6597 7.73079 20.9763 7.73079 21.1716 7.53553L24.3536 4.35355ZM4.37114e-08 4.5L24 4.5L24 3.5L-4.37114e-08 3.5L4.37114e-08 4.5Z" />
                                    </svg>

                                </span>
                            </div>
                        </div>

                    </a>
                </div>

            <?php endforeach; ?>
            <?php endif; ?>

</div>

<div class="section__view-all">
    <a class="hover-theme" href="http://clew/%d0%ba%d0%be%d0%bb%d0%b0%d0%b1%d0%be%d1%80%d0%b0%d1%86%d1%96%d1%8f/">Усі Колаборації</a>
</div>

</section>

<section class="section home-news__category">

<div class="section__title">
    <h2>Новини та події</h2>
</div>

<div class="section__news-list">

    <div class="col__general-news">
        <div class="col__news-item news-item__first">
            <a href="#" class="section__news-item">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/first-colab-compressor.jpg" alt="">
                <div class="section__news-descr">
                    <h3 class="news-item__title">Головна Подiя</h3>
                    <p class="custom-text">Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do
                        eiusmod
                        tempor incididunt ut labore et dolore... </p>
                    <span class="category-item__arrow"></span>
                </div>

            </a>
        </div>
    </div>

    <div class="col__second-news">
        <div class="col__news-item">
            <a href="#" class="section__news-item">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pod1-compressor.png" alt="">
                <div class="section__news-descr">
                    <h3 class="news-item__title">Другорядна Подiя</h3>
                    <p class="custom-text">Lorem ipsum dolor sit amet, consectetur sed... </p>
                    <span class="category-item__arrow"></span>
                </div>

            </a>
        </div>

        <div class="col__news-item">
            <a href="#" class="section__news-item">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pod2-compressor.png" alt="">
                <div class="section__news-descr">
                    <h3 class="news-item__title">Другорядна Подiя</h3>
                    <p class="custom-text">Lorem ipsum dolor sit amet, consectetur sed... </p>
                    <span class="category-item__arrow"></span>
                </div>

            </a>
        </div>

        <div class="col__news-item">
            <a href="#" class="section__news-item">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pod3-compressor.png" alt="">
                <div class="section__news-descr">
                    <h3 class="news-item__title">Другорядна Подiя</h3>
                    <p class="custom-text">Lorem ipsum dolor sit amet, consectetur sed... </p>
                    <span class="category-item__arrow"></span>
                </div>

            </a>
        </div>

        <div class="col__news-item dnone">
            <a href="#" class="section__news-item">

                <img src="<?php echo get_stylesheet_directory_uri(); ?>/img/pod4-compressor.png" alt="">
                <div class="section__news-descr">
                    <h3 class="news-item__title">Другорядна Подiя</h3>
                    <p class="custom-text">Lorem ipsum dolor sit amet, consectetur sed... </p>
                    <span class="category-item__arrow"></span>
                </div>

            </a>
        </div>
    </div>

</div>

<div class="section__view-all">
    <a class="hover-theme" href="#">Усі події і новини</a>
</div>

</section>

<div class="section home-proposition__form proposition__form-mobile">

<div class="proposition__title">
    <h2>Якщо маєте питання чи пропозиції, пишіть нам!</h2>
</div>

<form action="" class="proposition__form">

    <div class="form-wrap">
        <div class="form-field plr-25">
            <input type="text" placeholder="Ім’я">
            <span>*</span>
        </div>

        <div class="form-field plr-25">
            <input type="text" placeholder="E-mail">
            <span>*</span>
        </div>
    </div>

    <div class="form-wrap">
        <div class="form-field plr-25">
            <textarea placeholder="Введiть текст"></textarea>
        </div>
    </div>

    <div class="form-field-btn plr-15">
        <input type="submit" value="написати">
    </div>

</form>

</div>

<div class="section home-proposition__form proposition__form-desktop">

<div class="proposition__form-animation">
    <svg width="27" height="27" class="buble1" viewBox="0 0 27 27" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M25.8762 13.1881C25.8762 20.1956 20.1956 25.8762 13.1881 25.8762C6.18066 25.8762 0.5 20.1956 0.5 13.1881C0.5 6.18066 6.18066 0.5 13.1881 0.5C20.1956 0.5 25.8762 6.18066 25.8762 13.1881Z"
            fill="white" stroke="black" />
        <mask id="path-2-inside-1" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M13.1881 25.3762C19.9194 25.3762 25.3762 19.9194 25.3762 13.1881C25.3762 6.45681 19.9194 1 13.1881 1C6.4568 1 1 6.45681 1 13.1881C1 19.9194 6.4568 25.3762 13.1881 25.3762ZM13.1881 26.3762C20.4717 26.3762 26.3762 20.4717 26.3762 13.1881C26.3762 5.90452 20.4717 0 13.1881 0C5.90452 0 0 5.90452 0 13.1881C0 20.4717 5.90452 26.3762 13.1881 26.3762Z" />
        </mask>
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M13.1881 25.3762C19.9194 25.3762 25.3762 19.9194 25.3762 13.1881C25.3762 6.45681 19.9194 1 13.1881 1C6.4568 1 1 6.45681 1 13.1881C1 19.9194 6.4568 25.3762 13.1881 25.3762ZM13.1881 26.3762C20.4717 26.3762 26.3762 20.4717 26.3762 13.1881C26.3762 5.90452 20.4717 0 13.1881 0C5.90452 0 0 5.90452 0 13.1881C0 20.4717 5.90452 26.3762 13.1881 26.3762Z"
            fill="white" />
        <path
            d="M24.3762 13.1881C24.3762 19.3671 19.3671 24.3762 13.1881 24.3762V26.3762C20.4717 26.3762 26.3762 20.4717 26.3762 13.1881H24.3762ZM13.1881 2C19.3671 2 24.3762 7.00909 24.3762 13.1881H26.3762C26.3762 5.90452 20.4717 0 13.1881 0V2ZM2 13.1881C2 7.00909 7.00909 2 13.1881 2V0C5.90452 0 0 5.90452 0 13.1881H2ZM13.1881 24.3762C7.00909 24.3762 2 19.3671 2 13.1881H0C0 20.4717 5.90452 26.3762 13.1881 26.3762V24.3762ZM25.3762 13.1881C25.3762 19.9194 19.9194 25.3762 13.1881 25.3762V27.3762C21.024 27.3762 27.3762 21.024 27.3762 13.1881H25.3762ZM13.1881 1C19.9194 1 25.3762 6.45681 25.3762 13.1881H27.3762C27.3762 5.35224 21.024 -1 13.1881 -1V1ZM1 13.1881C1 6.45681 6.4568 1 13.1881 1V-1C5.35223 -1 -1 5.35224 -1 13.1881H1ZM13.1881 25.3762C6.4568 25.3762 1 19.9194 1 13.1881H-1C-1 21.024 5.35223 27.3762 13.1881 27.3762V25.3762Z"
            fill="black" mask="url(#path-2-inside-1)" />
        <mask id="path-4-inside-2" fill="white">
            <path fill-rule="evenodd" clip-rule="evenodd"
                d="M12.3352 23.4696C12.3091 23.7445 12.0651 23.9463 11.7902 23.9202C10.6287 23.8102 9.49268 23.3374 8.56576 22.4936C8.36156 22.3077 8.34673 21.9914 8.53264 21.7872C8.71854 21.583 9.03478 21.5682 9.23897 21.7541C9.99991 22.4469 10.9307 22.8343 11.8845 22.9247C12.1595 22.9507 12.3612 23.1947 12.3352 23.4696Z" />
        </mask>
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M12.3352 23.4696C12.3091 23.7445 12.0651 23.9463 11.7902 23.9202C10.6287 23.8102 9.49268 23.3374 8.56576 22.4936C8.36156 22.3077 8.34673 21.9914 8.53264 21.7872C8.71854 21.583 9.03478 21.5682 9.23897 21.7541C9.99991 22.4469 10.9307 22.8343 11.8845 22.9247C12.1595 22.9507 12.3612 23.1947 12.3352 23.4696Z"
            fill="white" />
        <path
            d="M11.7902 23.9202L11.8845 22.9247L11.8845 22.9247L11.7902 23.9202ZM12.3352 23.4696L11.3396 23.3753L11.3396 23.3753L12.3352 23.4696ZM11.8845 22.9247L11.7902 23.9202L11.7902 23.9202L11.8845 22.9247ZM11.6959 24.9158C12.5207 24.9939 13.2526 24.3886 13.3307 23.5639L11.3396 23.3753C11.3657 23.1004 11.6096 22.8986 11.8845 22.9247L11.6959 24.9158ZM7.89254 23.233C8.98546 24.228 10.3268 24.7861 11.6959 24.9158L11.8845 22.9247C10.9306 22.8343 9.99989 22.4469 9.23897 21.7541L7.89254 23.233ZM7.79318 21.114C7.23547 21.7266 7.27996 22.6753 7.89254 23.233L9.23897 21.7541C9.44317 21.94 9.458 22.2562 9.27209 22.4604L7.79318 21.114ZM9.91219 21.0147C9.2996 20.457 8.35089 20.5015 7.79318 21.114L9.27209 22.4604C9.08619 22.6646 8.76995 22.6795 8.56576 22.4936L9.91219 21.0147ZM11.9789 21.9291C11.2326 21.8585 10.5072 21.5563 9.91219 21.0147L8.56576 22.4936C9.49265 23.3374 10.6287 23.8102 11.7902 23.9202L11.9789 21.9291ZM13.3307 23.5639C13.4088 22.7392 12.8036 22.0073 11.9789 21.9291L11.7902 23.9202C11.5153 23.8942 11.3136 23.6502 11.3396 23.3753L13.3307 23.5639Z"
            fill="black" mask="url(#path-4-inside-2)" />
        <path fill-rule="evenodd" clip-rule="evenodd"
            d="M10.7206 3.45515L12.7952 3.978L12.7001 4.9621C12.1451 4.99224 11.5343 5.2408 10.8936 5.67114C10.2567 6.09893 9.62274 6.68453 9.02834 7.33801C7.83832 8.64633 6.85292 10.1757 6.36461 11.1038L5.44333 10.7269L6.08994 8.57806L6.09891 8.55607C6.82946 6.76481 7.6584 5.64019 8.46506 4.89161C9.22209 4.1891 9.94125 3.83712 10.4587 3.58384C10.4919 3.5676 10.5242 3.55178 10.5557 3.53629L10.7206 3.45515ZM8.07181 6.9081C8.14328 6.82647 8.21556 6.74543 8.28858 6.66514C8.91611 5.97523 9.61057 5.32831 10.3361 4.84101C10.5071 4.72611 10.6818 4.61882 10.8594 4.52141L10.8322 4.51455C10.3371 4.75788 9.76048 5.05373 9.14529 5.62462C8.7991 5.94588 8.43538 6.35987 8.07181 6.9081Z"
            fill="black" />
    </svg>

    <svg width="64" height="64" class="buble2" viewBox="0 0 64 64" fill="none"
        xmlns="http://www.w3.org/2000/svg">
        <path
            d="M63.5007 32.1883C63.5007 49.4814 49.4819 63.5002 32.1888 63.5002C14.8958 63.5002 0.876953 49.4814 0.876953 32.1883C0.876953 14.8953 14.8958 0.876465 32.1888 0.876465C49.4819 0.876465 63.5007 14.8953 63.5007 32.1883Z"
            fill="white" stroke="black" />
        <path d="M21.8508 53.7431C23.8865 55.5964 26.3792 56.6339 28.9305 56.8756" stroke="black"
            stroke-linecap="round" />
        <path
            d="M26.3709 9.98937L30.9456 11.1423C24.3957 11.4979 17.1 21.9645 14.6613 26.5996L16.2045 21.4713C19.6176 13.1025 23.8324 11.2389 26.3709 9.98937Z"
            stroke="black" />
    </svg>

    <div class="eye1"></div>
    <div class="eye2"></div>
    <div class="smile1"></div>
    <div class="smile2"></div>
    <div class="drop"></div>
</div>

<div class="proposition__title">
    <h2>Якщо маєте питання чи пропозиції, <br> пишіть нам!</h2>
</div>

<form action="" class="proposition__form">

    <div class="form-wrap">
        <div class="form-field plr-25">
            <input type="text" placeholder="Ім’я">
            <span>*</span>
        </div>

        <div class="form-field plr-25">
            <input type="text" placeholder="E-mail">
            <span>*</span>
        </div>
    </div>

    <div class="form-wrap">
        <div class="form-field plr-25">
            <textarea placeholder="Введiть текст"></textarea>
        </div>
    </div>

    <div class="form-field-btn plr-15">
        <input class="hover-theme hover-bg-contain" type="submit" value="надіслати">
    </div>

</form>

</div>

<?php get_footer(); ?>