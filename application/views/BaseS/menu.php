<?php defined('SYSPATH') or die('No direct script access.');?>

<?$request = explode("/", Request::current()->uri());?>

<ul class="nav navbar-nav">
	<li <?if($request[0] == 'sklad'){echo 'class="active"';}?>>
		<?=HTML::anchor('sklad', 'Склад'); ?>
	</li>
	<?php if($admin){?>
		<li <?if($request[0] == 'data2'){echo 'class="active"';}?>>
			<?=HTML::anchor('data2', 'Добавление данных'); ?>
		</li>
		<li <?if($request[0] == 'reports2'){echo 'class="active"';}?>>
			<?=HTML::anchor('reports2', 'Отчёты'); ?>
		</li>
		<li <?if($request[0] == 'adminka'){echo 'class="active"';}?>>
			<?=HTML::anchor('adminka', 'Админка'); ?>
		</li>
	<?}?>
</ul>

<ul class="nav navbar-nav navbar-right">
	<li>
		<?=HTML::anchor('auth/logout', 'Выход');?>
	</li>
</ul>