<?php defined('SYSPATH') or die('No direct script access.');?>

<style>
	.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:focus,
	.nav-tabs > li.active > a:hover {
		font-weight: bold;
	}

	.nav-tabs {
		border-bottom: 0px solid #ddd;
	}
</style>

<div id="title">Реагенты</div>

<div id="edit">
	<?=Html::anchor('data2/add_subgroup/', '+ Добавить реагент')?>
</div>
<br/><br/>

<div class="row col-lg-12">
	<ul class="nav nav-tabs">
		<?$i = 1;foreach($groups as $group){?>
			<li <?=$i == 1 ? 'class="active"' : ''?>>
				<a data-toggle="tab" href="#h_<?=$group->id?>" aria-expanded="true"><?=$group->title?></a>
			</li>
		<?$i++;}?>
	</ul>

	<div class="tab-content">
		<?$i = 1;foreach($groups as $group){?>
			<div id="h_<?=$group->id?>" class="tab-pane fade <?=$i == 1 ? 'active in' : ''?>">
				<table class="table table-striped">
					<thead>
						<tr>
							<th>Реагент</th>
							<th>Фирма</th>
						</tr>
					</thead>
					<?foreach($group->subgroups->find_all() as $subgroup){?>
						<?$class = ($i % 2 == 1) ? 'class="task_1"' : 'class="task_2"';?>
						<tr>
							<td><?=Html::anchor('data2/update_subgroup/'.$subgroup->id, $subgroup->title)?></td>
							<td><?=$subgroup->firm->title?></td>
						</tr>
					<?}?>
				</table>
			</div>
		<?$i++;}?>
	</div>
</div>