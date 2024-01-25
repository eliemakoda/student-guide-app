<?php
require './assets/include/App.php';
session_start();
$id=$_GET['id_exam'];
$sql="SELECT * FROM examen left join qcm on qcm.id_examen=examen.id  WHERE examen.id=$id;";
$apps= new App;
$questionnaire=$apps->SelectionnerTout($sql); 
$json = json_encode($questionnaire);	
echo "<script>var quizData = $json;</script>";

?>
<style>
    /* coding with nick */

@import url('https://fonts.googleapis.com/css2?family=Poppins:wght@200;300;400;500&display=swap');

*{
  box-sizing: border-box;
}
body{
  background-color: #b8c6db;
  background-image: linear-gradient(315deg, #b8c6db 0%, #f5f7f7 100%);
  font-family: 'Poppins', sans-serif;
  display: flex;
  align-items: center;
  justify-content: center;
  height: 100vh;
  overflow: hidden;
  margin: 0;
}
.quiz-container{
  background-color: #fff;
  border-radius: 10px;
  box-shadow: 0 0 10px 2px rgba(100, 100, 100, 0.1);
  width: 600px;
  overflow: hidden;
}
.quiz-header{
  padding: 4rem;
}
h2{
  padding: 1rem;
  text-align: center;
  margin: 0;
}

ul{
  list-style-type: none;
  padding: 0;
}
ul li{
  font-size: 1.2rem;
  margin: 1rem 0;
}
ul li label{
  cursor: pointer;
}
button{
  background-color: #03cae4;
  color: #fff;
  border: none;
  display: block;
  width: 100%;
  cursor: pointer;
  font-size: 1.1rem;
  font-family: inherit;
  padding: 1.3rem;
}
button:hover{
  background-color: #04adc4;
}
button:focus{
  outline: none;
  background-color: #44b927;
}
</style>
<div class="quiz-container" id="quiz">
    <div class="quiz-header">
      <h2 id="question">Question Text</h2>
      <ul>
        <li>
          <input type="radio" name="answer" id="a" class="answer">
          <label for="a" id="a_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="b" class="answer">
          <label for="b" id="b_text">Answer</label>
        </li>

        <li>
          <input type="radio" name="answer" id="c" class="answer">
          <label for="c" id="c_text">Answer</label>
        </li>


      </ul>
    </div>

    <button id="submit">Submit</button>

  </div>
  
<script>
// const quizData = [
//     {
//         question: "Laquelle de ces declarations est correcte pour choisir le jeu de caracteres autre que par defaut?",
//         reponseb: "Varchar(20) character set utf8",
//         reponse1: "Varchar(20)",
//         reponse2: "Varchar(20) character set",
//     },
//     {
//         question: "Laquell de ces declarations est correcte pour choisir le jeu de caracteres autre que par defaut?",
//         reponseb: "Varchar(20) character set utf8",
//         reponse1: "Varchar(20)",
//         reponse2: "Varchar(20) character set",
//     },
//     {
//         question: "Laquel de ces declarations est correcte pour choisir le jeu de caracteres autre que par defaut?",
//         reponseb: "Varchar(20) character set utf8",
//         reponse1: "Varchar(20)",
//         reponse2: "Varchar(20) character set",
//     },
//     {
//         question: "Laque de ces declarations est correcte pour choisir le jeu de caracteres autre que par defaut?",
//         reponseb: "Varchar(20) character set utf8",
//         reponse1: "Varchar(20)",
//         reponse2: "Varchar(20) character set",
//     }
// ];

const quiz = document.getElementById('quiz');
const answerEls = document.querySelectorAll('.answer');
const questionEl = document.getElementById('question');
const a_text = document.getElementById('a_text');
const b_text = document.getElementById('b_text');
const c_text = document.getElementById('c_text');
const submitBtn = document.getElementById('submit');

let currentQuiz = 0;
let score = 0;

loadQuiz();

function loadQuiz() {
    deselectAnswers();
    const currentQuizData = quizData[currentQuiz];
    questionEl.innerText = currentQuizData.question;
    a_text.innerText = currentQuizData.reponse1;
    b_text.innerText = currentQuizData.reponse2;
    c_text.innerText = currentQuizData.reponseb;
}

function deselectAnswers() {
    answerEls.forEach(answerEl => {
        answerEl.checked = false;
    });
}

function getSelected() {
    let answer;
    answerEls.forEach(answerEl => {
        if (answerEl.checked) {
            answer = answerEl.id;
        }
    });
    return answer;
}

submitBtn.addEventListener('click', () => {
    const answer = getSelected();
    if (answer) {
        if (answer == quizData[currentQuiz].reponseb) {
            score++;
        }
        currentQuiz++;
        if (currentQuiz < quizData.length) {
            loadQuiz();
        } else {
            quiz.innerHTML = `<h2>You answered ${score}/${quizData.length} questions correctly.</h2>
            <button onclick="location.reload()">Reload</button>`;
        }
    }
});


</script>