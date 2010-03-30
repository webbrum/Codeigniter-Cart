<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN"
	"http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en">
<head>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <title>Smartprodukt.se :: <?php if(isset($title)){ echo $title; }else{ echo "Handla smarta produkter över nätet!"; } ?></title>
    
    <meta name="keywords" content="smarta produkter smartprodukt enkla produkter handikapphjälpmedel"/>
    <meta name="description" content="En webbutik med ett urval av handikapphjälpmedel och smarta produkter"/>

    <link rel="stylesheet" href="/assets/css/style.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/ie.css" type="text/css" />
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.4.1/jquery.min.js"></script>
    <script type="text/javascript">    
    function toCheckout()
    {
        location.href='<?php echo site_url(); ?>checkout';
    }
    
    function addCart(id)
    {
        location.href='<?php echo site_url(); ?>cart/add/' + id;
    }
    
    function emptyCart()
    {
        location.href='<?php echo site_url(); ?>cart/empty_cart';
    }
    </script>
    <?php if($main_content == 'blog_test_view'): ?>
    <link rel="alternate" href="<?php echo site_url(); ?>rss" type="application/rss+xml" title="RSS" />
    <?php endif; ?>
</head>
<body>
<div id="topBar">
    <div id="logoBar"><a href="<?php echo site_url(); ?>"><img src="/assets/graphics/logo.gif" alt="" /></a></div><!-- end logoBar-->
    <div id="menuBar">
	<ul id="navigation">
	    <li><a href="<?php echo site_url(); ?>">Hem</a></li>
	    <li><a href="<?php echo site_url(); ?>products">Produkter</a></li>
	    <li><a href="<?php echo site_url(); ?>blog">Bloggen</a></li>
	    <li><a href="<?php echo site_url(); ?>condition">Köpvillkor</a></li>
	</ul>
    </div><!-- end menuBar-->
</div><!-- end topBar-->
<div id="mainContainer">
    <div id="leftBar">

    	<div class="infoBox">
	    <div class="infoBoxHeader">Din Kundvagn</div>
	    <div class="infoBoxContent">
                <?php if($this->cart->total_items() > 0): ?>
                <ul>
                    <?php foreach($this->cart->contents() as $row): ?>
                    
                    <li><?php echo $row['qty']; ?>x <?php echo substr($row['name'], 0, 9); ?>.. <?php echo $this->cart->format_number($row['subtotal']); ?> kr</li>
                    
                    <?php endforeach; ?>
                    <li><br /></li>
                    <li><strong>Totalt:</strong> <?php echo $this->cart->format_number($this->cart->total()); ?> kr</li>
                </ul>
                <br />
                <ul>
                    <li><input type="button" value="Ändra kundvagn" onclick="location.href='<?php echo site_url(); ?>cart';" /></li>
                    <li><input type="button" value="Kassa" onclick="location.href='<?php echo site_url(); ?>checkout';" /></li>
                </ul>
                <?php else: ?>
                <p>Din kundvagn är tom.</p>
                <?php endif; ?>
	    </div><!-- end infoBoxContent-->
	</div><!-- end infoBox-->
	    
	<div class="infoBox">
	    <div class="infoBoxHeader">Live chatt</div>
	    <div class="infoBoxContent">
                <iframe src="http://www.google.com/talk/service/badge/Show?tk=z01q6amlqbn4edl5lbmouu0am4aavks4kju8l0jf9ic1o668oqmngimqe2oqne0ri8o1gkt9v213g86a5h65urlu11sf9i0khi670tbs7gp6n5u40rnc99u5r54n5af4ts57d586u73hu09m96iv69hkim96d1ab4evvj46f38o6pfg9ruktjjvn2n6kuc4r8tst8bunm02h61jee422g1vmoahog&amp;w=180&amp;h=60" allowtransparency="true" width="180" frameborder="0" height="60"></iframe>
	    </div><!-- end infoBoxContent-->
            
            
	</div><!-- end infoBox-->
	<div class="infoBox">
	    <div class="infoBoxHeader">Nyhetsbrev</div>
	    <div class="infoBoxContent">
                <form action="<?php echo site_url(); ?>shop/newsletter" method="post" />
                <p>Håll dig uppdaterad med nya produkter och viktiga uppdateringar.</p>
                <p>
                    <label>E-post:</label>
                    <input type="text" name="email" /><br />
                </p>
                <br />
                <p>
                    <input type="submit" value="Gå med" />
                </p>
                </form>
	    </div><!-- end infoBoxContent-->
	</div><!-- end infoBox-->
	
    </div><!-- end leftBar-->
    <div id="mainContent">
