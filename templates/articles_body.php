<div class="container">
        <h1 class="mt-4 mb-3">Articles</h1>
        
      <ol class="breadcrumb">
        <li class="breadcrumb-item">
          <a href="index.php">Home</a>
        </li>
        <li class="breadcrumb-item active">Articles</li>
      </ol>
        

        
        
        <?php
        require './includes/config.php';
        require MYSQL;
        
        $sql = 'SELECT COUNT(*) FROM Pages';
        $stmt = $dbc->query($sql);
        $cnt = $stmt->fetchColumn();

        echo "<h2>Total Articles: $cnt</h2>";
        
        $q = "SELECT id, title, description FROM pages";
        $stmt = $dbc->query($q);
        
        $article_list = $stmt->fetchAll(PDO::FETCH_ASSOC);
        
        echo "<table class='table table-striped table-bordered'>
                <thead class='thead-dark'>
                    <tr>
                        <th>Title</th>
                        <th>Description</th>
                        
                    </tr>
                </thead>
                <tbody>";
        
        foreach($article_list AS $row){
            echo "<tr>
                    <td><a href='article.php?id={$row['id']}'>{$row['title']}</a></td>
                    <td>{$row['description']}</td>
                    
                 </tr>";
        }
        echo "</tbody></table>";
        
          ?>
        
        

</div>