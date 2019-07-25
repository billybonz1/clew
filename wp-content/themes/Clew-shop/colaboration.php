<?php 
/* 
Template Name: Колаборація
*/ 
?>

<?php get_header(); ?>

<div class="c-colab-list">

<div class="inner">

    <div class="section__title section__product-title bd-none bgc-f">
        <h2>Колаборaція</h2>
    </div>

    <div class="section__colaboration-list colaboration-list__container">

        <?php $posts = get_posts ("category=25&orderby=date&order=ASC&numberposts=6"); ?> 
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

    <?php echo paginate_links(); ?>

    <div class="product-list__nav">
        <a href="#" class="pln-prev">
            <svg width="25" height="12" viewBox="0 0 109 28" fill="#C6C6C6" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M103.044 16.4313L104.324 15.1512H102.514H0.75V12.8488H102.514H104.324L103.044 11.5687L94.1976 2.71533C93.7483 2.26574 93.7483 1.53657 94.1976 1.08697C94.6465 0.637675 95.3742 0.63768 95.8232 1.08697L96.3532 0.557352L95.8232 1.08697L107.913 13.1858C108.362 13.6354 108.362 14.3646 107.913 14.8142L95.8232 26.913C95.3742 27.3623 94.6465 27.3623 94.1976 26.913C93.7483 26.4634 93.7483 25.7343 94.1976 25.2847L103.044 16.4313Z"
                    stroke-width="1.5" />
            </svg>

        </a>
        <a href="#" class="pln-num pln-active">1</a>
        <a href="#" class="pln-num">2</a>
        <a href="#" class="pln-num">3</a>
        <a href="#" class="pln-num">4</a>
        <a href="#" class="pln-next">
            <svg width="25" height="12" viewBox="0 0 109 28" fill="#C6C6C6" xmlns="http://www.w3.org/2000/svg">
                <path
                    d="M103.044 16.4313L104.324 15.1512H102.514H0.75V12.8488H102.514H104.324L103.044 11.5687L94.1976 2.71533C93.7483 2.26574 93.7483 1.53657 94.1976 1.08697C94.6465 0.637675 95.3742 0.63768 95.8232 1.08697L96.3532 0.557352L95.8232 1.08697L107.913 13.1858C108.362 13.6354 108.362 14.3646 107.913 14.8142L95.8232 26.913C95.3742 27.3623 94.6465 27.3623 94.1976 26.913C93.7483 26.4634 93.7483 25.7343 94.1976 25.2847L103.044 16.4313Z"
                    stroke-width="1.5" />
            </svg>

        </a>
    </div>

</div>
</div>

<?php get_footer(); ?>