<?php

function render_block_grifado($attributes)
{
    $title = $attributes['title'];
    $text = $attributes['text'];
    
    $isTitleWide = $attributes['isTitleWide'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-grifado">
        <div class="wrap mb-2 <?php if($isTitleWide) echo 'title-wide' ?>">
            <p class="mark-title">
                <?php echo $title; ?>
            </p>
        </div>

        <p>
            <?php echo $text; ?>
        </p>
    </div>


<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
