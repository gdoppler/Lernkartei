<?php

    global $classGreen;
    global $classRed;

    use Model\DataHandler;

    require_once './Model/DataHandler.php'
?>

<!doctype html>
<html lang="en" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="styles.css">
    <title>Document</title>
</head>
<body>

<?php

    $dataHandler = new DataHandler();

    $questionsAnswers = array();

    $dataHandler->fileToArray($questionsAnswers);


    include 'checkAnswers.php';

    $answersRndArry = array('<p><?= $questionsAnswers[$questionNumber][0] ?></p>');

    // QuestionsNr. ist eine Rnd es sollen 5 zahlen für 5 Fragen gewählt werden
    $questionNumber = 0;
    echo count($questionsAnswers);





?>






<form action="index.php" method="post">
    <?php
    for($x=1; $x<=3; $x++){ 
        $sequence=[1,2,3]; 
        shuffle($sequence); 
       # echo "<p>" . var_dump($sequence) . "</p>"; 
    ?>
        <?php 
            $questionNumber = rand(0,count($questionsAnswers)-1);  
            if(count($questionsAnswers[$questionNumber])!=4){
                // if the question does not have the syntax Q,A,A,A let's continue to another one. 
                $x--; 
                continue; 
            }
        ?>
        <p><?= $questionsAnswers[$questionNumber][0] ?></p>
        <?php 
        for($answeroptionindex=0; $answeroptionindex<3; $answeroptionindex++){

            // $class="redFalse"; // like this we will have the color already without answers
            $class=$classRed; 
            $value="Falsch"; 
            // which option will we show now? 
            $option=$sequence[$answeroptionindex];
            // $option will be 1 (the correct one), 2 or 3 (the wrong ones)
            if($option==1){
                //$class="greenCorrect"; // like this we will have the color already without answers
                $class=$classGreen; 
                $value="Korrekt"; 
            } 
        ?>
        <div class="<?=$class?>">
            <label>
                <input type="radio" name="answer<?=$x?>" value="<?=$option?>"   >
            </label>
            <?= $questionsAnswers[$questionNumber][$option] ?>
        </div>

        
        <?php }?>
        <br>
    <?php }?>

    



    <input type="submit" value="senden"/>
    <input type="reset" value="löschen"/>
    <br>

</form>



</body>
</html>