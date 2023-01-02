<?php

function render_block_etapas($attributes, $content)
{

    $id = 'etapas' . rand(0, date('Y'));

    ob_start(); // Start HTML buffering
?>

    <div class="lux-etapas">

        <div class="etapas carousel slide" id="<?php echo $id; ?>">
            <div class="etapas-inner">
                <?php echo $content; ?>
            </div>

            <div class="etapas-footer d-flex justify-content-between align-items-center">
                <div class="controls">
                    <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="prev">
                        <span class="carousel-control-prev-icon bi-chevron-left" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php echo __('Anterior'); ?></span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="next">
                        <span class="carousel-control-next-icon bi-chevron-right" aria-hidden="true"></span>
                        <span class="visually-hidden"><?php echo __('Próximo'); ?></span>
                    </button>
                </div>
                <div class="info">
                    <span class="bi-info-circle"></span> utilize as setas para navegar
                </div>
            </div>
        </div>

    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
