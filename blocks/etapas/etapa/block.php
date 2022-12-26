<?php

function render_block_etapa($attributes, $content)
{
    $icon = $attributes['icon'];
    $title = $attributes['title'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-etapa">
        <div class="etapa-heading">
            <div class="icon">
                <img src="<?php echo $icon; ?>">
            </div>
            <div class="etapa-title">
                <?php echo $title; ?>
            </div>
        </div>
        <div class="etapa-content">
            <?php echo $content; ?>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
