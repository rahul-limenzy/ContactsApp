<?php


class baseModel
{
    protected $_db;

    const SALT = 'xWpgc?$e23R4@K*}|nmsQ9q~j:He+&qj7vbP8ns0WssRtL9!';

    public function __construct()
    {
        $this->_dbConnect();
    }

    protected function insert($table, $data)
    {
        $sql = 'INSERT INTO `' . $table . '` (`';
        $placeholders = array_fill(0, count($data), '?');
        $sql .= implode('`, `', array_keys($data)) . '`) VALUES ('
            . implode(', ', $placeholders) . ')';
        $statement = $this->_db->prepare($sql);
        $statement->execute(array_values($data));
        return $this->_db->lastInsertId();
    }

    protected function update($table, $data, $where)
    {
        $sql = 'UPDATE`' . $table . '` SET ';
        $set = [];
        $values = [];
        foreach ($data as $field => $value) {
            $set[] = '`' . $field . '` = ?';
            $values[] = $value;
        }
        $sql .= implode(', ', $set);
        if (!empty($where)) {
            $sql .= ' WHERE ' . $where;
        }
        $statement = $this->_model->prepare($sql);
        $statement->execute($values);
        $statement->closeCursor();
    }

    public function hashPassword($password)
    {
        return md5($password . self::SALT);
    }

    public function quoteValue($value)
    {
        return $this->_db->quote($value);
    }

    private function _dbConnect()
    {
        $options = [
            PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8',
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
        ];

        $dsn = sprintf('mysql:host=%s;dbname=%s', 'localhost', 'contact_app');
        $this->_db = new PDO($dsn, 'root', 'root', $options);
    }

}
