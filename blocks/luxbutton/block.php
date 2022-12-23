<?php

function render_block_luxbutton($attributes)
{
    $title = $attributes['title'];
    $text = $attributes['text'];
    $link = $attributes['link'];

    $format_strong = str_contains($text, '<strong>');

    ob_start(); // Start HTML buffering
?>

    <div class="fw-bold mb-2"><?php echo $title; ?></div>
    <a class="lux-luxbutton btn-cta <?php if ($format_strong) echo 'format-strong'; ?> format-break" 
        href="<?php echo $link; ?>">
        <?php echo $text; ?>
    </a>


<?php

    $output = ob_get_contents(); // collect buffered contents

    ob_end_clean(); // Stop HTML buffering

    return $output; // Render contents
}
