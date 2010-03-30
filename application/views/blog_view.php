
<?php foreach($query->result() as $row): ?>
<h1><?php echo $row->header; ?></h1>
<p class="littleHeader"><?php echo $row->show_date; ?></p>
<p><?php echo $row->text; ?></p><br />
<?php endforeach; ?>