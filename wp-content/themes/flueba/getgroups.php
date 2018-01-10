<?php
require_once("settings.php");

function getWorkgroups(){
     global $mysqli;
	   $workgroups = [];
     $sql= "SELECT `id`, `name` FROM `workgroups`";
     $result = mysqli_query($mysqli,$sql);
     while ($row = $result->fetch_assoc()){
 		 $workgroups[]=$row;
	}
	return $workgroups;
}

function getUserWorkgroups($id){
     global $mysqli;
	   $userWorkgroups;
     $sql= "SELECT `user_id`, `workgroup_id` FROM `user_workgroups` WHERE `user_id` = '".mysqli_real_escape_string($mysqli,$id)."'";
     $result = mysqli_query($mysqli,$sql);
     while ($row = $result->fetch_assoc()){
	$userWorkgroups[]=$row["workgroup_id"];
      }
     return $userWorkgroups;
}

$workgroups = getWorkgroups($mysqli);

function groups2html(){
	global $workgroups;
  $grouphtml = "";
  $grouphtml .= "<div class='grouplist'>";
  foreach($workgroups as $workgroup){
    $grouphtml .= '<input type="checkbox" name="workgroup_'. $workgroup["id"].'" id="'. $workgroup["name"].'" title="Main List"/>';
    $grouphtml .= '<label for="'. $workgroup["name"].'">'. $workgroup["name"].'</label>';
  }
  $grouphtml .= "</div>";
  return $grouphtml;
}

function edit_groups2html($id){
	global $workgroups;
	$userWorkgroups = getUserWorkgroups($id);
  $grouphtml = "";
	$checked = "";
	$count = 0;
  $grouphtml .= "<div class='grouplist'>";
  foreach($workgroups as $workgroup){
		$count++;
    $grouphtml .= '<label for="'. $workgroup["name"].'">'. $workgroup["name"].'</label>';
		if ( in_array( $count, $userWorkgroups) ) {
			$checked = "checked";
		}
    $grouphtml .= '<input type="checkbox" name="workgroup_'. $workgroup["id"].'" id="'. $workgroup["name"].'" title="Main List" '.$checked.' /></br>';
		$checked = "";
  }
  $grouphtml .= "</div>";
  return $grouphtml;
}
?>
