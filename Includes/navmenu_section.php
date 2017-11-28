<ul class="navbar-nav ml-auto">
    
<!--            <li class="nav-item active">
              <a class="nav-link" href="#">Home
                <span class="sr-only">(current)</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">About</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Services</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">Contact</a>
            </li>
-->

<?php

$pages = array(
    'Home'=>'/InClassPDODemo/index.php',
    'About' =>'/InClassPDODemo/about.php',
    'Contact' =>'/InClassPDODemo/contact.php',
    'Categories' => '/InClassPDODemo/categories.php',
    'Articles' => '/InClassPDODemo/articles.php',
);

$this_page = $_SERVER['REQUEST_URI'];
//echo $this_page;
//exit();

foreach($pages as $k=>$v):
    echo '<li class ="nav-item';

        if($this_page==$v){
            echo ' active">';
        }else{
            echo '">';
        }
        
    echo '<a class="nav-link" href="'.$v.'">'.$k.'</a>
         </li>';
endforeach;

?>
          </ul>

