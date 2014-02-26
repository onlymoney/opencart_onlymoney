<?php
 /**
 *  @param entry_merchant - string, user's unique Onlymoney merchant ID
 *  @param entry_api_url - url, Onlymoney api URL
 *  @param onlymoney_secret_key - string, user's unique secret Key from Onlymoney account
 */
?>

<?php echo $header; ?>
<div id="content">
    <div class="breadcrumb">
        <?php foreach ($breadcrumbs as $breadcrumb) { ?>
        <?php echo $breadcrumb['separator']; ?>
        <a href="<?php echo $breadcrumb['href']; ?>"><?php echo $breadcrumb['text']; ?></a>
        <?php } ?>
    </div>
    <?php if ($error_warning) { ?>
    <div class="warning"><?php echo $error_warning; ?></div>
    <?php } ?>

    <div class="box">
        <div class="heading">
            <h1>
                <img src="view/image/payment.png" alt="" /> <?php echo $heading_title; ?>
            </h1>

            <div class="buttons">
                <a onclick="$('#form').submit();" class="button"><span><?php echo $button_save; ?></span></a><a onclick="location = '<?php echo $cancel; ?>';" class="button"><span><?php echo $button_cancel; ?></span></a>
            </div>
        </div>

        <div class="content">

            <div class = "instructions"> <?php echo $instructions; ?> </div>

            <form action="<?php echo $action; ?>" method="post" enctype="multipart/form-data" id="form">
                <table class="form">
                    <tr>
                        <td>
                            <span class="required">*</span> <?php echo $entry_merchant; ?>
                        </td>
                        <td>
                            <input type="text" name="onlymoney_merchant" value="<?php echo $onlymoney_merchant; ?>" />
                            <?php if ($error_merchant) { ?>
                            <span class="error"><?php echo $error_merchant; ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td>
                            <span class="required">*</span> <?php echo $entry_api_url; ?>
                        </td>
                        <td>
                            <input type="text" name="onlymoney_api_url" value="<?php echo $onlymoney_api_url; ?>" />
                            <?php if ($error_api_url) { ?>
                            <span class="error"><?php echo $error_api_url; ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td>
                            <span class="required">*</span> <?php echo $entry_secret_key; ?>
                        </td>
                        <td>
                            <input type="text" name="onlymoney_secret_key" value="<?php echo $onlymoney_secret_key; ?>" />
                            <?php if ($error_secret_key) { ?>
                            <span class="error"><?php echo $error_secret_key; ?></span>
                            <?php } ?></td>
                    </tr>

                    <tr>
                        <td><?php echo $entry_status; ?></td>
                        <td><select name="onlymoney_status">
                            <?php if ($onlymoney_status) { ?>
                            <option value="1" selected="selected"><?php echo $text_enabled; ?></option>
                            <option value="0"><?php echo $text_disabled; ?></option>
                            <?php } else { ?>
                            <option value="1"><?php echo $text_enabled; ?></option>
                            <option value="0" selected="selected"><?php echo $text_disabled; ?></option>
                            <?php } ?>
                        </select></td>
                    </tr>

                    <tr>
                        <td><?php echo $entry_order_status; ?></td>
                        <td><select name="onlymoney_order_status_id">
                            <?php foreach ($order_statuses as $order_status) { ?>
                            <?php if ($order_status['order_status_id'] == $onlymoney_order_status_id) { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>" selected="selected"><?php echo $order_status['name']; ?></option>
                            <?php } else { ?>
                            <option value="<?php echo $order_status['order_status_id']; ?>"><?php echo $order_status['name']; ?></option>
                            <?php } ?>
                            <?php } ?>
                        </select></td>
                    </tr>

                    <tr>
                        <td><?php echo $entry_sort_order; ?></td>
                        <td>
                            <input type="text" name="onlymoney_sort_order" value="<?php echo $onlymoney_sort_order; ?>" size="1" />
                        </td>
                    </tr>

                </table>
            </form>
        </div>
    </div>

    <?php echo $footer; ?>
