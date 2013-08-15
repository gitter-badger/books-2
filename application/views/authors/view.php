<div style="width: 80%">
<?php foreach ($books as $books_item): ?>
<li class="books">
	<div id="book<?php echo $books_item['ISBN'] ?>" style="margin:25px; width: 140px; display: inline-block; float: left;">
			<img  class="img-rounded" src="data:image/png;base64,<?=base64_encode($books_item['image']);?>" width='100px' heigth='200px' />
			<b><?php echo $books_item['title']." "; ?></b><br>
			
			<?php foreach ($books_item['genres'] as $genres_item): ?>
			<?php echo "<span style='font-size:10px;'>".$genres_item['title']."</span><br>"?>
			<?php endforeach ?>
			
				<?php foreach ($books_item['authors'] as $authors_item): ?>
			<?php echo $authors_item['firstName']." ".$authors_item['lastName']."<br>"?>
			<?php endforeach ?>
	</div>
	</li>
<?php endforeach ?>
</div>