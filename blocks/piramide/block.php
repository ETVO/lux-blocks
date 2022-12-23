<?php

function render_block_piramide($attributes, $content)
{
    $image = $attributes['image'];

    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];

    $btnLink = $attributes['btnLink'];
    $btnText = $attributes['btnText'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-piramide">
        <div class="container default-lux">
            <div class="title">
                <h2 class="fs-1"><?php echo $title; ?></h2>
                <span class="subtitle caveat"><?php echo $subtitle ?></span>
            </div>


            <div class="wrap">
                <div class="image">
                    <img src="<?php echo $image; ?>" alt="">
                </div>
                <div class="niveis">
                    <?php echo $content; ?>
                </div>
            </div>

            <div class="action">
                <a href="<?php echo $btnLink; ?>" class="btn-cta format-strong">
                    <?php echo $btnText; ?>
                </a>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
