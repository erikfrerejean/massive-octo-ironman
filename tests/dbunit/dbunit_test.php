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
			FROM phpbb_config
			ORDER BY config_name';
		$result	= $db->sql_query($sql);
		$set	= $db->sql_fetchrowset($result);
		$db->sql_freeresult($result);

		$this->assertSame("bar", $set[0]['config_name']);
		$this->assertSame("23", $set[1]['config_value']);
	}

	public function testInsert()
	{
		$db = $this->new_dbal();

		$sql = "INSERT INTO phpbb_config (config_name, config_value, is_dynamic)
			VALUES ('footbar', 'barbar', 0)";
		$db->sql_query($sql);

		$sql2 = "SELECT *
			FROM phpbb_config
			WHERE config_name = 'footbar'";
		$result = $db->sql_query($sql2);
		$value	= $db->sql_fetchfield('config_value', false, $result);
		$db->sql_freeresult($result);

		$this->assertSame('barbar', $value);
	}
}
