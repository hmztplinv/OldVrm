<?php
$quaplant=quaplant::get_cities();
//plant okey tamamlaandı orası
$sizes = quaplant::get_sizes();
//qua size vermesi lazım
damp($sizes);
require view('bordro');
