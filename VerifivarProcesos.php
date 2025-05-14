<?php
echo "<pre>";
print_r(shell_exec('ps aux | grep php'));
echo "</pre>";
?>