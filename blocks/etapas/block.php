<?php

function render_block_etapas($attributes, $content)
{

    ob_start(); // Start HTML buffering
?>

    <div class="lux-etapas">

        <div class="etapas d-flex">
            <?php echo $content; ?>
        </div>

        <a class="control-prev bi-chevron-left"></a>
        <a class="control-next bi-chevron-right"></a>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
