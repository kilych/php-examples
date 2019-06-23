<?php

require __DIR__.'/../../vendor/autoload.php';

use Symfony\Component\ExpressionLanguage\ExpressionLanguage as Lang;

$ast = (new Lang())
  ->parse('(1 + 2)  *3', [])
  ->getNodes();

eval(\Psy\sh());
