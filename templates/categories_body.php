<div class="container">
        <h1 class="mt-4 mb-3">Categories</h1>
        
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Categories</li>
      </ol>
        
<?php

    require './includes/config.php';
    require MYSQL;
    // var_dump($dbc);

    $sql = 'SELECT COUNT(*) FROM Categories';
    $stmt = $dbc->query($sql);
    $cnt = $stmt->fetchColumn();

    //echo "<h2>Total Categories: $cnt</h2>";

    // sql is the variable that holds the query
    // stmt is the variable that holds the method the connection gets queried (executes the query)
    // $cnt is the variable that holds the fetchColumn function based on the results of the query 
    // the fetchColumn function displays only the first column and the first row whatever is in the results returned.

    $q = "SELECT id, category
          FROM categories
          ORDER BY 1";

    $stmt = $dbc->query($q);
    $category_list=$stmt->fetchAll(PDO::FETCH_ASSOC);
    // stmt is the PDO statement
    // fetch_assoc is the way we display the results

    //var_dump($category_list);

    // loop the array and display the ul list

    echo "<ul class='list-group'>";
    echo "<li class='list-group-item active'><h3>Select a Category</h3></li>";
    foreach ($category_list as $row){
        echo"<li class='list-group-item'><a href='articlesbycategory.php?id={$row['id']}&name={$row['category']}'>".$row['category']."</a></li>";
    }
    echo "</ul>";



?>

</div>