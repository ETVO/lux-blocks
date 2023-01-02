<?php

function render_block_servico($attributes, $content)
{
    $title = $attributes['title'];
    $text = $attributes['text'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-servico">
        <div class="container default-lux">
            <div class="title">
                <img class="icon" src="<?php echo PLUGIN_IMG_URL . '/lux-pink.svg'; ?>">
                <h2><?php echo $title; ?></h2>  
            </div>
            <div class="content">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
