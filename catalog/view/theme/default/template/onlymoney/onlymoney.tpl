<?php
 /**
 *  @param status_content - string, notices payment result
 *    (failed or cancelled etc)
 */
?>

<?php echo $header; ?><?php echo $column_left; ?><?php echo $column_right; ?>
<div id="content"><?php echo $content_top; ?>

    <h1><?php echo $heading_title; ?></h1>
    <div class="content"><?php echo $status_content; ?></div>

    <?php echo $content_bottom; ?></div>
<?php echo $footer; ?>
