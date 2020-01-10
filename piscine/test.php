<?php

$a = "abc";
$hash = password_hash($a, PASSWORD_DEFAULT);
echo $hash;

