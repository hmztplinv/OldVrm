<?php
if (session('auth')['travelSub']['rent_a_car_index'] != 0) {
    require view('rent_a_car_index');
}
