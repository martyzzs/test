<?php
/**
 * Created by PhpStorm.
 * User: Mārtiņš Frīdenbergs
 * Date: 29/01/2018
 * Time: 00:59
 */

namespace App\Controller;


use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
use Symfony\Component\HttpFoundation\Response;

class TestController {

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
		return new Response(sprintf(
			'%s',
			$slug
		));
	}

}