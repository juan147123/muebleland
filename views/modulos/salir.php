<?php
session_destroy();
echo '<script>
location.href ="login";
</script>';
exit();
?>