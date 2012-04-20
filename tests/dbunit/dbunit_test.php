<?php

class dbunit_test extends phpbb_database_test_case
{
	public function getDataSet()
	{
		return $this->createXMLDataSet(dirname(__FILE__) . '/fixture.xml');
	}

	public function testSelect()
	{
		$db = $this->new_dbal();

		$sql = 'SELECT *
			FROM phpbb_config';
		$result	= $db->sql_query($sql);
		$set	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		$expected = array(
			array(
				"config_name"	=> "bar",
				"config_value"	=> "42",
				"is_dynamic"	=> "1",
			),
			array(
				"config_name"	=> "foo",
				"config_value"	=> "23",
				"is_dynamic"	=> "0",
			),
		);

		$this->assertSame($expected, $set);
	}

	public function testInsert()
	{
		$db = $this->new_dbal();

		$sql = 'INSERT INTO phpbb_config (config_name, config_value, is_dynamic)
			VALUES ("footbar", "barbar", 0)';
		$db->sql_query($sql);

		$sql2 = 'SELECT *
			FROM phpbb_config
			WHERE config_name = "footbar"';
		$result = $db->sql_query($sql2);
		$value	= $db->sql_fetchfield('config_value', false, $result);
		$db->sql_freeresult($result);

		$this->assertSame('barbar', $value);
	}
}
