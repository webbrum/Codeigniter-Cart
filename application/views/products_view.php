<h1>Våra smarta produkter!</h1>
<p class="littleHeader">
    Här hittar du alla våra smarta och annorlunda produkter.
</p>
<br />

<?php foreach($query->result() as $row): ?>

<div class="productListBox">
    <div class="productListImage">
        <a href="<?php echo site_url(); ?>product/id/<?php echo $row->id; ?>"><img src="/assets/graphics/products/thumb/<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" /></a>
    </div><!-- end productListImage-->
    <div class="productListContent">
        <table style="width: 100%;">
            <tr>
                <td style="height: 70px;vertical-align: top;" colspan="2">
                    <span class="productListHeader"><?php echo $row->name; ?></span>
                    <p class="productListText"><?php echo $row->short_description; ?></p>
                </td>
            </tr>
            <tr>
                <td style="width: 240px;"><strong>Pris:</strong> <?php echo $row->price; ?> kr</td>
                <td><a href="<?php echo site_url(); ?>product/id/<?php echo $row->id; ?>">» Läs mer</a></td>
            </tr>
        </table>
    </div><!-- end productListContent-->
</div><!-- end productListBox-->


<?php endforeach; ?>
