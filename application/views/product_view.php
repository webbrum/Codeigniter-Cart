<?php foreach($query->result() as $row): ?>
    <div id="productImage">
        <a href="/assets/graphics/products/<?php echo $row->image; ?>">
        <img src="/assets/graphics/products/<?php echo $row->image; ?>" alt="<?php echo $row->name; ?>" border="0" /></a>
    </div>
    
    <div id="productContent">
        <h1><?php echo $row->name; ?></h1>
        <p class="littleHeader"><?php echo $row->short_description; ?></p>
        <p>
            <?php echo nl2br($row->description); ?>
        </p>
    </div>
    <br />
    <p>
        <strong>Pris:</strong> <?php echo $row->price; ?> kr<br /><br />
        <input type="button" value="Lägg till kundvagn" onclick="addCart(<?php echo $row->id; ?>)" />
    </p>
    
<?php endforeach; ?>

