<div class="row">
	<center><div class="span12">

<?php foreach ($books as $books_item): ?>
	<div class="span3" style="margin:25px;">
			<img style="display:  table;" class="img-rounded" src="data:image/png;base64,<?=base64_encode($books_item['image']);?>" width='100px' heigth='200px' />
			<b><?php echo $books_item['title']." "; ?></b><br>
			Жанр<br>
			Автор<br>
			<button class="btn btn-primary btn-mini">Редактировать</button>
			 <button class="btn btn-danger btn-mini">Удалить</button>
	</div>
<?php endforeach ?>
</div>
</center>
</div>