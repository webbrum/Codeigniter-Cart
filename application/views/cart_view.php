<h1>Kundvagn</h1>
<?php if($this->cart->total_items() > 0): ?>
<form action="<?php echo site_url(); ?>/cart/update" method="post">
    <?php $i = 1; ?>
<table id="cartTable">
<tr>
    <thead>
    <td>Artikel</td>
    <td>Pris</td>
    <td>Antal</td>
    <td>Radsumma</td>
    <td></td>
    </thead>
</tr>
<?php foreach($this->cart->contents() as $row): ?>
<input type="hidden" name="<?php echo $i; ?>[rowid]" value="<?php echo $row['rowid']; ?>" />
<tr>
    <td><a href="<?php echo site_url(); ?>/product/id/<?php echo $row['id']; ?>"><?php echo $row['name']; ?></a></td>
    <td><?php echo $this->cart->format_number($row['price']); ?> kr</td>
    <td><input type="text" name="<?php echo $i; ?>[qty]" value="<?php echo $row['qty']; ?>" size="3" /></td>
    <td><?php echo $this->cart->format_number($row['subtotal']); ?> kr</td>
    <td><a href="<?php echo site_url(); ?>/cart/remove/<?php echo $row['rowid']; ?>" style="text-decoration: underline;">Ta bort</a></td>
</tr>
<?php $i++; ?>
<?php endforeach; ?>
</table>
<span style="float: right; font-size: 16px;margin-bottom: 10px;color: #222;"><strong>Totalt:</strong> <?php echo $this->cart->format_number($this->cart->total()); ?> kr</span>
<br /><br />
<div style="float: right;">
    <input type="button" value="Töm kundvagn" onclick="emptyCart()" />
    <input type="submit" value="Uppdatera" />
    <input type="button" value="Till kassa" onclick="toCheckout()" />
</div>
</form>


<?php else: ?>
<p class="littleHeader">Din kundvagn är tom.</p>
<?php endif; ?>