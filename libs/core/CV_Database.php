<?php

/**
 * CV_Controller
 * 
 * @author Concetto Vecchio
 * @copyright 2013
 * @version 1.0
 * @package PHP Framework
 * @license GNU General Public License 3 (http://www.gnu.org/licenses/)
 * @link http://cvsolutions.it
 * 
 */
class CV_Database extends PDO
{
	/**
	 * Set the default fetch mode for this statement
	 * @var mixed
	 */
	const FETCH = PDO::FETCH_ASSOC;

	public function __construct()
	{
		$dsn = sprintf('mysql:host=%s;dbname=%s', DB_HOST, DB_NAME);
		parent::__construct($dsn, DB_USER, DB_PWD);
	}

	/**
	 * select
	 * @param string $sql An SQL string
	 * @param array $item Paramters to bind
	 * @throws Exception
	 * @return multitype:|mixed
	 */
	public function select($sql, $item = array())
	{
		$sth = $this->prepare($sql);
		foreach ($item as $key => $value) {
			$sth->bindValue(sprintf(':%s', $key), $value);
		}

		if(!$sth->execute())
		{
			$error = sprintf('Mysql query error: [%s]', $sql);
			throw new Exception($error);
		}

		if($sth->rowCount() > 1) {
			return $sth->fetchAll(self::FETCH);

		} else {
			return $sth->fetch(self::FETCH);
		}
	}

	/**
	 * insert
	 * @param string $table A name of table to insert into
	 * @param array $item An associative array
	 * @return boolean
	 */
	public function insert($table, $item = array())
	{
		$fieldNames = implode('`, `', array_keys($item));
		$fieldValues = ':' . implode(', :', array_keys($item));
		$query = sprintf('INSERT INTO %s (`%s`) VALUES (%s)', $table, $fieldNames, $fieldValues);
		$sth = $this->prepare($query);

		foreach ($item as $key => $value) {
			$sth->bindValue(sprintf(':%s', $key), $value);
		}

		return $sth->execute();
	}

	/**
	 *
	 * @param string $table A name of table to insert into
	 * @param array $item An associative array
	 * @param array $where The WHERE query array part
	 * @return boolean
	 */
	public function update($table, $item = array(), $where = array())
	{
		$fieldDetails = NULL;
		foreach ($item as $key => $value) {
			$fieldDetails .= sprintf('`%s` = :%s, ', $key, $key);
		}

		$fieldDetails = rtrim($fieldDetails, ' ,');

		$condition = NULL;
		$cnt = 0;
		foreach ($where as $key => $value) {
			$and = $cnt > 0 ? ' AND ' : '';
			$condition .= sprintf('%s`%s` = :%s', $and, $key, $key);
			$cnt++;
		}

		$query = sprintf('UPDATE %s SET %s WHERE %s', $table, $fieldDetails, $condition);
		$sth = $this->prepare($query);

		foreach ($item as $key => $value) {
			$sth->bindValue(sprintf(':%s', $key), $value);
		}

		foreach ($where as $key => $value) {
			$sth->bindValue(sprintf(':%s', $key), $value);
		}

		return $sth->execute();
	}
	
	/**
	 * delete
	 * @param string $table A name of table to insert into
	 * @param array $where The WHERE query array part
	 * @return number
	 */
	public function delete($table, $where = array())
	{
		$condition = NULL;
		$cnt = 0;
		foreach ($where as $key => $value) {
			$and = $cnt > 0 ? ' AND ' : '';
			$condition .= sprintf("%s`%s` = '%s'", $and, $key, $value);
			$cnt++;
		}

		$query = sprintf('DELETE FROM %s WHERE %s', $table, $condition);
		return $this->exec($query);
	}
}