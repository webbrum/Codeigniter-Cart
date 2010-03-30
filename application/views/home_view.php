<h1>Hejsan, vi har nyss..</h1>
<p class="littleHeader">
    öppnat upp, så allt kanske inte är 100% klart ännu men du ska i alla fall lyckas handla utan
    problem.
</p>
<p>
    Smartprodukt.se är en nyöppnad webbutik med vision att erbjuda ovanliga och smarta produkter.
    Webbutiken drivs utav mig (Glenn) som är en studerande webbutvecklare i Stockholm.
    Hoppas du kan hitta något som passar dig, välkommen!
</p>
<br />
<div id="homeLeft" style="float: left; width: 180px;">
    <div class="infoBox">
	    <div class="infoBoxHeader">Senaste produkt</div>
	    <div class="infoBoxContent">
                <?php foreach($queryProduct->result() as $row): ?>
                <h3><?php echo $row->name; ?></h3>
                <p style="text-align: center;padding: 10px 0;">
                <a href="<?php echo site_url(); ?>/product/id/<?php echo $row->id; ?>"><img src="/assets/graphics/products/thumb/<?php echo $row->image; ?>" alt="" /></a><br />
                </p>
                <a href="<?php echo site_url(); ?>/product/id/<?php echo $row->id; ?>">» Läs mer</a>
                <?php endforeach; ?>
	    </div><!-- end infoBoxContent-->
    </div><!-- end infoBox-->
</div>

<div id="homeRight" style="float: left; width: 350px; margin-left: 20px;">
    <div class="infoBox">
	    <div class="infoBoxHeader">Erbjudande</div>
	    <div class="infoBoxContent">
                <h3>Få en gratis Fingermus!</h3>
                <p style="padding-bottom: 10px;">
                    Om du handlar för över 500 kr får du just nu
                    en gratis Fingermus på köpet. Erbjudandet gäller tills
                    lagret är slut.
                </p>
                <a href="<?php echo site_url(); ?>/product/id/2">» Se Fingermusen</a>
	    </div><!-- end infoBoxContent-->
    </div><!-- end infoBox-->
    <div class="infoBox">
	    <div class="infoBoxHeader">Senaste från bloggen</div>
	    <div class="infoBoxContent">
                <?php foreach($queryBlog->result() as $row): ?>
                <h3><?php echo $row->header; ?></h3>
                <p><strong><?php echo $row->show_date; ?></strong></p>
                <p style="padding: 10px 0;"><?php echo substr($row->text, 0, 100); ?>..</p>
                <a href="<?php echo site_url(); ?>/blog">» Läs mer</a>
                <?php endforeach; ?>
	    </div><!-- end infoBoxContent-->
    </div><!-- end infoBox-->
</div>