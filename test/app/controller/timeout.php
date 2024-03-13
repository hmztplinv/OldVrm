<?php

user::mail_token_passive();
session_destroy();
header(site_url('login'));