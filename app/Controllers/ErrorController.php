<?php

namespace Socks\Controllers;

class ErrorController extends CoreController
{
    /**
     * Display the error page when there is an 404 error
     */
    public function error404()
    {
        http_response_code('404');
        $this->show('error/error404');
    }

    /**
     * Display the error page when there is an 403 error
     */
    public function error403()
    {
        http_response_code('403');
        $this->show('error/error403');
    }
}
