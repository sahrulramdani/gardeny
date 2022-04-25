<?php

namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Admin implements FilterInterface
{
    /**
     * Do whatever processing this filter needs to do.
     * By default it should not return anything during
     * normal execution. However, when an abnormal state
     * is found, it should return an instance of
     * CodeIgniter\HTTP\Response. If it does, script
     * execution will end and that Response will be
     * sent back to the client, allowing for error pages,
     * redirects, etc.
     *
     * @param RequestInterface $request
     * @param array|null       $arguments
     *
     * @return mixed
     */
    public function before(RequestInterface $request, $arguments = null)
    {
              //session admin kosong
                if (session()->level == '') {
                    //lempar kehalaman login
                    return redirect()->to(base_url() . '/login');
                }
    }
    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        if (session()->level == 'admin') {
            return redirect()->to(base_url() . '/dashboard');
        }
    }
}