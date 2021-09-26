<?php 
    var_dump($_POST);
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

     $respiratoryInput = $_POST["respiratory-figures"];
     $respiratoryUnits = $_POST["respiratory-units"];
     // convert post string to bool
     $isVentilated = filter_var($_POST["ventilation-input"], FILTER_VALIDATE_BOOLEAN);

     $respiratoryScore = -1;

     for ($x = 4; $x >= 0; $x--) {
         $comparator = $respiratoryRanges[$x][$respiratoryUnits];
         echo $comparator;
         if ($x > 2 && $isVentilated) {
            if ($respiratoryInput < $comparator) {
                $respiratoryScore = $x;
                break;
            }
         } else if ($x > 2 && !$isVentilated) continue;
         else if ($x > 0){
            if ($respiratoryInput < $comparator) {
                $respiratoryScore = $x;
                break;
            }
         } else {
            if ($respiratoryInput >= $comparator) $respiratoryScore = $x;
         }

     }

     echo $respiratoryScore;
    
    
    
    $glasgowComa = array("15", "13-14", "10-12", "6-9", "<6");
    
    $cardiovascularScore = array("MAP ≥ 70 mmHg",
    "MAP < 70 mmHg", "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
    "dopamine ≤ 5 μg/kg/min or dobutamine (any dose)",
    "dopamine > 5 μg/kg/min OR epinephrine ≤ 0.1 μg/kg/min OR norepinephrine ≤ 0.1 μg/kg/min",
    "dopamine > 15 μg/kg/min OR epinephrine > 0.1 μg/kg/min OR norepinephrine > 0.1 μg/kg/min"); 

    $liverScore = array("< 1.2 [< 20.53]",
    "1.2–1.9 [20-32]",
    "2.0–5.9 [33-101]",
    "6.0–11.9 [102-204]",
    "> 12.0 [> 204]");

    $plateletScore = array("≥ 150", "< 150", "< 100", "< 50", "<20");

    $creatinineScore = array("< 1.2 [< 110]",
    "1.2–1.9 [110-170]",
    "2.0–3.4 [171-299]",
    "3.5–4.9 [300-440] (or < 500 ml/d)",
    "> 5.0 [> 440] (or < 200 ml/d)");
?>