<?
$cmd="/home/ikko/repo/phpHue/turnoff_all.sh";
shell_exec($cmd);
header("Location: " . $_SERVER['HTTP_REFERER']);
?>
