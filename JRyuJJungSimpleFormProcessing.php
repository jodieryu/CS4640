<!-- CS4640: Jodie Ryu and Julie Jung -->
<!DOCTYPE html>
<html>
	<head>
		<meta http-equiv="content-type" content="text/html; charset=windows-1252">
		<!-- Link to Stylesheet -->
		<link type="text/css" rel="stylesheet" href="stylesheet.css"/>
		<link href='//fonts.googleapis.com/css?family=Raleway Dots' rel='stylesheet'>

    	<title>CS 4640: Assignment 2 Web Data Entry</title>

    	<script type="text/javascript"> //or script language = "javascript"
    		function showDiv(elem) {
    			if(elem.options[elem.selectedIndex].value == 1) {
    				document.getElementById('hidden-short-answer').style.display = "block";
    				document.getElementById('hidden-multiple-choice').style.display = "none";
    				document.getElementById('hidden-true-false').style.display = "none";
    				setFocusSA();
    			} 
    			if(elem.options[elem.selectedIndex].value == 2) {
    				document.getElementById('hidden-multiple-choice').style.display = "block";
    				document.getElementById('hidden-short-answer').style.display = "none";
    				document.getElementById('hidden-true-false').style.display = "none";
    				setFocusMC();
    			}
    			if(elem.options[elem.selectedIndex].value == 3) {
    				document.getElementById('hidden-true-false').style.display = "block";
    				document.getElementById('hidden-short-answer').style.display = "none";
    				document.getElementById('hidden-multiple-choice').style.display = "none";
    				setFocusTF();
    			}
    			else {
    				document.getElementById('hidden-div').style.display = "none";
    			}
    		}

    		function showPopulatedData() {
    			if(document.shortAns.user_answer.value != "") {
    				document.getElementById('hidden-short-answer').style.display = "block";
    				document.getElementById('hidden-multiple-choice').style.display = "none";
    				document.getElementById('hidden-true-false').style.display = "none";
    			}
    			else if(document.multChoice.answer1.value != "") {
    				document.getElementById('hidden-multiple-choice').style.display = "block";
    				document.getElementById('hidden-short-answer').style.display = "none";
    				document.getElementById('hidden-true-false').style.display = "none";
    			}
    			else if(document.TF.user_question.value != "") {
    				document.getElementById('hidden-true-false').style.display = "block";
    				document.getElementById('hidden-short-answer').style.display = "none";
    				document.getElementById('hidden-multiple-choice').style.display = "none";
    			}
    		}

    		function setFocusSA()
		     {
		        document.shortAns.user_question.focus();
		     }
		    function setFocusMC()
		     {
		        document.multChoice.user_question.focus();
		     }
		    function setFocusTF()
		     {
		        document.TF.user_question.focus();
		     }

    		function CheckSAForm() {
			   var ErrMsg = "";
			   var NumErr = 0;

			   var ques = document.shortAns.user_question;
			   var ans = document.shortAns.user_answer;
			   if (ques.value == "") 
			   {
			   	  NumErr++;
			      ErrMsg += "\n" + NumErr + ") Please enter the question.";
			   }
			   if (ans.value == "")
			      {
			         NumErr++;
			      	 ErrMsg += "\n" + NumErr + ") Please enter the answer.";
			      }

			   if (NumErr > 0)
			   {
			      alert (ErrMsg);
			      return (false);
			   }
			   else
			   {
			      return (true);
			   }
			}
			function CheckMCForm() {
			   var ErrMsg = "";
			   var NumErr = 0;

			   var quesMC = document.multChoice.user_question;
			   var answer1 = document.multChoice.answer1;
			   var answer2 = document.multChoice.answer2;
			   var answer3 = document.multChoice.answer3;
			   var answer4 = document.multChoice.answer4;
			   var correctans = document.multChoice.answer;

			   if (quesMC.value == "")
			   {
			      NumErr++;
			      ErrMsg += "\n" + NumErr + ") Please enter the multiple choice question.";
			   }
			   if (answer1.value == "" || answer2.value == "" || answer3.value == "" || answer4.value == "")
			   {
			      NumErr++;
			      ErrMsg += "\n" + NumErr + ") Please enter 4 multiple choice answers.";
			   }
			   if(correctans.value == 0) {
			   	  NumErr++;
			      ErrMsg += "\n" + NumErr + ") Please select the correct answer to the multiple choice question.";
			   }

			   if (NumErr > 0)
			   {
			      alert (ErrMsg);
			      return (false);
			   }
			   else
			   {
			      return (true);
			   }

			}
			function CheckTFForm() {
			   var ErrMsg = "";
			   var NumErr = 0;

			   var quesTF = document.TF.user_question;
			   if (quesTF.value == "")
			   {
			      NumErr++;
			      ErrMsg += "\n" + NumErr + ") Please enter a true/false question.";
			   }

			   if (NumErr > 0)
			   {
			      alert (ErrMsg);
			      return (false);
			   }
			   else
			   {
			      return (true);
			   }
			}
    	</script>
	</head>

	<body onload="showPopulatedData()">
	<span style="color:#04a59d"><b>Jodie Ryu and Julie Jung</b></span>
		<div class="questionType">
			<center> 
				<h2> Choose Question Type </h2> 
				<p> Choose the type of question you would like to create </p>

				<strong><p>Question Type:</p></strong>
				<select id="test" name="QuestionType" onchange="showDiv(this)" > 
  					<option value="0">Choose option</option>
  					<option value="1">Short-Answer</option> 
  					<option value="2">Multiple Choice</option> 
  					<option value="3">True/False</option> 
				</select> 
			</center>
		</div>

		<div id="hidden-short-answer" class="Short-Answer" style="display:none;">
			<center>
				<h3> Enter short answer question </h3>
				<form action="formhandler.php" method="post" name="shortAns" onSubmit="return (CheckSAForm())">
				    <div>
				    <div style="margin-bottom: 5px;">
				        <label for="question">Question:</label>
				        <input type="text" id="question" name="user_question"/>
				    </div>
				    <div>
				        <label for="answer">Answer:</label>
				        <textarea id="answer" name="user_answer"></textarea>
				    </div>
				    <div class="button">
        				<button type="submit">Submit</button>
        				<button type="reset">Clear</button>
    				</div>
				</form>
			</center>
		</div>

		<div id="hidden-multiple-choice" class="Multiple-Choice" style="display:none;">
			<center>
				<h3> Enter multiple choice question: </h3>
				<form action="formhandler.php" method="post" name="multChoice" onSubmit="return (CheckMCForm())">
  					<div style="margin-bottom: 5px;">
				        <label for="question">Question:</label>
				        <input type="text" id="question" name="user_question" />
				    </div>
				    <div style="margin-bottom: 5px;">
	  					Choice 1:
	 					<input type="text" name="answer1" id="mc"><br> 
 					</div>
 					<div style="margin-bottom: 5px;">
	 					Choice 2:
	 					<input type="text" name="answer2" id="mc">
	 				</div>
	 				<div style="margin-bottom: 5px;">
	 					Choice 3:
	 					<input type="text" name="answer3" id="mc">
	 				</div>
	 				<div style="margin-bottom: 5px;">
	 					Choice 4:
	 					<input type="text" name="answer4" id="mc">
	 				</div>

	 				Answer:
						<select id="answer" name="answer"> 
		  					<option value="0">Choose option</option>
		  					<option value="1">Choice 1</option> 
		  					<option value="2">Choice 2</option> 
		  					<option value="3">Choice 3</option> 
		  					<option value="4">Choice 4</option> 
						</select> 
 					<div class="button">
        				<button type="submit">Submit</button>
        				<button type="reset">Clear</button>
    				</div>
				</form>
			</center>
		</div>

		<div id="hidden-true-false" class="True-False" style="display:none">
			<center>
				<h3> Enter True/False question: </h3>
				<form action="formhandler.php" method="post" name="TF" onSubmit="return (CheckTFForm())">
					<div style="margin-bottom: 5px;">
						<label for="question">Question:</label>
						<input type="text" id="question" name="user_question" />
					</div>
					<div style="margin-bottom: 5px;">
						<input type="radio" name="truefalse" value="True" checked>True
						<input type="radio" name="truefalse" value="False">False
					</div>
					<div class="button;" style="margin-bottom: 5px;">
        				<button type="submit">Submit</button>
        				<button type="reset">Clear</button>
    				</div>
				</form>
			</center>
		</div>

	</body>
</html>