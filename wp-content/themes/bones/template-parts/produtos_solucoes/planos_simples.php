<div class="row justify-content-center w-100 abas_planos mt-5">
    <div class="row w-100">
        <?php
        if (have_rows('planos_simples', $post->id)) :
            while (have_rows('planos_simples', $post->id)) : the_row();
                $titulo_plano = get_sub_field('titulo_plano', $post->id);
                $uso_ideal = get_sub_field('uso_ideal', $post->id);
                $mais_vendido = get_sub_field('mais_vendido', $post->id);
                $texto_verde = get_sub_field('texto_verde', $post->id);
                $texto_dourado = get_sub_field('texto_dourado', $post->id);
        ?>

                <div class="col-xl-3 col-12">
                    <div class="coluna_plano position-relative">
                        <?= $mais_vendido[0] == "Ativar Ícone" ? '<span class="mais-vendido">Mais vendido</span>' : '' ?>

                        <h4 class="text-center mt-4"><?= $titulo_plano ?></h4>

                        <div class="barra-verde-2"></div>

                        <?php if ($texto_verde !== "") { ?>
                            <h6 class="text-center text-green mb-4"> <b><?= $texto_verde ?></b> </h6>
                        <?php } ?>

                        <?php if ($uso_ideal !== "") { ?>
                            <p class="fs-10">
                                <b class="text-golden">uso ideal:</b><?= $uso_ideal ?>
                            </p>
                        <?php } ?>

                        <?php if (have_rows('itens_plano_simples', $post->id)) :
                            while (have_rows('itens_plano_simples', $post->id)) : the_row();

                                $item = get_sub_field('item', $post->id);
                                $cor_texto_item = get_sub_field('cor_texto_item', $post->id);

                                echo "<p class='text-center bt-item color-item-{$cor_texto_item}'><b>{$item}</b></p>";

                            endwhile;
                        endif; ?>

                        <?php if ($texto_dourado !== "") { ?>
                            <p class="text-golden fs-10 text-center"><?= $texto_dourado ?></p>
                        <?php } ?>

                        <p class="botaoFakeAjax contratar-plano text-white d-flex mt-5 mb-0 mr-0 ml-0">
                            <input type="hidden" name="input-contratacao" value="<?= $titulo_plano ?>">
                            <b>CONTRATAR</b>
                        </p>

                    </div>
                </div>

        <?php endwhile;
        endif; ?>
    </div>


</div>