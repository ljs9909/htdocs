<div class="mb-4">
    <article>
        <h1><?=$topic->title?></h1>
        <div>
        	<div><?=kdate($topic->created)?></div>
            <?=auto_link($topic->description)?>
        </div>
    </article>
    <div>
    	<a href="/index.php/topic/add" class="btn btn-primary">등록</a>
        <a href="/index.php/topic/update/<?=$topic->id?>" class="btn btn-secondary">수정</a>
        <a href="/index.php/topic/delete/<?=$topic->id?>" class="btn btn-danger">삭제</a>
    </div>
</div>