<?php
if (session('auth')['travelSub']['otel_ticket_paying'] != 0) {
    require view('otel_ticket_paying');
}
