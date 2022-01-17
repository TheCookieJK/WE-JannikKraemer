<?php
namespace App\Filters;

use CodeIgniter\Filters\FilterInterface;
use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;

class Projekt implements FilterInterface{

    public function before(RequestInterface $request, $arguments = null)
    {
        if(session()->projekt == 0){
            return redirect()->to('/projekte');
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // TODO: Implement after() method.
    }
}