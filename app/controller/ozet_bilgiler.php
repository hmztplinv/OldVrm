<?php

if (session('auth')['travelSub']['ozet_bilgiler'] != 0) {
    require view('ozet_bilgiler');
}
