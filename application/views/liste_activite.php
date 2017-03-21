<?php if(!empty($activites)) : ?>
<?php foreach($activites as $activity) : ?>
<?php if(!empty($activity->activity)) : ?>
	<article class="normal">
		<figure>
			<i class="fa fa-trophy" aria-hidden="true"></i>
		</figure>
		<h2 class="title"><a class="<?=$activity->activity;?>" onclick="test(this.className)"><?=$activity->activity;?></a></h2>
	</article>
<?php endif;?>
<?php endforeach;?>
<?php else: ?>
	<article class="error">
		<h2 class="title">Aucune activitée n'as été trouvée dans cette région : <b class="region"></b></h2>
	</article>
<?php endif;?>