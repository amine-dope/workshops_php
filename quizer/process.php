<?php 
include 'database.php';


session_start();
if(!isset($_SESSION['score'])){
    $_SESSION['score'] = 0;
}

if(isset($_POST["submit"]))
{
    

    $selected_choice=$_POST['choice'];
    $nbr=$_POST["number"];
    $next=$nbr+1;     
    //select total number
     $sql = "SELECT COUNT(*) FROM `questions`";
     $nbr_Q = $conn->query($sql);
     $row1 = $nbr_Q->fetch_assoc();
     $total=$row1['COUNT(*)'];
     
     $sql = "SELECT * FROM `choice` WHERE question_id =$nbr	AND is_correct =1";
     $result = $conn->query($sql);
     $row2 = $result->fetch_assoc();    
     $correct_choice=$row2['id'];  

     if($correct_choice==$selected_choice) 
     {
          $_SESSION['score']++;
     } 

     if($nbr == $total){
        header("Location: final.php");
        exit();
    }else{
        header("Location: question.php?n=".$next);
       
    }
       
       
         
    
 
      

 











}