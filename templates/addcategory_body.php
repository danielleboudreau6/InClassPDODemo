<div class="container">
        <h1 class="mt-4 mb-3">Add Category</h1>
        
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Add category</li>
      </ol>



<?php

// check if form was submitted
if($_SERVER['REQUEST_METHOD']=='POST'){
    //var_dump($_POST);
    $newcat = trim( filter_var($_POST['category'],FILTER_SANITIZE_STRING) );
    if(!empty($newcat)){
        require './includes/config.php';
        require MYSQL;
        
        $stmt = $dbc->prepare("INSERT INTO categories(category)
                               VALUES (:category)");
        $stmt->bindValue(':category',$newcat,PDO::PARAM_STR);
        
        try{
            $stmt->execute();
            echo '<div class="alert alert-success" role="alert">
                    You have successfully inserted the '.$newcat.'category.<br>
                        <a href="addcategory.php">Add another category</a>
                  </div>';
        } catch (Exception $ex) {
            $code = $ex->getCode();
            
            $message = 'Unknown system error';
            if ($code == 23000){
                $message='You cannot insert a duplicate category.';
            }
            echo '<div class="alert alert-warning" role="alert">
                    The '.$newcat.' category has not been inserted due to a system error.<br>
                    '.$message.'<br><a href="addcategory.php">Please try again.</a></div>';
        }
    }
        
    }else{


?>

<form class="form-inline" method="post" action="addcategory.php">

<!-- Bootstrap doesnt come with the name part of the form - it is very important to add it in yourself-->    
  <div class="form-group mx-sm-3">
    <label for="category" class="sr-only">Category:</label>
    <input type="text" class="form-control" id="category" name="category" placeholder="Enter a new category">
  </div>
    
  <button type="submit" class="btn btn-primary">Submit</button>
  
</form> 
<?php
        
}        

?>    
</div>