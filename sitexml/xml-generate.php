<?php
/* 
 *   Magento Exporter by Sebastijan Placento 
 *   E-mail: 9a3bsp@gmail.com
 * 
 */
//const PATH='/home/public_html/';    //absolute path
if($_SERVER['SERVER_NAME']=="localhost"){
	$server="localhost";
	$username="root";
	$password="password";
	$database="dubazaaro";	
}
else
{
	$server="localhost";
	$username="dubaza14_dubdu";
	$password=".3^6c!7mA5)&";
	$database="dubaza14_du14";
}
//////////////////////////////////////////////
$link = mysql_connect( $server,$username,$password) or die("Unable to connect to the database...");
mysql_set_charset('utf8');
mysql_selectdb($database,$link);




// XML init;
$doc = new DOMDocument('1.0', 'UTF-8');	// add header
$doc->formatOutput = true;

$r = $doc->createElement( "urlset"  );
$r->setAttribute("xmlns","http://www.sitemaps.org/schemas/sitemap/0.9");
$doc->appendChild( $r );




$sql = " SELECT * FROM `categories` ";

$query  = mysql_query($sql,$link);
while ( $obj = mysql_fetch_object($query)){
	$b = $doc->createElement( "url" );

	$products = array(
			'loc' => 	'http://dubazaaro.com/'.$obj->seo.'/',
			'lastmod' => 	date('Y-m-d'),
			'changefreq'   => 'Monthly',
			'priority'   => 0.5  
			
	);
	foreach($products as $key => $value){
		createChild($key, $value);
	}

	$r->appendChild( $b );

	$sql2= " SELECT * FROM `categories` WHERE pid='".$obj->catid."' AND pid = parentid ";	
	$query2  = mysql_query($sql2,$link);
	while ( $obj2 = mysql_fetch_object($query2)){
		$b = $doc->createElement( "url" );
	
		$products = array(
				'loc' => 	'http://dubazaaro.com/'.$obj->seo.'/'.$obj2->seo.'/',
				'lastmod' => 	date('Y-m-d'),
				'changefreq'   => 'Monthly',
				'priority'   => 0.5  
				
		);
		foreach($products as $key => $value){
			createChild($key, $value);
		}
		$r->appendChild( $b );
		$sql3= " SELECT * FROM `categories` WHERE pid='".$obj2->catid."' AND pid != parentid ";	
		$query3  = mysql_query($sql3,$link);
		while ( $obj3 = mysql_fetch_object($query3)){
			$b = $doc->createElement( "url" );
		
			$products = array(
					'loc' => 	'http://dubazaaro.com/'.$obj->seo.'/'.$obj2->seo.'/'.$obj3->seo.'/',
					'lastmod' => 	date('Y-m-d'),
					'changefreq'   => 'Monthly',
					'priority'   => 0.5  
					
			);
			foreach($products as $key => $value){
				createChild($key, $value);
			}
			$r->appendChild( $b );
			$sql4= " SELECT * FROM `model` WHERE catid='".$obj3->catid."' ";	
				$query4  = mysql_query($sql4,$link);
			
			while ( $obj4 = mysql_fetch_object($query4)){
				$b = $doc->createElement( "url" );
			
				$products = array(
						'loc' => 	'http://dubazaaro.com/'.$obj->seo.'/'.$obj2->seo.'/'.$obj3->seo.'/'.$obj4->seo.'/',
						'lastmod' => 	date('Y-m-d'),
						'changefreq'   => 'Monthly',
						'priority'   => 0.5  
						
				);
				foreach($products as $key => $value){
					createChild($key, $value);
					}
				$r->appendChild( $b );
			
			}
			
		
		}
	}
}

$doc->save("site.xml");

function createChild($childName,$data){
	
	global $b;
	global $doc;
	$data=utf8_decode($data);
	$child = $doc->createElement( $childName );
	$child->appendChild(
			$doc->createTextNode(($data) ? $data : ' ')
	);
	$b->appendChild( $child );
}