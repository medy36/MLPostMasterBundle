MLPostMasterBundle

Symfony2 bundle for PostMaster API And Export API

License

MLPostMasterBundle is licensed under the MIT License - see the Resources/meta/LICENSE file for details


https://www.postmaster.io/
Requirements

    "require": {
				"php": ">=5.3.2",
				"symfony/framework-bundle": "2.*"
				},

Installation:

- add to your composer.json in the require section: "lasri/postmaster-bundle": "dev-master" 
- install your dependecies:

   	php composer.phar require  "lasri/postmaster-bundle": "dev-master" 
    
- add the bundle to your AppKernel:
   
	new ML\PostMasterBundle\MLPostMasterBundle(),

- in your config.yml 

ml_post_master:
    api_key: *************************  your api key here




Issues

Please use appropriately tagged github issues to request features or report bugs.

Usage:
		
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

        $tran = $postmaster->getTransitTimes();
        $tranR = $tran->get(
        array(
        "from_zip" => "78701",
        "to_zip" => "78709",
        "weight" => 22.5,
        "carrier" => "fedex",
        ));
        var_dump($tranR);

        $rate = $postmaster->getRates();
        $rateR = $rate->get(array(
        "from_zip" => "78701",
        "to_zip" => "78704",
        "weight" => 0.5,
        "carrier" => "fedex",
        ));
       

        var_dump($rateR); 


        $ship = $postmaster->getShipment();
        $shipR = $ship->create(array(
        "to" => array(
        "company" => "Postmaster Inc.",
        "contact" => "Louardi Abdeltif",
        "line1" => "701 Brazos St. Suite 1616",
        "city" => "Austin",
        "state" => "TX",
        "zip_code" => "78701",
        "phone_no" => "512-693-4040",
        ),
        "from" => array(
        "company" => "Postmaster Inc.",
        "contact" => "Joe Smith",
        "line1" => "701 Brazos St. Suite 1616",
        "city" => "Austin",
        "state" => "TX",
        "zip_code" => "78701",
        "phone_no" => "512-693-4040",
        ),
        "carrier" => "fedex",
        "service" => "2DAY",
        "package" => array(
        "weight" => 1.5,
        "length" => 10,
        "width" => 6,
        "height" => 8,
        "label" =>array(

            "format" => "NORMAL",


            ),
        ),
        ));
        var_dump($shipR);



        /* monitor external package */
        $trac = $postmaster->getTracking();
        $tracR = $trac->monitor_external(array(
        "tracking_no" => "1ZW470V80310800043",
        "url" => "http://example.com/your-http-post-listener",
        "events" => ["Delivered", "Exception"]
        ));
        var_dump($tracR);



        /* create box example */
        $pack = $postmaster->getPackage();
        $packR = $pack->create(array(
        "width" => 10,
        "height" => 12,
        "length" => 8,
        "name" => 'My Box'
        ));
        var_dump($packR);

        die;
