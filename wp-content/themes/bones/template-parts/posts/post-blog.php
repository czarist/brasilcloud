<?php
$image = get_the_post_thumbnail_url(get_the_ID(), 'full');

if (!$image) {
    // se não houver imagem principal selecionada, o IF define essa imagem como capa;
    $image = get_template_directory_uri() . "/library/images/blog-provisorio.jpg";
}
?>
<div class="box-blog position-relative ">
    <img class="p-0 m-0" height="230" width="350" src="<?= $image ?>" alt="img-blog">
    <div class="row pl-3 pr-3 mt-2">
        <div class="col-12">
            <?php get_the_cats() ?>
        </div>
    </div>
    <h6 class="text-black p-3"><?php the_title(); ?></h6>
    <div class="pl-3 pr-3">
        <?php the_excerpt(); ?>
    </div>
    <a class="ler-mais-blog" href="<?php echo get_permalink(); ?>"><b>Ler mais</b></a>
</div>