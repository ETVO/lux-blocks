<?php

function render_block_carousel($attributes, $content)
{

    $id = 'luxCarousel' . rand(0, date('Y'));

    ob_start(); // Start HTML buffering
?>

    <div class="lux-carousel">
        <div class="carousel slide" data-bs-ride="carousel" id="<?php echo $id; ?>" data-custom-indicators="false">
            <div class="carousel-inner">
                <?php echo $content; ?>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php echo __('Anterior'); ?></span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#<?php echo $id; ?>" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden"><?php echo __('Próximo'); ?></span>
            </button>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
