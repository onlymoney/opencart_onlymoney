       <form action="<?php echo $action; ?>" method="post" id="payment">

           <input type="hidden" name="operation" value="<?php echo $operation; ?>" />
           <input type="hidden" name="signature" value="<?php echo $signature; ?>" />
           <input type="hidden" name="description" value="<?php echo $description; ?>" />
           <input type="hidden" name="act" value="custom" />

  <div class="buttons">
    <div class="right"><a onclick="$('#payment').submit();" class="button"><span><?php echo $button_confirm; ?></span></a></div>
  </div>
</form>
