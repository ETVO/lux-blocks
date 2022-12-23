<?php

function render_block_cta($attributes)
{
    $image = $attributes['image'];
    $title = $attributes['title'];
    $text = $attributes['text'];
    $btnText = $attributes['btnText'];
    $btnLink = $attributes['btnLink'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-cta carousel-item">
        <div class="container default-lux">
            <div class="title">
                <h1><?php echo $title; ?></h1>
            </div>
            <div class="d-flex flex-column flex-lg-row">
                <div class="content mb-3 mb-lg-0">
                    <div class="text">
                        <?php echo $text; ?>
                    </div>
                    <div class="action">
                        <a href="<?php echo $btnLink ?>" class="btn-cta">
                            <?php echo $btnText; ?>
                        </a>
                    </div>
                </div>
                <div class="image">
                    <img src="<?php echo $image; ?>">
                </div>
            </div>
        </div>
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
