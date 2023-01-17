<?php

function render_block_luxform($attributes, $content)
{
    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];
    $form = $attributes['form'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-luxform container default-lux">
        <div class="row row-cols-1 row-cols-md-2">
            <div class="col form mb-4">
                <h2 class="pb-2">
                    <?php echo $title; ?>
                    <small class="subtitle d-block fw-normal">
                        <?php echo $subtitle; ?>
                    </small>
                </h2>
                <?php echo $form; ?>
            </div>
            <div class="col content text-start text-md-end">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
