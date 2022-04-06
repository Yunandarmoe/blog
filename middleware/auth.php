<?php

if (Auth::guest()) {
    redirect('login.php');
}