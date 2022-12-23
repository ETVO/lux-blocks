<?php

function render_block_heading($attributes)
{


    $title = $attributes['title'];
    $text = $attributes['text'];
    $color = $attributes['color'];

    if($color == '') $color = 'yellow';

    ob_start(); // Start HTML buffering
?>

    <div class="lux-heading">
        <div class="container default-lux">
            <div class="wrap d-flex flex-column-reverse flex-md-row">
                <div class="content flex-fill">
                    <h1 class="title">
                        <?php echo $title; ?>
                    </h1>
                    <p class="text">
                        <?php echo $text; ?>
                    </p>
                </div>
                <div class="spheres <?php echo $color; ?>"></div>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
