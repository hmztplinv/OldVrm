<?php

if (session('auth')['travelSub']['reservation'] != 0) {
    require view('rent_acar_reservation');
}


