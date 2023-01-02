<?php

function render_block_etapas($attributes, $content)
{

    $id = 'etapas' . rand(0, date('Y'));

    ob_start(); // Start HTML buffering
?>

    <div class="lux-etapas">

        <div class="etapas" id="<?php echo $id; ?>">
            <?php echo $content; ?>
        </div>

        <div class="etapas-footer d-flex justify-content-between align-items-center">
            <div class="controls-etapas">
                <button class="etapas-control-prev" type="button" data-target="#<?php echo $id; ?>" data-slide="prev">
                    <span class="control-prev-icon bi-chevron-left" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo __('Anterior'); ?></span>
                </button>
                <button class="etapas-control-next" type="button" data-target="#<?php echo $id; ?>" data-slide="next">
                    <span class="control-next-icon bi-chevron-right" aria-hidden="true"></span>
                    <span class="visually-hidden"><?php echo __('Próximo'); ?></span>
                </button>
            </div>
            <div class="info">
                <span class="bi-info-circle me-1"></span> utilize as setas para navegar
            </div>
        </div>


    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
