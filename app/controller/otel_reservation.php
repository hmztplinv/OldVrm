<?php

if (session('auth')['travelSub']['otel_reservation'] != 0) {
    require view('otel_reservation');
}


