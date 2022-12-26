<?php

function render_block_etapas($attributes)
{
    $image = $attributes['image'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-etapas">        
        <img src="<?php echo $image; ?>" alt="">

        <a class="control-prev bi-chevron-left"></a>
        <a class="control-next bi-chevron-right"></a>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
