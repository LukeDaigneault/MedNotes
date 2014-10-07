<?php
/*
* app/validators.php
*/

Validator::extend('alpha_num_spaces', function($attribute, $value)
{
    return preg_match('/^[\pL0-9\s]+$/u', $value);
});