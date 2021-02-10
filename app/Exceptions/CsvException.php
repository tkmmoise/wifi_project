<?php

namespace App\Exceptions;

use Exception;
use Throwable;

class CsvException extends Exception
{
    public function report()
    {
        //
    }

    public function render($request)
    {
        //return redirect('/admin');
    }
}
