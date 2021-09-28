<?php 
   $respiratoryInfo = getRespiratoryInput();
   $glasgowInfo = getGlasgowComaInput();
   $cardioVascularInfo = getCardioVascularInput();
   $liverInfo = getLiverInput();
   $plateletInfo = getPlateletInput();
   $creatineInfo = getCreatineInput();

   $totalScore = getTotalScore();
   echo $totalScore;
?>
<?php
   function getRespiratoryInput() {
      $respiratoryOptions = array(
      "≥ 400 (53.3)", 
      "< 400 (53.3)", 
      "< 300 (40)", 
      "< 200 (26.7) and mechanically ventilated", 
      "< 100 (13.3) and mechanically ventilated" );

      // convert from string to boolean
      $isVentilated = filter_var($_POST["ventilation-input"], FILTER_VALIDATE_BOOLEAN);
      $repiratoryChosen = $_POST["respiratory-figures"];
      
      // treat each index as normal
      if ($repiratoryChosen < 3 || $isVentilated) return array("score" => $repiratoryChosen, "option" => $respiratoryOptions[$repiratoryChosen]);
      // not vendilated so anything above 2 needs to be floored to index 2
      else if ($respiratoryOptions >= 3) return array("score" => 2, "option" => $respiratoryOptions[2]);
   }

   function getGlasgowComaInput() {
      $glasgowChosen = $_POST["glasgow-coma"];
      $glasgowComaOptions = array("15", "13-14", "10-12", "6-9", "<6");
      return array("score" => $glasgowChosen, "option" => $glasgowComaOptions[$glasgowChosen]);
   }
   
   function getCardioVascularInput() {
      $cardioVascularChosen = $_POST["cardiovascular-score"];
      $cardiovascularOptions = array(
      "MAP ≥ 70 mmHg",
      "MAP < 70 mmHg", "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
      "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
      "dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1 μg/kg/min",
      "dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1 μg/kg/min"); 

      return array("score" => $cardioVascularChosen, "option" => $cardiovascularOptions[$cardioVascularChosen]);
   }
    
   function getLiverInput() {
      $liverChosen = $_POST["liver-score"];
      $liverOptions = array(
      "< 1.2 [< 20.53]",
      "1.2–1.9 [20-32]",
      "2.0–5.9 [33-101]",
      "6.0–11.9 [102-204]",
      "> 12.0 [> 204]");

      return array("score" => $liverChosen, "option" => $liverOptions[$liverChosen]);
   }
    

   function getPlateletInput() {
      $plateletChosen = $_POST["platelets-score"];
      $plateletOptions = array("≥ 150", "< 150", "< 100", "< 50", "<20");

      return array("score" => $plateletChosen, "option" => $plateletOptions[$plateletChosen]);
   }

   function getCreatineInput() {
      $creatineChosen = $_POST["creatinine-score"];
      $creatinineScore = array("< 1.2 [< 110]",
      "1.2–1.9 [110-170]",
      "2.0–3.4 [171-299]",
      "3.5–4.9 [300-440] (or < 500 ml/d)",
      "> 5.0 [> 440] (or < 200 ml/d)");

      return array("score" => $creatineChosen, "option" => $creatinineScore[$creatineChosen]);
   }

   
   function getTotalScore() {
      return $GLOBALS["respiratoryInfo"]["score"] + 
      $_POST["glasgow-coma"] + $_POST["cardiovascular-score"] + 
      $_POST["liver-score"] + $_POST["platelets-score"] + 
      $_POST["creatinine-score"];
   }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Results</title>
</head>

<body>

</body>

</html>