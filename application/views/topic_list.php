		<div class="list-group list-group-flush">
		<?php
		// id 값에 따른 해당 url 링크 설정
		foreach ($topics as $entry) {
		?>
		<a class="list-group-item list-group-item-action list-group-item-light p-3" href="/index.php/topic/get/<?=$entry->id?>"
			id="content_css"><?=$entry->title?></a>	
		<?php
		}
		?>
	</div>
</div>
</a>