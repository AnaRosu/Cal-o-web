<?php
class UserStatistics{
	function calculateBasalMetabolicRate($gender, $weight, $height, $age){
      $rbm = 0;
      if(strcmp($gender, 'Female') == 0){
          $rbm = 655 + (9.6*$weight) + (1.8*$height) - (4.7*$age);
      }
      else{
          $rbm = 66 + (13.7*$weight) + (5*$height) - (6.8*$age);
      }
      return $rbm;
    }

    function calculateCaloriesNeeded($rbm, $activityLevel)
    {
    	switch ($activityLevel) {
	        case 'sedentary':
	          $rbm = $rbm * 1.2;
	          break;
	        case 'moderate':
	          $rbm = $rbm * 1.375;
	          break;
	        case 'active':
	          $rbm = $rbm * 1.55;
	          break;
	        case 'vactive':
	          $rbm = $rbm * 1.735;
	          break;
	        default:
	          $rbm = $rbm * 1.9;
	          break;
        }
        return $rbm;
    }

		function calculateProteinNeeded($weight, $activityLevel)
		{
			$numberOfProteins = 0;
			switch ($activityLevel) {
					case 'sedentary':
						$numberOfProteins = $weight * 0.8;
						break;
					case 'moderate':
						$numberOfProteins = $weight * 0.8;
						break;
					case 'active':
							$numberOfProteins = $weight * 1.0;
						break;
					case 'vactive':
							$numberOfProteins = $weight * 1.2;
						break;
					default:
							$numberOfProteins = $weight * 1.4;
						break;
				}
				return $numberOfProteins;
		}


	function calculateCarbsNeeded($purpose)
		{
			 $numberOfCarbs = 0;
			  if($purpose == 'Maintain the same weight')
				{
					$numberOfCarbs = 225;

				}elseif( $purpose == 'Gain weight')
				{
					$numberOfCarbs = 325;
				}elseif($purpose == 'Lose weight')
				{
					$numberOfCarbs = 100;

				}
				return $numberOfCarbs;
		}
		function calculateFiberNeeded($gender)
	 		{
	 			 $numberOfFiber = 0;
	 			  if($gender == 'Male')
	 				{
	 					$numberOfFiber = 23;

	 				}elseif($gender == 'Female')
 	 				{
 	 					$numberOfFiber = 34;

 	 				}
	 				return $numberOfFiber = 0;;
	 		}
}
?>
