// global variable questionNumber is the current question number
var questionNumber=0;

// load the questions from the XML file
function getQuestions() {
   obj=document.getElementById("question");
   obj.firstChild.nodeValue="(please wait)";
   ajaxCallback = nextQuestion;
   ajaxRequest("questions.xml");
}

// display the next question
function nextQuestion() {
   questions = ajaxreq.responseXML.getElementsByTagName("question");
   obj=document.getElementById("question");
   if (questionNumber < questions.length) {
      question = questions[questionNumber].firstChild.nodeValue;
      obj.firstChild.nodeValue=question;
   } else {
      obj.firstChild.nodeValue="(no more questions)";
   }
}

// check the user's answer
function checkAnswer() {
   answers = ajaxreq.responseXML.getElementsByTagName("answer");
   answer = answers[questionNumber].firstChild.nodeValue;
   answerfield = document.getElementById("answer");
   if (answer == answerfield.value) {
      alert("Correct!");
   }
   else {
      alert("Incorrect. The correct answer is: " + answer);
   }
   questionNumber = questionNumber + 1;
   answerfield.value="";
   nextQuestion();
}

// Set up the event handlers for the buttons
obj=document.getElementById("start_quiz");
obj.onclick=getQuestions;
ans=document.getElementById("submit");
ans.onclick=checkAnswer; 
