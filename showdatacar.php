<?php 
  
  session_start();

  if(!isset($_SESSION['login'])){
    header('location: login.php');
  }


	include "conn.php";
  include "link.php";
	$sql = "SELECT b.ibeacon_name name, a.status status, a.location loc, a.datetime datetime
          FROM   history a, ibeacon_name b 
          WHERE  a.mac_address = b.mac_address AND a.location = 'node3'
          ORDER BY a.datetime DESC";

	$data_query = $conn->query($sql);
	$count = 1;

	
?>

<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Baby system alert &copy; </title>
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body>

<nav class="navbar navbar-expand-lg navbar-dark " style="background-color: #28B463;">
  <div class="container-fluid">
    <a class="navbar-brand" href="#">ℬ</a>
    <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
      <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav me-auto mb-2 mb-lg-0">
        <li class="nav-item">
          <a class="nav-link " aria-current="page" href="<?php echo $l_homepage; ?>">Home</a>
        </li>
        <li class="nav-item dropdown">
          <a class="nav-link dropdown-toggle  active" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
            iBeacon
          </a>
          <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo $l_myhome; ?>">My Home</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item" href="<?php echo $l_class; ?>">Class Room</a></li>
            <li><hr class="dropdown-divider"></li>
            <li><a class="dropdown-item  active" href="<?php echo $l_car; ?>">Car</a></li>
            <li><hr class="dropdown-divider"></li>
          </ul>
        </li>
      </ul>
  	
  		<svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-people-fill" viewBox="0 0 16 16">
		  <path d="M7 14s-1 0-1-1 1-4 5-4 5 3 5 4-1 1-1 1H7zm4-6a3 3 0 1 0 0-6 3 3 0 0 0 0 6z"/>
		  <path fill-rule="evenodd" d="M5.216 14A2.238 2.238 0 0 1 5 13c0-1.355.68-2.75 1.936-3.72A6.325 6.325 0 0 0 5 9c-4 0-5 3-5 4s1 1 1 1h4.216z"/>
		  <path d="M4.5 8a2.5 2.5 0 1 0 0-5 2.5 2.5 0 0 0 0 5z"/>
		</svg>
<font style="margin-right: 10px; margin-left: 5px"><?php  echo "ผู้ใช้ : ".$_SESSION['login']; ?></font>

        <a href="logout.php" class="btn btn-light"  style="width: 100px">logout</a>
    
    </div>
  </div>
</nav>



<div class="container" style="margin-top: 20px;">
  <h4>Car</h4>
  <div class="card mt-3" style="padding: 10px; ">
<table class="table table-hover" id="data-table">
  <thead>
    <tr>
      <th scope="col" >ลำดับที่</th>
      <th scope="col" >ชื่อ</th>
      <th scope="col" >สถานะ</th>
      <th scope="col" >สถานที่</th>
      <th scope="col" >วันที่ และเวลา</th>
    </tr>
  </thead>
  <tbody>
    <?php while ($row = $data_query->fetch_assoc()) {  ?>
    <tr>
      <?php if($row["status"] == "in"){
              $status = "อยู่ในระยะ";
            } 
            else{
              $status = "ออกนอกพื้นที่";
            }


            if($row["loc"] == "node1"){
              $loc = "บ้านของฉัน";
            } 
            else if($row["loc"] == "node3"){
              $loc = "ในรถยนต์";
            } 
            else if($row["loc"] == "node2"){
              $loc = "ห้องเรียน";
            }  


      ?>
      <th scope="row"><?php echo $count; ?></th>
      <td><?php echo $row["name"]; ?></td>
      <td><?php echo $status; ?></td>
      <td><?php echo $loc; ?></td>
      <td><?php echo $row["datetime"]; ?></td>
    </tr>
    <?php $count ++; } ?>
  </tbody>
</table>
  </div>
</div>

<div style="background: #28B463; width: 100%; height: 50px; color: white; padding-top: 10px;" class="fixed-bottom text-center">
  &copy 2021 Baby system alert by Jirawat & Yodsatorn
</div>


<!-- JS -->
<script src="js/bootstrap.min.js"></script>


<script src="js/jquery.min.js"></script>
<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
<script type="text/javascript" src="js/dataTables.bootstrap4.min.js"></script>
<script type="text/javascript">
  $(document).ready(function() {
    $('#data-table').DataTable();
} );
</script>
<script type="text/javascript">
$.extend(true, $.fn.dataTable.defaults, {
    "language": {
        "sEmptyTable":     "ไม่มีข้อมูล",
        "sInfo":           "รายการที่ _START_ ถึง _END_ จากทั้งหมด _TOTAL_ รายการ",
        "sInfoEmpty":      "แสดง 0 ถึง 0 จาก 0 รายการ",
        "sInfoFiltered":   "(กรองข้อมูล _MAX_ ทุกแถว)",
        "sInfoThousands":  ",",
        "sLengthMenu":     "แสดง _MENU_ รายการ",
        "sLoadingRecords": "กำลังโหลดข้อมูล...",
        "sProcessing":     "กำลังดำเนินการ...",
        "sSearch":         "ค้นหา: ",
        "sZeroRecords":    "ไม่พบข้อมูลที่ท่านค้นหา",
        "oPaginate": {
            "sFirst":    "หน้าแรก",
      "sPrevious": "ก่อนหน้า",
            "sNext":     "ถัดไป",
      "sLast":     "หน้าสุดท้าย"
        },
        "oAria": {
            "sSortAscending":  ": เปิดใช้งานการเรียงข้อมูลจากน้อยไปมาก",
      "sSortDescending": ": เปิดใช้งานการเรียงข้อมูลจากมากไปน้อย"
        }
    }
});
$('.table').DataTable();
</script>


</body>
</html>