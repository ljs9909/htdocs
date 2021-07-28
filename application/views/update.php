<form action="/index.php/topic/update/<?=$id?>" method="POST" id="input_form">


	<div class="mb-3">
	  	<input type="text" class="form-control" id="title" name="title"placeholder="제목">
	</div>
	<div class="mb-3">
	  	<textarea class="form-control" id="description" rows="10" name="description" placeholder="본문"></textarea>
	</div>

	<input type="submit" value="수정" class="btn btn-primary"/>
	
</form>


<form action="/index.php/topic/back" method="GET" style="margin-left: 10px">
		<input type="submit" value ="뒤로가기" class="btn btn-secondary"/>
</form>