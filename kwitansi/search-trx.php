 <?php
require('lib/lib-function-trx.php');
$query = $_GET['q'];
$fungsi = new Fungsi();
echo $fungsi->fetchData($query,'tab');
?>