<?php

require_once('application/models/ModelToeic.php');
$a = ModelToeic::getScoreReading(25);
echo $a;