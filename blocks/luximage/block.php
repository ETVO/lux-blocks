<?php

function render_block_luximage($attributes)
{
    $image = $attributes['image'];

    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];

    $showDesktop = $attributes['showDesktop'];
    $showTablet = $attributes['showTablet'];
    $showMobile = $attributes['showMobile'];

    $display_class = 'd-none';

    if ($showMobile) {
        $display_class = ' d-block';
        if (!$showTablet) {
            $display_class .= ' d-sm-none';

            if ($showDesktop) {
                $display_class .= ' d-xl-block';
            }
        }
        else if(!$showDesktop) {
            $display_class .= ' d-xl-none';
        }
    }
    else {
        if ($showTablet) {
            $display_class .= ' d-sm-block';
            
            if (!$showDesktop) {
                $display_class .= ' d-xl-none';
            }
        }
        else if($showDesktop) {
            $display_class .= ' d-xl-block';
        }
    }

    $btnLink = $attributes['btnLink'];
    $btnText = $attributes['btnText'];

    ob_start(); // Start HTML buffering
?>

    <div class="lux-luximage <?php echo $display_class; ?>">
        <div class="container default-lux">
            <div class="title">
                <h2 class="fs-1">Planejamento de Marketing</h2>
                <span class="subtitle caveat">(de verdade!)</span>
            </div>
        </div>
        
        <div class="wrap">
            <div class="image">
                <img src="<?php echo $image; ?>" alt="">
            </div>
        </div>
        
        <div class="container default-lux">
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
