<?php

if (post('$auth_person')){
    complaint::update_person_auth();
}
require view('auth_person');
