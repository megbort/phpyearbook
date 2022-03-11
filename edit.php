<?php 
  session_start();
  include_once 'crud.php'; 
  // check to see if the user is currently NOT logged in
  if(!isset($_SESSION['username'])) {
    // they are NOT, so get them out of here - go to the login page
    header('location: login.php');
    // stop everything - exit
    exit();
  }
?>
<!DOCTYPE html>
    <head>
        <title>Class Yearbook 2022</title>
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Inconsolata:wght@300;400;500;600;700;800;900&family=Source+Sans+Pro:ital,wght@0,200;0,300;0,400;0,600;0,700;0,900;1,300;1,400;1,600;1,700;1,900&display=swap">
        <link rel="stylesheet" href="styles/reset.css">
        <link rel="stylesheet" href="styles/main.css">
    </head>
    <body>
        <div class="page-wrapper">
            <div class="page-left">
                <div id="header" class="header">
                    <h1>Class Yearbook 2022</h1>
                    <p>Please fill in the information below.</p>
                </div>
                <!-- STUDENT INPUT FORM -->
                <div id="form" class="yb-inputs">
                    <form method="post"> 
                        <table>
                            <tr>
                                <td>
                                    <input type="text" name="fn" placeholder="First Name" value="<?php if(isset($_GET['edit'])) echo $getROW['fn'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="ln" placeholder="Last Name" value="<?php if(isset($_GET['edit'])) echo $getROW['ln'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="photo" placeholder="Personal Photo" value="<?php if(isset($_GET['edit'])) echo $getROW['photo'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="job" placeholder="Aspiring to be" value="<?php if(isset($_GET['edit'])) echo $getROW['job'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="words" placeholder="Known to say" value="<?php if(isset($_GET['edit'])) echo $getROW['words'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="inspire" placeholder="Most Inspired by" value="<?php if(isset($_GET['edit'])) echo $getROW['inspire'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <input type="text" name="dislike" placeholder="Dislikes" value="<?php if(isset($_GET['edit'])) echo $getROW['dislike'];  ?>" />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    <?php if(isset($_GET['edit'])) { ?>
                                        <button class="btn" type="submit" name="update">Update</button>
                                    <?php } else { ?>
                                        <button class="btn" type="submit" name="save">Save</button>
                                    <?php } ?>
                                </td>
                            </tr>
                            <tr>
                              <td style="padding-top:15px">
                                  <a href="index.php" title="Logout">See Yearbook</a>                                                 
                              </td>
                            </tr>
                            <tr>
                              <td style="padding-top:15px">
                                  <a href="logout.php" title="Logout">Logout</a>                                                 
                              </td>
                            </tr>
                        </table>
                    </form>
                </div>
            </div>
            <!-- USERS TABLE -->
            <div class="page-right">
                <div class="class-data">
                    <table>
                        <?php
                            $res = $conn->query("SELECT * FROM students");
                            while($row=$res->fetch_array())
                        { ?>
                        <tr>
                            <td><?php echo $row['fn']; ?></td>
                            <td><?php echo $row['ln']; ?></td>
                            <td><img src="images/<?php echo $row['photo'];?>" style="max-width: 200px;"></td>
                            <td><?php echo $row['job']; ?></td>
                            <td><?php echo $row['words']; ?></td>
                            <td><?php echo $row['inspire']; ?></td>
                            <td><?php echo $row['dislike']; ?></td>
                            <td><a href="?edit=<?php echo $row['id']; ?>" onclick="return confirm('Edit this user?');">edit</a></td>
                            <td><a href="?del=<?php echo $row['id']; ?>" onclick="return confirm('Delete this user?');">delete</a></td>
                        </tr>
                    <?php } ?>  
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>