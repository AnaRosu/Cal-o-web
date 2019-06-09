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

}
?>
