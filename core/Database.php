<?php
class Database {
    private $connect;
    use QueryBuilder;
    public function __construct() {
        $this->connect = Connection::getInstance();
    }

    function insertData($table, $data) {
        if(!empty($data)) {
            $fieldStr = '';
            $valueStr = '';

            foreach($data as $key=>$value) {
                $fieldStr.=$key.',';
                $valueStr.="'".$value."',";
            }

            $fieldStr = rtrim($fieldStr, ',');
            $valueStr = rtrim($valueStr, ',');

            $sql = "INSERT INTO $table($fieldStr) VALUES ($valueStr)";

            $status = $this->query($sql);

            if($status) {
                return true;
            }else {
                return false;
            }
        }
    }

    function updateData($table, $data, $condition=''){
        if (!empty($data)){
            $updateStr = '';
            foreach ($data as $key=>$value){
                $updateStr.="$key='$value',";
            }

            $updateStr = rtrim($updateStr, ',');

            if (!empty($condition)){
                $sql = "UPDATE $table SET $updateStr WHERE $condition";
            }else{
                $sql = "UPDATE $table SET $updateStr";
            }

            $status = $this->query($sql);

            if ($status){
                return true;
            }
        }

        return false;
    }

    function deleteData($table, $condition=''){
        if (!empty($condition)){
            $sql = 'DELETE FROM '.$table.' WHERE '.$condition;
        }else{
            $sql = 'DELETE FROM '.$table;
        }

        $status = $this->query($sql);

        if ($status){
            return true;
        }

        return false;
    }

    function query($sql) {
        try {
            $statement = $this->connect->prepare($sql);

            $statement->execute();

            return $statement;
        }catch (PDOException $e){
            echo 'Connection Error: ' . $e->getMessage();
        }
    }

        // Trả về id mới nhất sau khi đã insert
        function lastInsertId(){
            return $this->connect->lastInsertId();
        }
}