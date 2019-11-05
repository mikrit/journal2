<?php
/**
 * Created by PhpStorm.
 * User: Mikrit
 * Date: 03.11.2019
 * Time: 9:22
 */

class Model_Subgroup extends ORM
{
	protected $_belongs_to = array(
		'group' => array(
			'model'			=> 'group',
			'foreign_key'	=> 'group_id',
		),
		'firm' => array(
			'model'			=> 'firm',
			'foreign_key'	=> 'firm_id',
		)
	);
}