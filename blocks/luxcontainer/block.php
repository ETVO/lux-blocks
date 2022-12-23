<?php

function render_block_luxcontainer($attributes, $content)
{
    ob_start(); // Start HTML buffering
?>

    <div class="lux-luxcontainer container default-lux">
        <?php echo $content; ?>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
