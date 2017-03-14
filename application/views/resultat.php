<div class="container">
	<div class="row">
		<style>#mapid{height:180px;}td,th{padding:1%}article{border:1px solid black;margin:1%;padding:1%;}.normal{border-radius:5px;}article>a{float:right;}</style>
		<div class="col-md-12">
			<div class="panel panel-default">
				<div class="panel-heading">
					<h3 class="panel-title">HandiKap</h3>
				</div><!-- .panel-heading -->
				<div class="panel-body">
<?php foreach($data2 as $id => $data) : ?>
					<article class="normal">
						<h2><?=$data->name_est?></h2>
<?php if($data->email_contact) : ?>
						<p><b>Contact :</b> <?=$data->email_contact?></p>
<?php endif;?>
<?php if($data->siteweb) : ?>
						<p><b>Site Web :</b> <?=$data->siteweb?></p>
<?php endif;?>
						<p><b>Télephone :</b> <?=$data->phone?></p>
<?php if($data->fax) : ?>
						<p><b>Fax :</b> <?=$data->fax?></p>
<?php endif;?>
<?php if($data->address) : ?>
						<p><b>Adresse :</b> <?=$data->address?></p>
<?php endif;?>
						<a href="view/<?=$data->docid?>">Détails</a>
					</article>
<?php endforeach?>
					<?=$pagination;?>
				</div><!-- .col-md-10 -->
			</div><!-- .row -->
		</div><!-- .container -->
	</div><!-- .col-md-10 -->
</div><!-- .col-md-10 -->