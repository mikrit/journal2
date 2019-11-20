<?php defined('SYSPATH') or die('No direct script access.');?>

<style>
	.nav-tabs > li.active > a,
	.nav-tabs > li.active > a:focus,
	.nav-tabs > li.active > a:hover {
		font-weight: bold;
	}

	.nav-tabs {
		border-bottom: 1px solid #ddd;
	}

	#index_data .nav {
		margin-bottom: 10px;
	}

	.work_reag {
		cursor: pointer;
	}
</style>

<div id="index_data" class="row col-lg-12">
	<ul class="nav nav-tabs" style="height: 41px;">
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
						<th>Остаток (Заказ)</th>
						<th>Действие</th>
					</tr>
					</thead>
					<?foreach($group->subgroups->find_all() as $subgroup){?>
						<?$class = ($i % 2 == 1) ? 'class="task_1"' : 'class="task_2"';?>
						<tr>
							<td><?=$subgroup->title?></td>
							<td><?=$subgroup->firm->title?></td>
							<td><?=$subgroup->count?><?if($subgroup->order > 0){?> (<?=$subgroup->order?>)<?}?></td>
							<td>
								<span class="work_reag" data-id="<?=$subgroup->id?>" data-title="<?=$subgroup->title?>">+/-</span>&nbsp;
								<!--span class="glyphicon glyphicon-pencil actions edit" title="Редактировать" data-id="<?$subgroup->id?>" style="color:#00AFC2; font-size: 15px !important;"></span-->
						</td>
						</tr>
					<?}?>
				</table>
			</div>
			<?$i++;}?>
	</div>
</div>

<div id="modal_reag" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel_del_sig" aria-hidden="true">
	<div class="modal-dialog" style="z-index:2000;">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Реагент: <span id="r_title"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs" style="height: 41px;">
					<li class="active">
						<a id="rash" data-toggle="tab" href="#rashod" aria-expanded="true">Расход</a>
					</li>
					<li>
						<a id="prih" data-toggle="tab" href="#prihod" aria-expanded="false">Приход</a>
					</li>
					<li>
						<a id="ord" data-toggle="tab" href="#order" aria-expanded="false">Заказ</a>
					</li>
				</ul>

				<div class="tab-content">
					<div id="rashod" class="tab-pane fade active in">
						<br/>
						<div class="form-group">
							<label>Сотрудник:</label>
							<select id="employee_id" class="form-control">
								<?foreach($employees as $employee){?>
									<option value="<?=$employee->id?>"><?=$employee->fio?></option>
								<?}?>
							</select>
						</div>
						<div class="form-group">
							<label>Количество:</label>
							<input id="out_count" class="form-control" type="text">
						</div>
					</div>

					<div id="prihod" class="tab-pane fade">
						<br/>
						<div class="form-group">
							<label>Количество:</label>
							<input id="in_count" class="form-control" type="text">
						</div>
					</div>

					<div id="order" class="tab-pane fade">
						<br/>
						<div class="form-group">
							<label>Количество:</label>
							<input id="order_count" class="form-control" type="text">
						</div>
					</div>
				</div>
			</div>

			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button id="confirm" class="btn btn-primary" type="button" data-action="rashod">Подтвердить</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#rash').click(function(){
		$('#confirm').data('action', 'rashod');
	});

	$('#prih').click(function(){
		$('#confirm').data('action', 'prihod');
	});

	$('#ord').click(function(){
		$('#confirm').data('action', 'order');
	});

	var reagent_id = 0;
	$('.work_reag').on('click', function(){
		reagent_id = $(this).data('id');
		var title = $(this).data('title');
		$('#r_title').html(title);

		$("#modal_reag").modal({
			backdrop: 'static',
			keyboard: true
		});
	});

	$('#confirm').click(function(){
		var count = 0;
		var action = $(this).data('action');

		if(action == 'rashod')
		{
			var employee_id = $('#employee_id').val();
			count = $('#out_count').val();

			$.ajax({
				type: "POST",
				url: "",
				dataType: "json",
				data: {
					action: action,
					reagent_id: reagent_id,
					employee_id: employee_id,
					count: count
				},
				success: function (result) {
					location.reload();
				}
			});
		}
		else if(action == 'prihod')
		{
			count = $('#in_count').val();

			$.ajax({
				type: "POST",
				url: "",
				dataType: "json",
				data: {
					action: action,
					reagent_id: reagent_id,
					count: count
				},
				success: function (result) {
					location.reload();
				}
			});
		}
		else if(action == 'order')
		{
			count = $('#order_count').val();

			$.ajax({
				type: "POST",
				url: "",
				dataType: "json",
				data: {
					action: action,
					reagent_id: reagent_id,
					count: count
				},
				success: function (result) {
					location.reload();
				}
			});
		}

		$("#modal_reag").hide();

		return false;
	});
</script>

