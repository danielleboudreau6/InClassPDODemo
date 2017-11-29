
<div class="container">
    
    <?php
    if(isset($_GET['name'])){
        $name = $_GET['name'];
    }else{
        $name = 'Articles by Category';
    }
    ?>
    
    <h1 class="mt-4 mb-3"><?php echo $name?></h1>   
      <ol class="breadcrumb">
        <li class="breadcrumb-item"><a href="index.php">Home</a></li>
        <li class="breadcrumb-item"><a href="categories.php">Categories</a></li>
        <li class="breadcrumb-item active"><?php echo $name?></li>
      </ol>
        
    <?php

    if (isset($_GET['id']) && is_numeric($_GET['id'])   ){
                $catid = $_GET['id'];

                require './includes/config.php';
                require MYSQL;  
                
            $stmt = $dbc->prepare("SELECT id, title, description
                                   FROM pages
                                   WHERE category_id=:catid");
            
            $stmt->bindValue(':catid',$catid,PDO::PARAM_INT);
            $stmt->execute();
            
            $articles = $stmt->fetchAll(PDO::FETCH_ASSOC);
            
            //var_dump($articles);
            
    echo "<div class='row'>";
    foreach($articles as $row){
        echo '<div class="col-lg-4 mb-4">';
          echo '<div class="card h-100">';
            echo '<h4 class="card-header">'.$row['title'].'</h4>';
            echo '<div class="card-body">';
              echo '<p class="card-text">'.$row['description'].'</p>';
            echo '</div>';
            echo '<div class="card-footer">';
              echo '<a href="article.php?id='.$row['id'].'" class="btn btn-primary">Read More...</a>';
            echo '</div>';
          echo '</div>';
        echo '</div>';
   
    }
     echo '</div>';
    
            
    }else{
    ?>
    
    <div class="alert alert-warning" role="alert">
        This page has been accessed in error!<br>
        <a href="categories.php">View all Categories</a>
    </div>
    
    <?php
    
        
    }
    ?>

</div>