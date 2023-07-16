   <?php
  include('config.php');
	  
  $record_per_page = 5;
$result = $conn->query('SELECT id,name FROM register');

$num_rows= $result->num_rows;

$no_of_pages=ceil($num_rows/$record_per_page);
	if(!isset($_GET['page']))
    {
      $page=1;
    }
    else
    {
      $page=$_GET['page'];
    }

    $first_result=($page-1)*$record_per_page;
    ?>
<html>
<head>
<title> php </title>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js"></script>
</head>
<body>
  <form action="index.php?action=logout" method="GET">

    <input type="submit" value="logout"/>
  </form>
  <center>
<h1>User Detail</h1>
<hr>

<table id="employee" class="table table-striped table-hover ">
        <thead>
            <tr>
        <th>Id</th>
        <th><a href="index.php?page=<?php echo $page;?>&order=name&dir=asc&action=search">Name</a></th>
        <th><a href="index.php?page=<?php echo $page;?>&order=division&dir=asc&action=search">Division</a></th>
        <th><a href="index.php?page=<?php echo $page;?>&order=email&dir=asc&action=search">Email</a></th>
        <th>Actions</th>
            </tr>

        </thead>
        
        <tbody>
 <?php
   $order=$_GET['order'];
    $dir=$_GET['dir'];
  if($_GET['order'] == 'email'  && $_GET['dir'] == 'asc')
    {
		$query="SELECT id,name,division,email FROM register order by email"; 		
    }
    elseif($_GET['order'] == 'name'  && $_GET['dir'] == 'asc')
    {
		$query="SELECT id,name,division,email FROM register order by name"; 
      }
	elseif($_GET['order'] == 'division'  && $_GET['dir'] == 'asc')
    {
		$query="SELECT id,name,division,email FROM register order by division";
      }  
	else
	{
		$query="SELECT id,name,division,email FROM register"; 	
	 }
   
    $array=  " LIMIT ".$first_result.",".$record_per_page."";
	$result1 = $conn->query($query.$array);

	foreach($result1 as $row)    {
      echo "<tr>";
      echo "<td>" . $row['id'] ."</td>";
      echo "<td>" . $row['name'] ."</td>";
      echo "<td>" . $row['division'] . "</td>";
      echo "<td>" . $row['email'] . "</td>";
      echo "<td><a href='index.php?id=".$row['id']."&action=edit'>Edit</a> / <a href='index.php?id=".$row['id']."&action=delete' onclick=\"return confirm('Are you sure?')\">Delete</a></td>"; 
      echo "</tr>";
    }
    ?>

<ul class="pagination">
<?php
    for($page=1; $page<=$no_of_pages; $page++)
    {     
  ?><li class='page-item'><a class='page-link' href='index.php?page=<?php echo $page;?>&order=<?php echo $order;?>&dir=<?php echo $dir;?>&action=search'><?php echo $page ?></a></li>
       <?php
   }

?>
</ul>   
 </tbody>
</table>

 </div>
</div>
</body>
</html>






