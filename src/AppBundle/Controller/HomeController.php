<?php

namespace AppBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\Request;

class HomeController extends Controller
{
    public function homeAction(Request $request)
    {
        return $this->render('@Page/Home/home.html.twig');
    }
}
