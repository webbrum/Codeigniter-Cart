<div id="sidebar">

    <h3>Våra produkter</h3>
    <ul id="products">
    <?php foreach($sidebar_products->result() as $row): ?>
        <li><a href="<?php echo site_url(); ?>/product/id/<?php echo $row->id; ?>"><?php echo $row->name; ?></a></li>
    <?php endforeach; ?>
    </ul>
</div><!-- end sidebar-->
