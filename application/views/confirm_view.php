<h1>Bekräfta beställning</h1>
<?php if($this->session->userdata('pay_type') == 'card'): ?>
<h2>1) Ange uppgifter<br />
<span style="color: #111;">
2) Bekfärfta</span><br />
3) Betala<br />
4) Klart</h2>
<?php else: ?>
<h2>1) Ange uppgifter<br />
<span style="color: #111;">
2) Bekfärfta</span><br />
3) Klart</h2>
<?php endif; ?>

<?php if($this->cart->total_items() > 0): ?>
    <?php $i = 1; ?>
<table id="cartTable">
<tr>
    <thead>
    <td>Artikel</td>
    <td>Pris/st</td>
    <td>Antal</td>
    <td>Radsumma</td>
    </thead>
</tr>
<?php foreach($this->cart->contents() as $row): ?>
<input type="hidden" name="<?php echo $i; ?>[rowid]" value="<?php echo $row['rowid']; ?>" />
<tr>
    <td><?php echo $row['name']; ?></td>
    <td><?php echo $this->cart->format_number($row['price']); ?> kr</td>
    <td><?php echo $row['qty']; ?></td>
    <td><?php echo $this->cart->format_number($row['subtotal']); ?> kr</td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table><!-- end cartTable-->

<ul id="confirmTotal">
    <li><strong>Summa:</strong> <?php echo $this->cart->total(); ?> kr</li>
    <li><strong>Fast fraktavgift:</strong> <?php echo $this->cart->format_number('49'); ?> kr</li>
    <?php if($this->session->userdata('pay_type') != 'card'): ?>
    <li><strong>Postförskottsavgift:</strong> <?php echo $this->cart->format_number('49'); ?> kr</li>
    <?php endif; ?>
    <li><strong>Moms ingår:</strong> <?php echo $this->cart->total() / 4; ?> kr</li>
    <li style="font-size: 19px;padding-top: 10px;">
        <strong>Totalt:</strong>
        <?php if($this->session->userdata('pay_type') == 'card'): ?>
        <?php echo $this->cart->format_number($this->cart->total()+49); ?> kr
        <?php else: ?>
        <?php echo $this->cart->format_number($this->cart->total()+49+49); ?> kr
        <?php endif; ?>
    </li>
</ul><!-- end confirmTotal-->


<?php else: ?>
<p>Youre cart is empty</p>
<?php endif; ?>

<h3>Leveransadress</h3>
<div id="confirmDelivery">
<p>
    <strong>Förnamn:</strong> <?php echo $this->session->userdata('first_name'); ?>
</p>
<p>
    <strong>Efternamn:</strong> <?php echo $this->session->userdata('last_name'); ?>
</p>
<p>
    <strong>Adress:</strong> <?php echo $this->session->userdata('address'); ?>
</p>
<p>
    <strong>Ort:</strong> <?php echo $this->session->userdata('city'); ?>
</p>
<p>
    <strong>Postnummer:</strong> <?php echo $this->session->userdata('postcode'); ?>
</p>
<p>
    <strong>Telefon:</strong> <?php echo $this->session->userdata('phone'); ?>
</p>
<p>
    <strong>E-post:</strong> <?php echo $this->session->userdata('email'); ?>
</p>
</div>

<br />


<?php if($this->session->userdata('pay_type') == 'card'): ?>

<form action="https://www.paypal.com/cgi-bin/webscr" method="post">
    <input type="hidden" name="business" value="info@smartprodukt.se" />
    <input type="hidden" name="cmd" value="_cart" upload="1" />
    <input type="hidden" name="upload" value="1" />
    <input type="hidden" name="currency_code" value="SEK" />
    <input type="hidden" name="handling_cart" value="49" />
    
    <input type="hidden" name="address1" value="<?php echo $this->session->userdata('address'); ?>" />
    <input type="hidden" name="city" value="<?php echo $this->session->userdata('city'); ?>" />
    <input type="hidden" name="country" value="SE" />
    <input type="hidden" name="email" value="<?php echo $this->session->userdata('email'); ?>" />
    <input type="hidden" name="first_name" value="<?php echo $this->session->userdata('first_name'); ?>" />
    <input type="hidden" name="last_name" value="<?php echo $this->session->userdata('last_name'); ?>" />
    <input type="hidden" name="zip" value="<?php echo $this->session->userdata('postcode'); ?>" />
    <input type="hidden" name="return" value="http://www.smartprodukt.se/checkout/finish" />
    <input type="hidden" name="cbt" value="Finish Order" />
    <input type="hidden" name="lc" value="SE" />
    <INPUT TYPE="hidden" name="charset" value="utf-8" />
    
    <?php $i=1; foreach($this->cart->contents() as $row): ?>
    <input type="hidden" name="item_name_<?php echo $i++; ?>" value="<?php echo $row['name']; ?>" />
    <input type="hidden" name="amount_<?php echo $i-1; ?>" value="<?php echo $row['price']; ?>" />
    <input type="hidden" name="quantity_<?php echo $i-1; ?>" value="<?php echo $row['qty']; ?>" />
    <?php endforeach; ?>
    
    <input type="submit" value="Gå vidare" />
</form>


<?php else: ?>

<form action="<?php echo site_url(); ?>checkout/finish" method="post">
    <input type="submit" value="Gå vidare" />
</form>

<?php endif; ?>