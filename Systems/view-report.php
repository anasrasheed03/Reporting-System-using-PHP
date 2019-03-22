<?php 

include('config/header.php');
?>
<style>


  body {
  background-color: #f1f1f1;
}
  

  table{
    left:50px;
  }

</style>

<br/>
<br/>
<h3 class="h3 text-center" >Audit Reports Details</h3>

<div class="container">
  <div class="row">
    <div class="col-8"></div>
    <div class="col-12">


<table  class="table text-center table-hover">
  <thead>
  	 	<?php 
  	$id=$_GET['id'];
$query="select * from `audit` where id=$id";
$sql=mysqli_query($connect, $query);
$rows=mysqli_num_rows($sql);
if($rows==1){
	while($row=mysqli_fetch_assoc($sql)){
		$location=$row['location'];
		$competency=$row['competency'];
		$customer=$row['Customer'];
		$track=$row['tracks'];
		$auditDate=$row['aduitDate'];
		$Project=$row['projectName'];
    $id=$row['id'];
    	$projectManager=$row['projectManager'];
    	$lead=$row['Lead'];
    	$qalead=$row['qaLead'];
    	$auditor=$row['auditor'];
    	$nc=$row['Total_NC'];
      $remarks=$row['remarks'];
?>
    <tr>
      <th scope="col" colspan="8" style="text-align:center;">General Information
      <tr>
      <th scope="col" style="text-align:left">Location</th>
      <td style="text-align:left"><?php echo $location;?></td>
      <th scope="col" style="text-align:left">Project Manager</th>
      <td style="text-align:left"><?php echo $projectManager;?></td>
    <tr>
      <th scope="col" style="text-align:left">Competency</th>
      <td style="text-align:left"><?php echo $competency;?></td>
      <th scope="col" style="text-align:left">Development Lead</th>
      <td style="text-align:left"><?php echo $lead;?></td>
      <tr>
      <th scope="col" style="text-align:left">Track</th>
		<td style="text-align:left"><?php echo $track;?></td>
	  <th scope="col" style="text-align:left">QA Lead</th>
		<td style="text-align:left"><?php echo $qalead;?></td>
      <tr>
      <th scope="col" style="text-align:left">Customer</th>
      <td style="text-align:left"><?php echo $customer;?></td>
      <th scope="col" style="text-align:left">Auditor</th>
      <td style="text-align:left"><?php echo $auditor;?></td>
      <tr>
      <th scope="col" style="text-align:left">Project</th>
      <td style="text-align:left"><?php echo $Project;?></td>
      <th scope="col" style="text-align:left">Audit Date</th>
      <td style="text-align:left"><?php echo $auditDate;?></td>
      <tr>
      <th scope="col" colspan="2" style="text-align:left">Number of NC </th>
      <td colspan="2" style="text-align:right"><?php echo $nc;?></td>
      </tr>
  </tr>
  </tr>
  </tr>
  </tr>
  </tr>
  </tr>
      </th>
     
    </tr>
    <tr>
      <th scope="col" colspan="4" style="text-align:left">Remarks</th>   
    </tr>
    <tr>
      <td colspan="4" style="text-align:left"><?php echo $remarks;?></td>      
    </tr>
  </thead>
  <tbody>

    
  <?php	}
}
?> 
    
  </tbody>


</table>

<table class="table text-center table-hover">
  <tr>
    <?php 
$query1="SELECT check_list.checklist_id, check_list.Evidence, check_list.Verified,check_list.Total_Points,check_list.Points_Attained,check_list.Exception_Deviation,check_list.NC, check_list.Observation,check_list.report_id, check_list.question,check_list.project_total from audit INNER JOIN check_list where check_list.report_id = $id && check_list.report_id = audit.id";

  $sql1=mysqli_query($connect, $query1);
  $rows=mysqli_num_rows($sql1);
if($rows>0){
    $test=mysqli_fetch_assoc($sql1);
      $project_total=$test['project_total'];
    
}

    ?>
<h3 class="text-center">Project Total Score: <?php echo $project_total;?></h3>
    <th scope="col" colspan="8" style="text-align:center;">INTERNAL AUDIT CHECK LIST FOR PROJECT MANAGEMENT
      </th>
      <td><a href="report-summary?id=<?php echo $id; ?>" ><button align="left">View Summary</button></a></td>
  </tr>
  <tr>
    <th class="text-left">Sr#</th>
    <th class="text-left">Query</th>
    <th class="text-left">Possible Evidence</th>
    <th class="text-left">Verified</th>
    <th class="text-left">Total Points</th>
    <th class="text-left">Points Attained</th>
    <th class="text-left">Exception/ Deviation</th>
    <th class="text-left">NC #</th>
    <th class="text-left">Observation and Remarks</th>
  </tr>
<?php 
  
  
  $sr=0;
  if($rows>0){
  while($row1=mysqli_fetch_assoc($sql1)){
    $question=$row1['question'];
    $Verified=$row1['Verified'];
    $Total_Points=$row1['Total_Points'];
    $Points_Attained=$row1['Points_Attained'];
    $Evidence=$row1['Evidence'];
    $Exception_Deviation=$row1['Exception_Deviation'];
    $Observation=$row1['Observation'];
    $nc=$row1['NC'];    
    $sr++;


?>
  <tr>
    <td style="text-align:left"><?php echo $sr?></td>
    <td style="text-align:left"><?php echo $question;?></td>
    <td style="text-align:left"><?php echo $Evidence;?></td>
    <td style="text-align:left"><?php echo $Verified;?></td>
    <td style="text-align:left"><?php echo $Total_Points;?></td>
    <td style="text-align:left"><?php echo $Points_Attained;?></td>
    <td style="text-align:left"><?php echo $Exception_Deviation;?></td>
    <td style="text-align:left"><?php echo $nc;?></td>
    <td style="text-align:left"><?php echo $Observation;?></td>
    
    


  </tr>

  <?php 
}
}
  ?>

</table>


</div>
</div>
</div>
<div class="col-8"></div>
<br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>
 <br>

<?php 
include('config/footer.php');
 ?>