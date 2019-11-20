<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 03.11.2019
 * Time: 17:45
 */

class Model_In extends ORM
{
	protected $_has_many = array(
		'subgroups'  => array(
			'model'       => 'subgroup',
			'foreign_key' => 'group_id',
		)
	);
}