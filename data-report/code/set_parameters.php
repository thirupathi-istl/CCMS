<?php
$normal='class=""';
$red='class="text-danger fw-bold"'; 
$orange='class="text-warning fw-bold"'; 
$green='class="text-success fw-bold"'; 
$class_r=$normal;
$class_y=$normal;
$class_b=$normal;
$class_ir=$normal;
$class_iy=$normal;
$class_ib=$normal;

$class_pf=$normal;
$class_temp_1=$normal;
$class_temp_2=$normal;
$class_temp_3=$normal;
$class_temp_4=$normal;
$class_temp_5=$normal;
$class_load=$normal;
$class_load_r=$normal;
$class_load_y=$normal;
$class_load_b=$normal;
$class_on_off_status=$normal;
$temp_fail=1;

$v_min_r=180;
$v_min_y=180;
$v_min_b=180;
$v_max_r=240;
$v_max_y=240;
$v_max_b=240;
$c_max_r=20;
$c_max_y=20;
$c_max_b=20;
$temp=45;
$pf1=0.85;
$pf2=-0.85;
$load=80;

/*$sql_set_parma="SELECT c_1,  c_2, c_3, min_1, min_2, min_3, max_1, max_2, max_3 FROM (SELECT id, max_1 as c_1, max_2 as c_2, max_3 as c_3 FROM $db.limit_current UNION ALL SELECT 1 as id, 20, 20,20 FROM dual WHERE NOT EXISTS (SELECT * FROM $db.limit_current) ORDER BY id DESC LIMIT 1) AS t1, (SELECT id, min_1,min_2,min_3, max_1, max_2, max_3 FROM $db.limit_voltage UNION ALL SELECT  1 as id, '180','180','180', '265', '265', '265' FROM dual WHERE NOT EXISTS (SELECT * FROM $db.limit_voltage) ORDER BY id DESC LIMIT 1) AS t2";
if(mysqli_query($conn, $sql_set_parma))
{
	$result_set_parma = mysqli_query($conn, $sql_set_parma);
	if(mysqli_num_rows($result_set_parma)>0)
	{
		$r_set_parma = mysqli_fetch_assoc( $result_set_parma ) ; 
		$v_min_r=$r_set_parma['min_1'];
		$v_min_y=$r_set_parma['min_2'];
		$v_min_b=$r_set_parma['min_3'];
		$v_max_r=$r_set_parma['max_1'];
		$v_max_y=$r_set_parma['max_2'];
		$v_max_b=$r_set_parma['max_3'];
		$c_max_r=$r_set_parma['c_1'];
		$c_max_y=$r_set_parma['c_2'];
		$c_max_b=$r_set_parma['c_3'];
		
	}
}
*/

$v_max_lr=230;
$v_max_ly=230;
$v_max_lb=230;
$pf2 = round((1 - $pf1 + 1)-2, 3);
?>