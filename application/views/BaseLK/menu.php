<?php defined('SYSPATH') or die('No direct script access.');?>

<?$request = explode("/", Request::current()->uri());?>

<ul class="nav navbar-nav">
	<li <?=$request[0] == 'main' ? 'class="active"' : ''?>>
		<?=HTML::anchor('main', 'Журнал'); ?>
	</li>
	<li <?=$request[0] == 'patient' ? 'class="active"' : ''?>>
		<?=HTML::anchor('patient', 'Пациенты'); ?>
	</li>
	<li <?=$request[0] == 'data' ? 'class="active"' : ''?>>
		<?=HTML::anchor('data', 'Добавление данных'); ?>
	</li>
	<li <?=$request[0] == 'reports' ? 'class="active"' : ''?>>
		<?=HTML::anchor('reports', 'Отчёты'); ?>
	</li>
	<?if($admin){?>
		<li <?=$request[0] == 'adminka' ? 'class="active"' : ''?>>
			<?=HTML::anchor('adminka', 'Админка')?>
		</li>
	<?}else{?>
		<li <?=$request[0] == 'user' ? 'class="active"' : ''?>>
			<?=HTML::anchor('user', 'Личный кабинет')?>
		</li>
	<?}?>
	<?if($sklad){?>
		<li>
			<?=HTML::anchor('sklad', 'Склад')?>
		</li>
	<?}?>
</ul>

<ul class="nav navbar-nav navbar-right">
	<li>
		<?=HTML::anchor('auth/logout', 'Выход');?>
	</li>
	<li>
		<div id="balance" style="display: block;padding-bottom: 15px;padding-top: 15px;"><b>Баланс: <?=$balance?></b></div>
	</li>
</ul>