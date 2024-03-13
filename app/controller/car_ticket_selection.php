<?php
if (session('auth')['travelSub']['car_ticket_selection'] != 0) {
    require view('car_ticket_selection');
}
