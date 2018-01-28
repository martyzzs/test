<?php
/**
 * Created by PhpStorm.
 * User: Mārtiņš Frīdenbergs
 * Date: 29/01/2018
 * Time: 00:59
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Response;

class TestController extends AbstractController {

	/**
	 * @Route("/")
	 */

	public function start(){
		return new Response('Test!');
	}

	/**
	 * @Route("/{slug}")
	 */

	public function test($slug){
		return $this->render('test/test-start.html.twig',[
			'title' => ucwords(str_replace('-',' ',$slug)),
		]);
	}

}