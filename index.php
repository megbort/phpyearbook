<?php 
  session_start();
  include_once 'crud.php'; 
?>
<!DOCTYPE html>
    <head>
        <title>Megan Krenbrink - Class Yearbook Part 2</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;600;700;800;900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,300;1,400;1,600;1,700;1,900&display=swap">
        <link rel="stylesheet" href="styles/reset.css">
        <link rel="stylesheet" href="styles/main.css">
    </head>
    <body>
        <div class="page-wrapper-cards">
            <?php
                $res = $conn->query("SELECT * FROM students");
                while($row=$res->fetch_array()) {
                    echo '<div class="card">';
                        echo '<div class="card-content">';
                            echo '<div class="top">';
                                echo '<div class="top-text">';
                                    echo '<h1>' . $row['fn'] . '<br>' . $row['ln'] . '</h1>';
                                    echo '<h2>' . $row['job'] . '</h2>';
                                echo '</div>';
                                echo '<img src="images/' . $row['photo'] . '" alt="Profile Picture">';
                            echo '</div>';
                            echo '<div class="bottom">';
                                echo '<h3>Known to say:</h3>';
                                echo '<p>' . $row['words'] . '</p>';
                                echo '<h3>Most Inspired by:</h3>';
                                echo '<p>' . $row['inspire'] . '</p>';
                                echo '<h3>Dislikes</h3>';
                                echo '<p>' . $row['dislike'] . '</p>';
                                echo '<div class="actions">';                   
                                if(isset($_SESSION['username'])) {
                                  echo '<a href="edit.php"><button class="btn-2">Edit Profile</button></a>';
                                }else{
                                  echo '<a href="login.php"><button class="btn-2">Edit Profile</button></a>';
                                }
                                if(isset($_SESSION['username'])) {
                                  echo '<a href="edit.php"><img src="images/trash.png" alt="Trash Can Icon"></a>';
                                }else{
                                  echo '<a href="login.php"><img src="images/trash.png" alt="Trash Can Icon"></a>';
                                }
                                echo '</div>';
                            echo '</div>';
                        echo '</div>';
                    echo '</div>';   
                }; 
            ?>     
        </div>  
    </body>
</html>

