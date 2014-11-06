<?php

namespace ML\PostMasterBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\Controller;
use Symfony\Component\HttpFoundation\RedirectResponse;


// these import the "@Route" and "@Template" annotations
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Route;
// use Sensio\Bundle\FrameworkExtraBundle\Configuration\Template;

class DefaultController extends Controller
{
  
    public function indexAction()
    {



		$postmaster = $this->get('postmaster');
		
		$add= $postmaster->getAddressValidation();
		$addR= $add->validate(array("company" => "Postmaster Inc.",
		"contact" => "Joe Smith",
		"line1" => "701 Brazos St. Suite 1616",
		"city" => "Austin",
		"state" => "TX",
		"zip_code" => "78701",
		"country" => "US",
		));

		var_dump($addR);

		exit('PPP');
        
    }

  
}
