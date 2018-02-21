<?php
    include "database.php";
    class  student{
        private $table='student_db';
        private $name;
        private $dept;
        private $age;
        
        public function setName($name){
            $this->name=$name;
        }
        public function setDept($dept){
            $this->dept=$dept;
        }
        public function setAge($age){
            $this->age=$age;
        }
        
        public function insert(){
            $sql_inser="insert into $this->table(name,dept,age) values (:name,:dept,:age)";
            $stmt = DB::prepareown($sql_inser);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':dept',$this->dept);
            $stmt->bindParam(':age',$this->age);
            $stmt->execute();

        }
        
         public function update($id){
            $sql_update="update $this->table set name=:name, dept=:dept,age=:age where id=:id";
            $stmt = DB::prepareown($sql_update);
            $stmt->bindParam(':name',$this->name);
            $stmt->bindParam(':dept',$this->dept);
            $stmt->bindParam(':age',$this->age);
            $stmt->bindParam(':id',$id);

            $stmt->execute();

        }
         
        
        public function ReadById($id){
            $sql="select * from $this->table where id=:id";
            $stmt = DB::prepareown($sql);
            $stmt->bindParam(':id',$id);
            $stmt->execute();
            return $stmt->fetch();

            
        }
        
        public function student_data(){
            $sql ="SELECT * FROM $this->table";
            $stmt = DB::prepareown($sql);
            $stmt->execute();
            return $stmt->fetchAll();
            
            
        }
        
        public function delete($id){
            $sql="DELETE FROM $this->table WHERE id=:id";
            $stmt = DB::prepareown($sql);
            $stmt->bindParam(':id',$id);

             return $stmt->execute();

        }
    }
    
?>