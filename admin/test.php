<?php
require('sample.php');
$m = new Paginate();
?>

<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<?php
$m->loadPaginator('resources');
?>
</body>
</html>
