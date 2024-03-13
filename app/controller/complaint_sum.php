<?php

$this_month_total_complaint=complaint::get_this_month_total_complaint();
$last_month_total_complaint=complaint::get_last_month_total_complaint();

//damp($this_month_total_complaint);


require view("complaint_sum");
