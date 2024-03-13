<?php

$overtimes = Hr::get_overtimes(session('user_id'));
$costs = Cost::get_costs(session('user_id'));
//damp(session('user_name'));
require view('profile');
