<?php
    use Model\DataHandler;
    require_once './Model/DataHandler.php'; 

    $dataHandler = new DataHandler();

    $questionsAnswers = array();

    $dataHandler->fileToArray($questionsAnswers);

    // how many questions are in the correct format Q,A,A,A and how many othes do we have? 

    for($x=0; $x<count($questionsAnswers); $x++){
        if(count($questionsAnswers[$x])!=4){
            var_dump($questionsAnswers[$x]); 
            echo "<br/>"; 
        }
    }

