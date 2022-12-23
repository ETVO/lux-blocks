<?php

function render_block_valor($attributes)
{
    $image = $attributes['image'];
    $title = $attributes['title'];
    $desc = $attributes['desc'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-valor">
        <div class="wrap d-flex">
            <div class="image">
                <img src="<?php echo $image; ?>" alt="">
            </div>
            <div class="content">
                <h4 class="name fs-3"><?php echo $title; ?> <span class="bullet"></span></h4>
                <div class="desc">
                    <p><?php echo $desc; ?></p>
                </div>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
