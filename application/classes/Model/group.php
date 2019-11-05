<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 03.11.2019
 * Time: 9:16
 */

class Model_Group extends ORM
{
	protected $_has_many = array(
		'subgroups'  => array(
			'model'       => 'subgroup',
			'foreign_key' => 'group_id',
		)
	);
}