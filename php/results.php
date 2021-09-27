<?php 
   $respiratoryScore = getRespiratoryScore();
   $glasgowInput = getGlasgowComaInput();
   $cardioVascularInput = getCardioVascularInput();
   $liverInput = getLiverInput();
   $plateletInput = getPlateletInput();
   $creatineInput = getCreatineInput();

   $totalScore = getTotalScore();
   echo $totalScore;
?>
<?php
   function getRespiratoryScore() {
      //  array of the ranges that the respiratory could fall into. 
      // incudes the alternative units
      $respiratoryRanges = array( 
         array (
            "mmHg" => 400,
            "kPa" => 53.3,	
         ),
         
         array (
            "mmHg" => 400,
            "kPa" => 53.3,	
         ),
         
         array (
            "mmHg" => 300,
            "kPa" => 40,	
         ),

         array (
            "mmHg" => 200,
            "kPa" => 26.7,	
         ),      

         array (
            "mmHg" => 100,
            "kPa" => 13.3,	
         )
      );
      // get the respiratory input and units used
      $respiratoryInput = $_POST["respiratory-figures"];
      $respiratoryUnits = $_POST["respiratory-units"];
      // convert string to bool
      $isVentilated = filter_var($_POST["ventilation-input"], FILTER_VALIDATE_BOOLEAN);

      // initialise score to -1 for error handling
      $respiratoryScore = -1;


      for ($x = 4; $x >= 0; $x--) {
         // get the value to compare against
         $comparator = $respiratoryRanges[$x][$respiratoryUnits];

         // check for ventilation case
         if ($x > 2 && $isVentilated) {
            if ($respiratoryInput < $comparator) {
               $respiratoryScore = $x;
               break;
            }
         } 
         // skip
         else if ($x > 2 && !$isVentilated) continue;
         // no ventilation
         else if ($x > 0){
            if ($respiratoryInput < $comparator) {
               $respiratoryScore = $x;
               break;
            }
            // beyond 
         } else {
            if ($respiratoryInput >= $comparator) $respiratoryScore = $x;
         }

      }

      return $respiratoryScore;
  
   }

   function getGlasgowComaInput() {
      $glasgowComaOptions = array("15", "13-14", "10-12", "6-9", "<6");
      return $glasgowComaOptions[$_POST["glasgow-coma"]];
   }
   
   function getCardioVascularInput() {
      $cardiovascularOptions = array("MAP ≥ 70 mmHg",
      "MAP < 70 mmHg", "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
      "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
      "dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1 μg/kg/min",
      "dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1 μg/kg/min"); 

      return $cardiovascularOptions[$_POST["cardiovascular-score"]];
   }
    
   function getLiverInput() {
      $liverOptions = array("< 1.2 [< 20.53]",
      "1.2–1.9 [20-32]",
      "2.0–5.9 [33-101]",
      "6.0–11.9 [102-204]",
      "> 12.0 [> 204]");

      return $liverOptions[$_POST["liver-score"]];
   }
    

   function getPlateletInput() {
      $plateletOptions = array("≥ 150", "< 150", "< 100", "< 50", "<20");

      return $plateletOptions[$_POST["platelets-score"]];
   }

   function getCreatineInput() {
      $creatinineScore = array("< 1.2 [< 110]",
      "1.2–1.9 [110-170]",
      "2.0–3.4 [171-299]",
      "3.5–4.9 [300-440] (or < 500 ml/d)",
      "> 5.0 [> 440] (or < 200 ml/d)");

      return $creatinineScore[$_POST["creatinine-score"]];
   }

   function getTotalScore() {
      return $GLOBALS["respiratoryScore"] + $_POST["glasgow-coma"] + $_POST["cardiovascular-score"] + $_POST["liver-score"] + $_POST["platelets-score"] + $_POST["creatinine-score"];
   }
?>