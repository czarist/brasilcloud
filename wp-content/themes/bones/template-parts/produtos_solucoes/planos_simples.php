<div class="row justify-content-center abas_planos mt-5">
    <?php
    if (have_rows('abas', $post->ID)) :
        $i = 0;
        while (have_rows('abas', $post->ID)) : the_row();
            $titulo_aba = get_sub_field('titulo_aba', $post->ID);

    ?>
            <div id="ranger-<?= $i ?>" class="col-12 col-xl-6 text-center the-rangers <?= $i == 0 ? 'activated' : '' ?>">
                <h4><?= $titulo_aba ?></h4>
            </div>

        <?php
            $i = ++$i;
        endwhile;
    endif;

    if (have_rows('abas', $post->ID)) :
        $i = 0;
        while (have_rows('abas', $post->ID)) : the_row();
        ?>
            <div class="row the_ranged ranger-<?= $i ?> <?= $i > 0 ? 'd-none' : '' ?>">
                <?php
                if (have_rows('planos_da_aba', $post->id)) :
                    while (have_rows('planos_da_aba', $post->id)) : the_row();
                        $titulo_do_plano = get_sub_field('titulo_do_plano', $post->id);
                        $uso_ideal = get_sub_field('uso_ideal', $post->id);
                        $mais_vendido = get_sub_field('mais_vendido', $post->id);  ?>

                        <div class="col-xl-3 col-12">
                            <div class="coluna_plano position-relative">
                                <?= $mais_vendido[0] == "Ativar Ícone" ? '<span class="mais-vendido">Mais vendido</span>' : '' ?>

                                <h4 class="text-center mt-4"><?= $titulo_do_plano ?></h4>
                                <div class="barra-verde-2"></div>
                                <p class="fs-10"><b class="text-golden">uso ideal:</b><?= $uso_ideal ?></p>
                                <?php if (have_rows('itens_plano', $post->id)) :
                                    while (have_rows('itens_plano', $post->id)) : the_row();

                                        $item = get_sub_field('item', $post->id);
                                        echo "<p class='text-center bt-item'><b>{$item}</b></p>";

                                    endwhile;
                                endif; ?>
                                <span class="text-golden fs-10 text-center">Gerenciamento pelo Cliente</span>
                                <p class="botaoFakeAjax text-white d-flex mt-5 mb-0 mr-0 ml-0"><b>CONTRATAR</b></p>
                            </div>
                        </div>
                <?php endwhile;
                endif; ?>
            </div>

    <?php $i = ++$i;
        endwhile;
    endif; ?>
</div>