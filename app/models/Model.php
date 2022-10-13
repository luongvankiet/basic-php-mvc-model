<?php

namespace App\Models;

use App\Core\Application;
use Exception;

abstract class Model
{
    public $createdAt;
    public $updatedAt;

    protected $table;
    protected $primaryKey;
    protected $attributes = [];
    protected $query;
    protected $statement;
    protected $limit = 10;

    public function __construct(array $parameters = [])
    {
        foreach ($parameters as $propertyName => $value) {
            $propertyName = Application::toCamelCase($propertyName);

            if (property_exists($this, $propertyName)) {
                $this->{$propertyName} = $value;
            }
        }
    }

    public function getTableName()
    {
        return $this->table;
    }

    public function getPrimaryKey()
    {
        return $this->primaryKey;
    }

    public function save()
    {
        if (empty($this->table)) {
            return false;
        }

        try {
            $params = array_map(function ($param) {
                return ":$param";
            }, $this->attributes);

            $this->prepareStatement("INSERT INTO $this->table (" . implode(',', $this->attributes) . ") VALUES (" . implode(',', $params) . ")");

            foreach ($this->attributes as $attribute) {
                $this->statement->bindValue(":$attribute", $this->{Application::toCamelCase($attribute)});
            }

            $this->statement->execute();
            return true;
        } catch (Exception) {
            return false;
        }
    }

    public function prepareStatement($sql)
    {
        return $this->statement = Application::db()->pdo->prepare($sql);
    }

    public function query(): self
    {
        $this->query = "SELECT * FROM $this->table ";
        return $this;
    }

    public function where($column, $value = null, $operator = '=', $boolean = 'and'): self
    {
        if (empty($this->query)) {
            $this->query();
        }

        if (strpos($this->query, 'WHERE')) {
            $this->query .= " $boolean $column $operator :$column";
        } else {
            $this->query .= "WHERE $column $operator :$column";
        }

        $this->prepareStatement($this->query);
        $this->statement->bindValue(":$column", $value);

        return $this;
    }

    public function orWhere($column, $value = null, $operator = '='): self
    {
        return $this->where($column, $value, $operator, 'or');
    }

    public function get()
    {
        if (empty($this->query)) {
            $this->query();
        }

        if (!$this->statement) {
            $this->prepareStatement($this->query);
        }

        $this->statement->execute();

        $results = [];

        foreach ($this->statement->fetchAll() as $value) {
            $results[] = new static($value);
        }

        return $results;
    }

    public function find($attributes = [])
    {
        foreach ($attributes as $key => $value) {
            $this->where($key, $value);
        }

        $this->prepareStatement($this->query);

        foreach ($attributes as $key => $value) {
            $this->statement->bindValue(":$key", $value);
        }

        return $this->first();
    }

    public function first()
    {
        if (empty($this->query)) {
            $this->query();
        }

        if (!$this->statement) {
            $this->prepareStatement($this->query);
        }

        $this->statement->execute();

        if (!$result = $this->statement->fetchObject(static::class)) {
            return null;
        }

        return $result;
    }

    public function latest()
    {
        $this->query .= " ORDER BY created_at DESC";
        return $this;
    }

    public function limit($limit = 10)
    {
        if ($limit < 0) {
            return $this;
        }

        $this->query .= " LIMIT $limit";
        return $this;
    }

    abstract public function toArray();
}
