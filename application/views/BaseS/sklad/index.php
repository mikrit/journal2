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

	.nav {
		margin-bottom: 50px;
	}

	.work_reag {
		cursor: pointer;
	}
</style>

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
						<th>Количество</th>
						<th>Действие</th>
					</tr>
					</thead>
					<?foreach($group->subgroups->find_all() as $subgroup){?>
						<?$class = ($i % 2 == 1) ? 'class="task_1"' : 'class="task_2"';?>
						<tr>
							<td><?=$subgroup->title?></td>
							<td><?=$subgroup->firm->title?></td>
							<td><?=$subgroup->count?></td>
							<td>
								<span class="work_reag" data-id="<?=$subgroup->id?>" data-title="<?=$subgroup->title?>">+/-</span>
								<span class="glyphicon glyphicon-pencil actions edit" title="Редактировать" data-id="<?=$subgroup->id?>" style="color:#00AFC2; font-size: 15px !important;"></span>
						</td>
						</tr>
					<?}?>
				</table>
			</div>
			<?$i++;}?>
	</div>
</div>

<div id="modal_reag" class="modal" role="dialog">
	<div class="modal-dialog" role="document">
		<div class="modal-content">
			<div class="modal-header">
				<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
				<h4 class="modal-title">Реагент: <span id="r_title"></span></h4>
			</div>
			<div class="modal-body">
				<ul class="nav nav-tabs">
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
						<div class="form-group">
							<label>Сотрудник:</label>
							<select id="employee" class="form-control" name="employee">
								<?foreach($employees as $employee){?>
									<option value="<?=$employee->id?>"><?=$employee->fio?></option>
								<?}?>
							</select>
						</div>
						<div class="form-group">
							<label>Количество:</label>
							<input id="count" class="form-control" type="text" name="count" required>
						</div>
					</div>

					<div id="prihod" class="tab-pane fade">
						<div class="form-group">
							<label>Количество:</label>
							<input id="in_count" class="form-control" type="text" name="in_count" required>
						</div>
					</div>

					<div id="order" class="tab-pane fade">
						<div class="form-group">
							<label>Количество:</label>
							<input id="ord_count" class="form-control" type="text" name="in_count" required>
						</div>
					</div>
				</div>
			</div>
			<div class="modal-footer">
				<button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
				<button id="confirm_add" class="btn btn-primary" type="button" data-action="rashod">Добавить</button>
			</div>
		</div>
	</div>
</div>

<script>
	$('#rash').click(function(){
		$('#confirm_add').data('action', 'rashod');
	});

	$('#prih').click(function(){
		$('#confirm_add').data('action', 'prihod');
	});

	$('#ord').click(function(){
		$('#confirm_add').data('action', 'order');
	});

	$('.work_reag').on('click', function(){
		var title = $(this).data('title');

		$('#r_title').html(title);


		$("#modal_reag").modal({
			backdrop: 'static',
			keyboard: true
		});
	});

	$('#confirm_add').click(function(){
		var id = $(this).data('id');
		var action = $(this).data('action');

		var count = 0;
		if(action == 'rashod')
		{
			var employee = $('#employee').val();
			count = $('#count').val();

			$.ajax({
				type: "POST",
				url: "",
				dataType: "json",
				data: {
					action: action,
					id: id,
					employee: employee,
					count: count
				},
				success: function (result) {

				}
			});
		}
		else
		{
			count = $('#in_count').val();

			$.ajax({
				type: "POST",
				url: "",
				dataType: "json",
				data: {
					action: action,
					id: id,
					count: count
				},
				success: function (result) {

				}
			});
		}

		return false;
	});
</script>

