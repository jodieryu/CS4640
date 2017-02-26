<html>
<head>
  <title>Simple form handler</title>
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
    <button type="submit">Confirm</button>
    <!-- <a href="JRyuJJungSimpleFormProcessing.php" class="button" >Back</a> -->
    <input onclick='javascript:window.history.back()' value='Back' type='button' />
  </div>

</body>
</html> 


<?php
   
   // retrieve data from the form submission
   $project_scores = extract_data();      
   // print_array($project_scores);

   // prepare data to be written to file
   $data = "";
   while ($curr = each($project_scores)) 
   {
      $k = $curr["key"];
      $v = $curr["value"];
      
      if (!empty($data))
         $data = $data.",";
      
      $data = (string)$data.(string)$v;     
   }
   
   # specify a path, using a file system, not a URL
   # [server]    /cslab/home/<em>your-username</em>/public_html/<em>your-project</em>/data/filename.txt
   # [local]     /XAMPP/htdocs/<em>your-project</em>/data/filename.txt
   
   
   $filename = "/Applications/XAMPP/htdocs/cs4640proj/CS4640/data/datafile.txt";    
   
   // if there is nothing, don't write it 
   if (!empty($data))
      write_to_file($filename, $data);



  function write_to_file($filename, $data)
   {
//       if (!file_exists($filename))
//          echo "File does not exist";
//       else
//          echo "File exists";
      
      $file = fopen($filename, "a");      // if the file doesn't exist, create a new file
      chmod($filename, 0775);             // set permission. 
                                          // Note: consider chmod 755 here but 777 when manually creating a file
                                          //    who is the owner?
      fputs($file, $data."\n");
      fclose($file);
   }


     /* Retrieve data from the form submission,
    * Convert project scores to percentages
    * Return an array of project scores
    */
   function extract_data()
   {
      $data = array();
    $project_scores = array();

      // To retrieve all param-value pairs from a post object
      foreach ($_POST as $key => $val)
      {
         $data[$key] = $val;      // record all form data to an array
      }

      $score = 0;
      $total = 1;      // avoid divided by 0 exception
   
      // itearate a data array, access scores and totals for each project,
      // convert raw scores to percentages (which are used to determine the lowest project score)
    reset($data);
      while ($curr = each($data))
      {
         $k = $curr["key"];
         $v = $curr["value"];

         // strpos(string, substring) -- return index or position of the substring in string
         //                              otherwise, return False if not found
         if (strpos($k, "prj") >= 0)
         {
            if (strpos($k, "_total"))
            {
        $total = $v;
        $score = ($score * 100) / $total ;  // percentage
        $project_scores[$k] = $score;     // put percentage in array (final score for each project)
      }
      else
      {
        $score = $v;
      }
         }
         else
            echo "strpos = false";
      }
    // print_array($project_scores);
    return $project_scores;
   }   
?>