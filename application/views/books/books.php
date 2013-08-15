<button href="#addModal" data-toggle="modal" style='margin-left: 10px;' class="btn btn-success btn-large">Добавить</button>
<br>
<div id="addModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  				<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    				<h3 id="myModalLabel">Добавление</h3>
	  				</div>
	 				<div class="modal-body">
	   					<p>
	   					
		   					<form action="http://localhost/books/index.php/books/create" method="POST" enctype="multipart/form-data">
		   						<fieldset>
								    <label>Название книги</label>
								    <input id="title" name="title" required type="text" placeholder="Введите название...">
								    
								    <div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-preview thumbnail" style="width: 210px; height: 150px;"></div>
									    <span class="btn btn-file"><span class="fileupload-new">Выбрать картинку</span><span class="fileupload-exists">Изменить</span><input id="image" type="file" name="image" /></span>
									    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Удалить</a>
									</div>
									
									<label>Выберите авторов</label>
									<select id='id_authors' name="id_authors[]" multiple="multiple" style="height:100px;"required >
									  <?php foreach ($authors as $authors_item):?>
									  <?php echo "<option value='{$authors_item['id_author']}'>".$authors_item['firstName']." ".$authors_item['lastName']."</option>"?>
									  <?php endforeach ?>
									</select>
									
									<label>Выберите жанры</label>
									<select id='id_genres' name="id_genres[]" multiple="multiple" style="height:100px;" required >
									  <?php foreach ($genres as $genres_item):?>
									  <?php echo "<option value='{$genres_item['id_genre']}'>".$genres_item['title']."</option>"?>
									  <?php endforeach ?>
									</select>				
</fieldset>
	   					</p>
	  				</div>
	 				<div class="modal-footer">
	    				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Отменить</button>
	    				<button class="btn btn-success" type="submit">Добавить</button>
	    				</form>
	    				
	  			</div>
</div>



<div style="width: 80%">
<?php foreach ($books as $books_item): ?>
<li class="books" id="book<?php echo $books_item['ISBN'] ?>">
	<div  style="margin:25px; width: 140px; display: inline-block; float: left;">
			<img  class="img-rounded" src="data:image/png;base64,<?=base64_encode($books_item['image']);?>" width='100px' heigth='200px' />
			<b><?php echo $books_item['title']." "; ?></b><br>
			
			<?php foreach ($books_item['genres'] as $genres_item): ?>
			<?php echo "<span style='font-size:10px;'>".$genres_item['title']."</span><br>"?>
			<?php endforeach ?>
			
			<?php foreach ($books_item['authors'] as $authors_item): ?>
			<?php echo $authors_item['firstName']." ".$authors_item['lastName']."<br>"?>
			<?php endforeach ?>
			<button href="#editModal<?php echo $books_item['ISBN'] ?>"  data-toggle="modal"  class="btn btn-primary btn-mini">Редактировать</button>
			<button href="#myModal<?php echo $books_item['ISBN'] ?>" data-toggle="modal" class="btn btn-danger btn-mini" >Удалить</button>
			<!-- Модальное окно для удаления -->		
				<div id="myModal<?php echo $books_item['ISBN'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  				<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    				<h3 id="myModalLabel">Удаление</h3>
	  				</div>
	 				<div class="modal-body">
	   					<p>Вы действительно хотите удалить книгу <span style="color: green; font-weight: bold;"><?php echo $books_item['title'] ?></span> ?</p>
	  				</div>
	 				<div class="modal-footer">
	    				<button class="btn" data-dismiss="modal" aria-hidden="true">Нет</button>
	    				<button class="btn btn-danger" data-dismiss="modal" onclick="deleteBook('<?php echo $books_item['ISBN'] ?>')">Да</button>
	  				</div>
  			
				</div>
		  	<!-- Модальное окно для удаления -->	
		  	<!-- Модальное окно для изменения -->		
				<div id="editModal<?php echo $books_item['ISBN'] ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
	  				<div class="modal-header">
	    				<button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
	    				<h3 id="myModalLabel">Добавление</h3>
	  				</div>
	 				<div class="modal-body">
	   					<p>
	   					
		   					<form action="http://localhost/books/index.php/books/update" method="POST" enctype="multipart/form-data">
		   						<fieldset>
								    <label>Название книги</label>
								    <input id="title" name="title" value="<?php echo $books_item['title'];?>" required type="text" placeholder="Введите название...">
								    
								    <input type="hidden" name="isbn" value="<?php echo $books_item['ISBN'];?>" />
								   
								    <div class="fileupload fileupload-new" data-provides="fileupload">
									<div class="fileupload-preview thumbnail" style="width: 210px; height: 150px;"><img  class="img-rounded" src="data:image/png;base64,<?=base64_encode($books_item['image']);?>"/></div>
									    <span class="btn btn-file"><span class="fileupload-new">Выбрать картинку</span><span class="fileupload-exists">Изменить</span><input id="image" type="file" name="image" /></span>
									    <a href="#" class="btn fileupload-exists" data-dismiss="fileupload">Удалить</a>
									</div>
									
									<label>Выберите авторов</label>
									<select id='id_authors' name="id_authors[]" multiple="multiple" style="height:100px;"required >
									  <?php foreach ($authors as $authors_item):?>
									  	<?php foreach ($books_item['authors'] as $authors_item_selected): ?>
											<?php if ($authors_item_selected['id_author'] == $authors_item['id_author']) {
												echo $authors_item_selected['id_author']." ".$authors_item['id_author'];
												$selected = "selected";
											}?>
										<?php endforeach ?>
										  
										  <?php echo "<option ".$selected." value='{$authors_item['id_author']}'>".$authors_item['firstName']." ".$authors_item['lastName']."</option>";$selected = null;?>
									 
									  <?php endforeach ?>
									</select>
									
									<label>Выберите жанры</label>
									<select id='id_genres' name="id_genres[]" multiple="multiple" style="height:100px;" required >
									  <?php foreach ($genres as $genres_item):?>
									  <?php foreach ($books_item['genres'] as $genres_item_selected): ?>
											<?php if ($genres_item_selected['id_genre'] == $genres_item['id_genre']) {
												$selected = "selected";
											}?>
										<?php endforeach ?>
									  <?php echo "<option ".$selected." value='{$genres_item['id_genre']}'>".$genres_item['title']."</option>";$selected = null;?>
									  <?php endforeach ?>
									</select>				
</fieldset>
	   					</p>
	  				</div>
	 				<div class="modal-footer">
	    				<button class="btn btn-danger" data-dismiss="modal" aria-hidden="true">Отменить</button>
	    				<button class="btn btn-success" type="submit">Редактировать</button>
	    				</form>
	    				
	  			</div>
</div>
		  	<!-- Модальное окно для изменения -->		
			
	</div>
	</li>
<?php endforeach ?>
</div>



<script>
/*function addBook() {
	 $.ajax({   type:"POST",
			url: "http://localhost/books/index.php/books/create",
			data: {	title: $('#title').val(), id_authors: $('#id_authors').val(),
					id_genres: $('#id_genres').val()}, 
           	asynchronous: true,
	 		success: function() {
      				alert('sdf');
			}
			}); 
		
}*/
function deleteBook(isbn)
{
                 $.ajax({   type:"POST",
                   			url: "http://localhost/books/index.php/books/delete",
                   			data: 'isbn=' + isbn, 
                    		asynchronous: true,
                    		cashe: false,
                    		success: function() {
			                    $('#book'+isbn).hide('slow');
			                }
			            }); 
}
</script>