<?php

namespace App\Exceptions;

use Exception;

class ErrorFoundException extends Exception
{
    function report() {}

    function render() {
        return view('errors.404');
    }
}
