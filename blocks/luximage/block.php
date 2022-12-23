<?php

function render_block_luximage($attributes)
{
    $image = $attributes['image'];

    $title = $attributes['title'];
    $subtitle = $attributes['subtitle'];

    $showDesktop = $attributes['showDesktop'];
    $showTablet = $attributes['showTablet'];
    $showMobile = $attributes['showMobile'];
    $classes = $attributes['classes'];

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

    <div class="lux-luximage <?php echo $display_class . ' ' . $classes; ?>">        
        <img src="<?php echo $image; ?>" alt="">
    </div>

<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
