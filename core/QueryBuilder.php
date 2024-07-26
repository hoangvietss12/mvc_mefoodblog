<?php

trait QueryBuilder {
    public $table = '';
    public $where = '';
    public $operator = '';
    public $select = '*';
    public $limit = '';
    public $orderBy = '';
    public $innerJoin = '';
    public function table($table) {
        $this->table = $table;
        return $this;
    }

    public function select($field = '*') {
        $this->select = $field;
        return $this;
    }

    public function limit($number, $offset = 0) {
        $this->limit = "LIMIT $offset, $number";
        return $this;
    }
    // select query
    public function first() {
        $sql = "SELECT $this->select FROM $this->table $this->where $this->limit";

        $query = $this->query($sql);

        $this->resetQuery();

        if(!empty($query)) {
            return $query->fetch(PDO::FETCH_ASSOC);
        }

        return false;
    }

    public function get() {
        $sql = "SELECT $this->select FROM $this->table $this->where $this->limit";

        $query = $this->query($sql);

        $this->resetQuery();

        if(!empty($query)) {
            return $query->fetchAll(PDO::FETCH_ASSOC);
        }

        return false;
    }

    // where conditions
    public function where($field, $compare, $value) {
        if(empty($this->where)) {
            $this->operator = ' WHERE ';
        }else {
            $this->operator = ' AND ';
        }

        $this->where.="$this->operator $field $compare '$value'";

        return $this;
    }

    public function orWhere($field, $compare, $value) {
        if(empty($this->where)) {
            $this->operator = ' WHERE ';
        }else {
            $this->operator = ' OR ';
        }

        $this->where.="$this->operator $field $compare '$value'";

        return $this;
    }

    public function whereLike($field, $value) {
        if(empty($this->where)) {
            $this->operator = ' WHERE ';
        }else {
            $this->operator = ' AND ';
        }

        $this->where.="$this->operator $field LIKE '$value'";

        return $this;
    }

    // orderby conditions
    public function orderBy($field, $type='ASC') {
        $fieldArr = array_filter(explode(',', $field));

        if(!empty($fieldArr) && count($fieldArr) >= 2) {
            $this->orderBy = "ORDER BY " . implode(',', $fieldArr);
        }else {
            $this->orderBy = "ORDER BY " .$field. " " .$type;
        }

        return $this;
    }

    // join 
    public function join($table, $relationship) {
        $this->innerJoin.='INNER JOIN' .$table. ' ON ' .$relationship. ' ';
        return $this;
    }

    // insert, update, delete
    public function insert($data) {
        $insertStatus = $this->insertData($this->table, $data);
        
        return $insertStatus;
    }

    public function update($data) {
        $whereUpdate = str_replace('WHERE', '', $this->where);
        $whereUpdate = trim($whereUpdate);
        $updateStatus = $this->updateData($this->table, $data, $whereUpdate);
        
        return $updateStatus;
    }

    public function delete() {
        $whereDelete = str_replace('WHERE', '', $this->where);
        $whereDelete = trim($whereDelete);

        $statusDelete = $this->deleteData($this->table, $whereDelete);
        return $statusDelete;
    }

    public function lastId(){
        return $this->lastInsertId();
    }

    // reset query
    public function resetQuery(){
        $this->tableName = '';
        $this->where = '';
        $this->operator = '';
        $this->selectField = '*';
        $this->limit = '';
        $this->orderBy = '';
        $this->innerJoin = '';
    }
}