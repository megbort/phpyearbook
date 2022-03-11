<?php
    // link to db file
    include_once 'db.php';

    /////// QUERY ///////

    // insert new data
    if(isset($_POST['save'])) {
        $fn = $conn->real_escape_string($_POST['fn']);
        $ln = $conn->real_escape_string($_POST['ln']);
        $photo = $conn->real_escape_string($_POST['photo']);
        $job = $conn->real_escape_string($_POST['job']);
        $words = $conn->real_escape_string($_POST['words']);
        $inspire = $conn->real_escape_string($_POST['inspire']);
        $dislike = $conn->real_escape_string($_POST['dislike']);

        $SQL = $conn->query("INSERT INTO students(fn,ln,photo,job,words,inspire,dislike) VALUES('$fn', '$ln', '$photo', '$job', '$words', '$inspire', '$dislike')");

        if(!$SQL) {
            echo $conn->error;
        }
    } 

    // delete data
    if(isset($_GET['del'])) {
        $SQL = $conn->query("DELETE FROM students WHERE id=".$_GET['del']);
    }

    // edit data
    if(isset($_GET['edit'])) {
        $SQL = $conn->query("SELECT * FROM students WHERE id=".$_GET['edit']);
        $getROW = $SQL->fetch_array();
    }

    // update data
    if(isset($_POST['update'])) {
        $SQL = $conn->query("UPDATE students SET fn='".$_POST['fn']."', ln='".$_POST['ln']."', photo='".$_POST['photo']."', job='".$_POST['job']."', words='".$_POST['words']."', inspire='".$_POST['inspire']."', dislike='".$_POST['dislike']."'WHERE id=".$_GET['edit']);
        error_log("updated profile");
        header('location:edit.php');
        if(!$SQL) {
            echo $conn->error;
        }
    }
?>