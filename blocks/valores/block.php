<?php

function render_block_valores($attributes, $content)
{
    $title = $attributes['title'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-valores">
        <div class="container default-lux">
            <h2 class="title text-center">
                <?php echo $title; ?>
            </h2>

            <div class="valores">
                <?php echo $content; ?>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
