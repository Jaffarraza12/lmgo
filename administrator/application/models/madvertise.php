<?php

class MShops extends CI_Model {

    var $entityType = 'Shops';

    function addShop($data)
    {
        	
		$arr = array();
      
		$arr['fax'] = $data['fax'];
		$arr['email'] = $data['email'];
		$arr['contact'] = $data['contact'];
		$arr['atributes'] = $data['atributes'];
		$arr['landmark'] = $data['landmark'];
		$arr['img_main'] = $data['img_main'] ;
		$arr['img_listview'] = $data['img_listview'];
		$arr['img_gridview'] = $data['img_gridview'];
		$arr['img_homeicon'] = $data['img_homeicon'];
		$arr['sts'] = time();
		$arr['mts'] = time();
		
		

        $this->db->insert('shop', $arr);
		$shopid = $this->db->insert_id();

        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr2 = array(
				'shopid' => $shopid , 
				'languageid' => $lang->id,
                'title' => ($data['title_' . $code]) ,
            	'address' => ($data['address_' . $code]) ,
			    'short_desc' => ($data['short_desc_' . $code]) ,
                'long_desc' => ($data['long_desc_' . $code]) ,
            
            );

        	 $this->db->insert('shop_detail', $arr2);
        }
		
		if($data['category'])
		{
			foreach($data['category'] as $val)
			{
				 $arr3 = array(
					'shopid' => $shopid , 
					'catid' => $val, 
				 );
				 
				 
				 $this->db->insert('shop_relation', $arr3);
				
				
			}
		} else 	{
			
				$arr3 = array(
					'shopid' => $shopid , 
					'catid' => 6, 
				 );
				 
				 
				 $this->db->insert('shop_relation', $arr3);
		}
		
		$i=0;
		foreach($data['addimages'] as $adimg)
		{
			$arr4 = array(
			'shopid' => $shopid , 
			'image' => $adimg,
			'image_large' => $data['addlargeimages'][$i],
			);	
		 $this->db->insert('shop_gallery', $arr4);
			
		$i++;
		}
		
		if($data['ownerid']!=''){
			
			$arr5 = array(
			'shopid' => $shopid ,
			'ownerid' => $data['ownerid'],
			); 
			$this->db->insert('shop_owner_relation', $arr5);
			
			
		}
		
		
		
		
		

        return 1;
        
		
		
    }


    function editShop($data)
    {
		
		$arr = array();
      
		$arr['fax'] = $data['fax'];
		$arr['email'] = $data['email'];
		$arr['contact'] = $data['contact'];
		$arr['landmark'] = $data['landmark'];
		$arr['atributes'] = $data['atributes'];
		$arr['img_main'] = $data['img_main'] ;
		$arr['img_listview'] = $data['img_listview'];
		$arr['img_gridview'] = $data['img_gridview'];
		$arr['img_homeicon'] = $data['img_homeicon'];
		
	
		
		if($data['image']!=""){
		$arr['image'] = $data['image'];
		}
		$arr['mts'] = time();


        $this->db->where('shopid', $data['id']);
        $this->db->update('shop', $arr);

        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr2 = array(
                'title' => ($data['title_' . $code]) ,
        		'address' => ($data['address_' . $code]) ,
			    'short_desc' => ($data['short_desc_' . $code]) ,
                'long_desc' => ($data['long_desc_' . $code]) ,
            
            );

            $this->db->where('sdid', $data['sd_id_' . $code]);
            $this->db->update('shop_detail', $arr2);
        }
		
		$this->db->where('shopid',$data['id']);
        $this->db->delete('shop_relation');
     
		if($data['category'])
		{
			foreach($data['category'] as $val)
			{
				 $arr3 = array(
					'shopid' => $data['id'] , 
					'catid' => $val, 
				 );
				 
				 
				 $this->db->insert('shop_relation', $arr3);
				
				
			}
		}  else {
			
				$arr3 = array(
					'shopid' =>  $data['id'] , 
					'catid' => 6, 
				 );
				 
				 
				 $this->db->insert('shop_relation', $arr3);
		}
		
		$this->db->where('shopid',$data['id']);
        $this->db->delete('shop_gallery');
		$i=0;
		if($data['addimages'])
		{
			foreach($data['addimages'] as $adimg)
			{
				$arr4 = array(
				'shopid' => $data['id'] , 
				'image' => $adimg,
				'image_large' => $data['addlargeimages'][$i],
				);	
			 $this->db->insert('shop_gallery', $arr4);
				
			$i++;
			}
		}
        return 1;
        
		
    }

    function viewShops()
    {
         $q = "SELECT s.`shopid`,sd.title,sd.short_desc,sd.long_desc,l.code FROM shop s
		 
		 	  INNER JOIN shop_detail sd ON s.`shopid` = sd.`shopid`

			  INNER JOIN languages l  ON   sd.languageid = l.id ";
       
        $results = $this->db->query($q);
        return $results;
    }

    function viewShopsById($id)
    {
        $q = "SELECT s.`shopid`,s.`main_title`,s.email,s.website,s.contact,s.atributes,s.fax,s.img_main,s.img_gridview,s.img_listview,s.img_homeicon,s.landmark,sd.address,sd.sdid,sd.title,sd.short_desc,sd.long_desc,l.code,l.`color` FROM shop s
		 
		 	  INNER JOIN shop_detail sd ON s.`shopid` = sd.`shopid`

			  INNER JOIN languages l  ON   sd.languageid = l.id 
			  
			  WHERE s.`shopid` = '".$id."' ";
       
        $results = $this->db->query($q);
        return $results;
    }
	
	
	function Shopgallery($shopid)
	{
		$q = " SELECT * FROM `shop_gallery` WHERE shopid = '".$shopid."' ";
		
		$results = $this->db->query($q);
		
		return   	$results;	
		
	}

    function deleteShop($id)
    {
      	$this->db->where("shopid",$id);
		if($this->db->delete("shop")){
			
			$this->db->where("shopid",$id);
			$this->db->delete("shop_detail");
			
			$this->db->where("shopid",$id);
			$this->db->delete("shop_relation");
			
			$this->db->where("shopid",$id);
			$this->db->delete("shop_owner_relation");
			
			$this->db->where("shopid",$id);
			$this->db->delete("shop_gallery");
			
			
			return 1;
			
		}
		
    }
	
	
	
	function GetLandMark()
	{	
	
	
		$q = " SELECT DISTINCT(landmark) FROM  `shop` ";
		
		$results = $this->db->query($q);
		
		return   	$results;	
			
	}
	
	
	
	
}