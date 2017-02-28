<html>
<head>
  <title>Simple form handler</title>
  <script type="text/javascript">
     function alertSubmit() {
        alert("You have successfully submitted your question!")
       
     }     
     
     // end script hiding -->
   </script>
</head>

<body bgcolor="#EEEEEE">
  <center><h2>Simple Form Handler</h2></center>
  <p>
    The following table lists all parameter names and their values that were submitted from your form.
  </p>

  <table cellSpacing=1 cellPadding=1 width="75%" border=1 bgColor="lavender">
    <tr bgcolor="#FFFFFF">
      <td align="center"><strong>Parameter</strong></td>
      <td align="center"><string>Value</string></td>
    </tr>
    <tr>
      <td width="20%">Question</td> 
      <td><?php echo $_POST['user_question']?></td>      
    </tr>
    <tr>
      <td width="20%">Short Answer</td> 
      <td><?php echo $_POST['user_answer']?></td>      
    </tr>
    <tr>
      <td width="20%">MC Answer Choice 1</td>
      <td><?php echo $_POST['answer1']?></td>      
    </tr>
    <tr>
      <td width="20%">MC Answer Choice 2</td>
      <td><?php echo $_POST['answer2']?></td>      
    </tr>
    <tr>
      <td width="20%">MC Answer Choice 3</td>
      <td><?php echo $_POST['answer3']?></td>      
    </tr>
    <tr>
      <td width="20%">MC Answer Choice 4</td>
      <td><?php echo $_POST['answer4']?></td>      
    </tr>
    <tr>
      <td width="20%">Correct MC Answer Choice</td>
      <td><?php echo $_POST['answer']?></td>      
    </tr>
    <tr>
      <td width="20%">True/False Answer</td>
      <td><?php echo $_POST['truefalse']?></td>      
    </tr>  
  </table>
  <div class="button">
    <input type="submit" value= "Submit" onclick="alertSubmit()"/> 
    <!-- <a href="JRyuJJungSimpleFormProcessing.php" class="button" >Back</a> -->
    <input onclick='javascript:window.history.back()' value='Back' type='button' />
  </div>

</body>
</html> 


<?php
   $filename = "data/datafile.txt";    
   
    $question = $_POST['user_question'];
    $answer = $_POST['user_answer'];
    $fp = fopen($filename, "a");
    $savestring = $question . "\n";
    $savestring_shortans = $question . "\n" . $answer . "\n";
    if($answer == "") {
      fclose($fp);
    }
    else {
      fwrite($fp, $savestring_shortans);
      fclose($fp);
    }
?>

<?php
   
   $filename = "data/datafile.txt";    
   
    $MC_answer1 = $_POST['answer1'];
    $MC_answer2 = $_POST['answer2'];
    $MC_answer3 = $_POST['answer3'];
    $MC_answer4 = $_POST['answer4'];
    $MC_answer = $_POST['answer'];
    $fp = fopen($filename, "a");
    $savestring_multiplechoice = "1: " . $MC_answer1 . "\n" . "2: ". $MC_answer2 . "\n" . "3: ".$MC_answer3 . "\n" . "4: " . $MC_answer4 . "\n" . "Correct answer: " . $MC_answer . "\n" ;

    if ($MC_answer1 == "") {
      fclose($fp);
    }
    else {
      fwrite($fp, $savestring);
      fwrite($fp, $savestring_multiplechoice);
      fclose($fp);
    }
?>

<?php
   
   $filename = "data/datafile.txt";    
   
    $truefalse = $_POST['truefalse'];
    $fp = fopen($filename, "a");
    $savestring_tf = $truefalse . "\n";

    if ($truefalse == "") {
      fclose($fp);
    }
    else {
      fwrite($fp, $savestring);
      fwrite($fp, $savestring_tf);
      fclose($fp);
    }
?>

