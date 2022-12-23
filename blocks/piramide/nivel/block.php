<?php

function render_block_nivel($attributes)
{
    $title = $attributes['title'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-nivel">
        <h4 class="name"><?php echo $title; ?> <span class="bullet"></span></h4>
        <div class="desc">
            <p><?php echo $desc; ?></p>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
