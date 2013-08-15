<table class="table table-striped table-hover" style="width:40%; margin:0 auto; ">
	<thead><tr><th>№</th><th>Имя автора</th></tr></thead>
	<?php $count = 0;?>
	<?php foreach ($authors as $authors_item): ?>
	 <?php $count++;?>
	    
	    
	    <tr>
	    	<td><?php echo $count;?></td>
	    	<td><a href="<?php echo URL."index.php/authors/".$authors_item['id_author'] ?>">
	    		<?php echo $authors_item['firstName']." "; echo $authors_item['lastName']; ?></a></td></tr>
	
	<?php endforeach ?>

</table>	
