<?php

if (session('auth')['travelSub']['gezinomi_otel_detay'] != 0) {
    require view('gezinomi_otel_detay');
}