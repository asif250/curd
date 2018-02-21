<?php include "inc/header.php"; ?>
<?php
   
   spl_autoload_register(function($class){
    include "classes/".$class.".php";
   });
   
   $user = new student();
   
   
   
   
   
   
   if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $dept=$_POST['dept'];
    $age=$_POST['age'];
    
    $user->setName($name);
    $user->setDept($dept);
    $user->setAge($age);
    if($user->insert()){
     
     echo "data inserted successfully.";
     
    }
    
    
    
   }
   
  
  
   
   
   
   
   
 ?>
 <?php
    if(isset($_GET['action']) && $_GET['action']=='delete'){
      
      $id=(int)$_GET['id'];
      
      if($user->update($id)){
       echo "data deleted successfully";
      }
   }
 
 ?>
 
 <?php
   
   if(isset($_GET['action']) && $_GET['action']=='edit'){
      
      $id=(int)$_GET['id'];
      $result=$user->ReadById($id);
      
      if(isset($_POST['update'])){
            $id=$_POST['id'];

            $name=$_POST['name'];
            $dept=$_POST['dept'];
             $age=$_POST['age'];
    
    $user->setName($name);
    $user->setDept($dept);
    $user->setAge($age);
    if($user->update($id)){
     
     echo "data updated successfully.";
     
    }
    
    
    
   }
    
  
   

?>


<section class="mainleft">

<form action="" method="post">
 <table>
  <tr>
      <td><input type="hidden" name="id" value="<?php echo $result['id'];?>"/></td>    
    </tr>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" value="<?php echo $result['name'];?>" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" value="<?php echo $result['dept'];?>" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" value="<?php echo $result['age'];?>" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="update" value="Update"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>
</section>

<?php } else
{

?>







<section class="mainleft">
<form action="" method="post">
 <table>
    <tr>
        <td>Name: </td>
        <td><input type="text" name="name" required="1"/></td>    
    </tr>

    <tr>
       <td>Department: </td>
        <td><input type="text" name="dept" required="1"/></td>
    </tr>

    <tr>
      <td>Age: </td>
        <td><input type="text" name="age" required="1"/></td>
    </tr>
    <tr>
      <td></td>
        <td>
        <input type="submit" name="submit" value="Submit"/>
        <input type="reset" value="Clear"/>
        </td>
    </tr>
  </table>
</form>
</section>

<?php } ?>

<section class="mainright">
  <table class="tblone">
    <tr>
        <th>No</th>
        <th>Name</th>
        <th>Department</th>
        <th>Age</th>
        <th>Action</th>
    </tr>
    
    <?php
    $i=1;
      foreach($user->student_data() as $key=>$value){
      
    ?>

    <tr>
        <td><?php echo $i?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['dept'];?></td>
        <td><?php echo $value['age'];?></td>
        <td>
        <?php  echo "<a href='index.php?action=edit&id=".$value['id']." '>Edit</a>" ?> ||
        <?php  echo "<a href='index.php?action=delete&id=".$value['id']." '>Delete</a>" ?>

        </td>
    </tr>

   <?php    $i++;
}
   
   
   
   
   
   
   ?>
  </table>
</section>










<?php include "inc/footer.php"; ?>