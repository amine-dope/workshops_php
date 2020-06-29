<?php 
include 'database.php';

session_start();

//select total number
$sql = "SELECT COUNT(*) FROM `questions`";
$nbr_Q = $conn->query($sql) OR die($conn->error .__LINE__);
$row1 = $nbr_Q->fetch_assoc();

//GIT number

$nbr=(int)$_GET["n"];

//select choice

$sql = "SELECT * FROM `choice` WHERE question_id =$nbr";
$choices = $conn->query($sql) OR die($conn->error .__LINE__);


//select questions

$sql = "SELECT * FROM `questions` WHERE  question_id =$nbr";
$Q = $conn->query($sql) OR die($conn->error .__LINE__);
$row3 = $Q->fetch_assoc();
?>



<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8" />
    <title>PHP Quizzer</title>
    <link rel="stylesheet" href="css/style.css" type="text/css" />
</head>

<body>
    <header>
        <div class="container">
            <h1>PHP Quizzer</h1>
        </div>
    </header>
    <main>
        <div class="container">
            <div class="current"><?php echo $row3['Text'];?></div>
            <p class="question">
                <?php echo 'Questions '.$row3['question_id'] .' of ' .$row1['COUNT(*)']; ?>
            </p>
            <form method="post" action="process.php">
                <ul class="choices">
                <?php while($row2 = $choices->fetch_assoc()): ?>
                    <li><input name="choice" type="radio" value="<?php echo $row2['id'];?>" /><?php echo $row2['text']; ?></li>
                <?php endwhile; ?>  
                </ul>
                <input type="submit" value="Submit" name="submit" />
                <input type="hidden" name="number" value="<?php echo $nbr; ?>" />
            </form>
        </div>
    </main>
    <footer>
        <div class="container">
            Copyright &copy; YOUCODE, PHP Quizzer
        </div>
    </footer>
</body>

</html>