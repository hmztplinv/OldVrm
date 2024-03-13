<?php
if (session('auth')['travelSub']['gezinomi_otel_index'] != 0) {
    require view('gezinomi_otel_index');
}