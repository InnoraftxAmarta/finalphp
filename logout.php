<?php
session_start();
session_unset();
session_destroy();
echo "<script>location.href='index1.php'</script>";

?>