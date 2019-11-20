<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 21.11.2019
 * Time: 0:43
 */

class Model_Order extends ORM
{
	protected $_has_many = array(
		'subgroups'  => array(
			'model'       => 'subgroup',
			'foreign_key' => 'group_id',
		)
	);
}