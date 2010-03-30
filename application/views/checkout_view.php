<script type="text/javascript">
    function checkedFunc()
    {
        $(document).ready(function() {
            payType = $("input[name='pay_type']:checked").val();
        
        
        if (payType == 'post') {
            $('#usePost').show();
            $('#useCard').hide();
        }
        else
        {
            $('#usePost').hide();
            $('#useCard').show();
        }
        });
    }
    checkedFunc();
    
    $(document).ready(function() {
        $("input[name='number_advice']").attr('disabled','disabled');
        $("input[name='advice_type']").click(function(){
            adviceNr = $("input[name='advice_type']:checked").val();
            if(adviceNr == 'sms')
            {
                $("input[name='number_advice']").removeAttr('disabled');
            }
            else
            {
                $("input[name='number_advice']").attr('disabled','disabled');
            }
        });
    });
</script>


<h1>Kassa</h1>
<div id="usePost">
    <h2><span style="color: #111;">1) Ange uppgifter</span><br />2) Bekfärfta<br />3) Klart</h2>
</div>

<div id="useCard">
    <h2><span style="color: #111;">1) Ange uppgifter</span><br />2) Bekfärfta<br />3) Betala<br />4) Klart</h2>
</div>

<?php  if (validation_errors()): ?>
<div style="margin: 0 0 13px 0;">
<?php echo validation_errors('<div class="validationError">', '</div>'); ?>
</div>
<?php endif; ?>

<h3>Betalsätt</h3>
<form action="<?php echo site_url(); ?>checkout/confirm" method="post">

<fieldset>
    <p>
        <input type="radio" name="pay_type" value="card" onclick="checkedFunc();" <?php if(set_value('pay_type') == 'card' || !validation_errors()): ?> checked="checked" <?php endif; ?> /> Kortbetalning via <a href="http://www.paypal.se/" style="text-decoration: underline;" target="_blank">PayPal</a> (+0 kr)
    </p>
    <p>
        <input type="radio" name="pay_type" value="post" onclick="checkedFunc();" <?php if(set_value('pay_type') == 'post'): ?> checked="checked"  <?php endif; ?> /> Postförskott (+46 kr)
    </p>
<br />
</fieldset>

<h3>Leveransadress</h3>
<p>Alla fält med * är obligatoriska.</p>
<fieldset>
    <p>
        <label>Förnamn *</label>
        <input type="text" name="first_name" value="<?php echo set_value('first_name'); ?>" />
    </p>
    <p>
        <label>Efternamn *</label>
        <input type="text" name="last_name" value="<?php echo set_value('last_name'); ?>" />
    </p>
    <p>
        <label>Företag</label>
        <input type="text" name="company" value="<?php echo set_value('company'); ?>" />
    </p>
    <p>
        <label>Adress *</label>
        <input type="text" name="address" value="<?php echo set_value('address'); ?>" />
    </p>
    <p>
        <label>Ort *</label>
        <input type="text" name="city" value="<?php echo set_value('city'); ?>" />
    </p>
    <p>
        <label>Postnummer *</label>
        <input type="text" name="postcode" value="<?php echo set_value('postcode'); ?>" />
    </p>
    <p>
        <label>Telefon</label>
        <input type="text" name="phone" value="<?php echo set_value('phone'); ?>" />
    </p>
    <p>
        <label>E-post *</label>
        <input type="text" name="email" value="<?php echo set_value('email'); ?>" />
    </p>
</fieldset><br />

<h3>Avisering</h3>
<fieldset>
    <p>
        <input type="radio" name="advice_type" value="letter" <?php if(set_value('advice_type') == 'letter' || !validation_errors()): ?> checked="checked" <?php endif; ?> /> Brev-avisering
    </p>
    <p>
        <input type="radio" name="advice_type" value="sms" <?php if(set_value('advice_type') == 'sms'): ?>checked="checked"<?php endif; ?> /> SMS-avisering <br />
        Mobilnummer: <input type="text" name="number_advice" value="<?php echo set_value('number_advice'); ?>" />
    </p>
</fieldset>
<br />
    <p>
        <input type="submit" value="Gå vidare" />
    </p>

</form>