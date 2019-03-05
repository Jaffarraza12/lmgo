<?php

class MMedia extends CI_Model {

    function addMedia($data)
    {


        $arr = array (
            'mediaid' => $data['mediaid'],
			'image' => $data['image'],
			'image_large' => $data['image_large'],
			
			
        );

        if ($this->db->insert('media_data', $arr))
        {
            return 1;
           
        }
        else
        {
            return 0;
        }

    }

    function editMedia($data)
    {


        $sliderImageId = 0;
        if (isset($data['sliderImage']))
        {
            if (strlen($data['sliderImage']) > 0)
                $sliderImageId = $this->MUtils->saveImagePath($data['sliderImage']);
        }

        $smallImageId = 0;
        if (isset($data['smallImage']))
        {
            if (strlen($data['smallImage']) > 0)
                $smallImageId = $this->MUtils->saveImagePath($data['smallImage']);
        }

        $arr = array(
            'url' => $data['url'],
            'category' => $data['category'],
            'seo_url' => str_replace(" ", "_", $data['seo_url']),
            'show_on_homepage' => $data['homepage']
        );

        echo "small Image I d : " . $smallImageId;
        if ($smallImageId > 0)
            $arr['image'] = $smallImageId;

        if ($sliderImageId > 0)
            $arr['slider_image'] = $sliderImageId;

        $this->db->where('id', $data['wid']);
        $this->db->update('Media', $arr);

        foreach ($data['Languages'] as $lang)
        {
            $code = $lang->code;

            $arr = array(
                'title' => $data['title_' . $code] ,
                'long_desc' => $data['editor_' . $code] ,
                'meta_title' => $data['meta_title_' . $code] ,
                'meta_keywords' => $data['meta_keywords_' . $code] ,
                'meta_desc' => $data['meta_desc_' . $code],
                'slider_text' => $data['slider_text_' . $code],
                'slider_anchor' => $data['slider_anchor_' . $code],
                'slider_url' => $data['slider_url_' . $code],
                'mts' => time()
            );

            $this->db->where('id', $data['wd_id_' . $code]);
            $this->db->update('Media_data', $arr);
        }

        return 1;

    }
	 function loadAllData($ENUM = 'images')
    {
   		$q = " SELECT * FROM media ";
        $results = $this->db->query($q);
        return $results;
    }

    function loadAllAlbum($ENUM = 'images')
    {
   		$q = " SELECT *,(SELECT COUNT(*) FROM media_data WHERE mediaid = m.`mediaid` ) AS 'totalimages' FROM media m WHERE type = '".$ENUM."' ";
        $results = $this->db->query($q);
        return $results;
    }
	
	 function AddAlbum($data)
	 {
		$arr = array(
			'eng_title' => $data['eng_title'],
			'ar_title' => $data['ar_title'],
			'type' => $data['type'],
			'eng_description' => $data['eng_description'],
            'arb_description' => $data['arb_description']
		);
		
		if($data['icon']!=""){
			$arr['icon'] = $data['icon'];
		}
		
		if($this->db->insert('media',$arr))
			return 1;
		else
			return 0;		 
		 
	}
	function ModifyAlbum($data)
	 {
		$arr = array(
			'eng_title' => $data['eng_title'],
			'ar_title' => $data['ar_title'],
			'type' => $data['type'],
			'eng_description' => $data['eng_description'],
            'arb_description' => $data['arb_description']
		);
		
		if($data['icon']!=""){
			$arr['icon'] = $data['icon'];
		}
		
		
		$this->db->where('mediaid',$data['mediaid']);	
		if($this->db->update('media',$arr))
			return 1;
		else
			return 0;		 
		 
	}
	 function AddVideo($data)
	 {
		$arr = array(
			'title' => $data['title'],
			'url' => $data['link'],
			'mediaid' => $data['mediaid'],
			
		);
		
		
		if($this->db->insert('media_data',$arr))
			return 1;
		else
			return 0;		 
		 
	}
	
	function loadImagesById($mediaid)
    {
   		$q = " SELECT * FROM media_data WHERE mediaid = '".$mediaid."' ";
        $results = $this->db->query($q);
        return $results;
    }
	
	function loadVideosById($mediaid)
    {
   		$q = " SELECT * FROM media_data WHERE mediaid = '".$mediaid."' ";
        $results = $this->db->query($q);
        return $results;
    }
	
	
	function loadAlbumById($mediaid)
    {
   		$q = " SELECT * FROM media WHERE mediaid = '".$mediaid."' ";
        $results = $this->db->query($q);
        return $results;
    }
	 function deleteAlbum($id)
    {
        $this->db->where('mediaid', $id);
		if ($this->db->delete('media'))
        {
        		$this->db->where('mediaid', $id);
				$this->db->delete('media_data');
		       return 1;
         }
        else
            return 0;
    }
    function deleteImage($id)
    {
        $this->db->where('mdid', $id);
        if ($this->db->delete('media_data'))
        {
                return 1;
         }
        else
            return 0;
    }

    function sortMedia($ids)
    {
        $arr = explode(",", $ids);
        $num = 0;
        foreach ($arr as $item)
        {
            $this->db->where('id', $item);
            $this->db->update('Media', array('sort_order' => $num++));
        }
    }
	
	

	//Upload file and return url
    function doUploadWithCropping($field, $width, $height,$path ='../uploads/' )
    {
        //Configure upload.
        $this->upload->initialize(array(
            "upload_path"   => $path,
            "allowed_types" => "gif|jpg|png",
        ));
	
		
        //Perform upload.x
        if($this->upload->do_upload($field)){
	
            $fileData = $this->upload->data();

            $iw = $fileData['image_width'];
            $ih = $fileData['image_height'];

            $img_cfg_thumb['image_library'] = 'gd2';
            $img_cfg_thumb['source_image'] = $path . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['maintain_ratio'] = TRUE;
            $img_cfg_thumb['new_image'] = $path . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['width'] = $width;
            $img_cfg_thumb['height'] = $height;
            $img_cfg_thumb['quality'] = 100;
            $this->load->library('image_lib');

            if ($iw > $ih)
            {
                $ir = $height/$ih;
                $ih = $height;
                $newWidth = $ir * $iw;
                $x = abs($width-$newWidth)/2;
                $y = 0;

                //Reacalculate ratio again according to width and crop from y axis instead of x axis..
                if ($newWidth < $width)
                {
                    $ir = $width / $newWidth;
                    $newWidth = $newWidth * $ir;
                    $ih = $ih * $ir;
                    $x = 0;
                    $y = abs($height-$ih)/2;
                }

                $img_cfg_thumb['width'] = $newWidth;
                $img_cfg_thumb['height'] = $ih;

                $this->image_lib->initialize($img_cfg_thumb);
                $this->image_lib->resize();
            }
            else
            {
                $ir = $width/$iw;
                $iw = $width;
                $newHeight = $ir * $ih;
                $x = 0;
                $y = abs($newHeight-$height)/2;
                //Reacalculate ratio again according to height and crop from x axis instead of y axis..
                if ($newHeight < $height)
                {
                    $ir = $height / $newHeight;
                    $newHeight = $newHeight * $ir;
                    $iw = $iw * $ir;
                    $x = abs($width-$iw)/2;
                    $y = 0;
                }

                $img_cfg_thumb['width'] = $iw;
                $img_cfg_thumb['height'] = $newHeight;
                $this->image_lib->initialize($img_cfg_thumb);
                $this->image_lib->resize();
            }

            //Create another Array for resizing
            $img_cfg_thumb2['image_library'] = 'gd2';
            $img_cfg_thumb2['source_image'] = $path . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb2['new_image'] = $path . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb2['maintain_ratio'] = FALSE;
            $img_cfg_thumb2['width'] =  $width;
            $img_cfg_thumb2['height'] = $height;
            $img_cfg_thumb2['x_axis'] =  $x;
            $img_cfg_thumb2['y_axis'] = $y;
            $img_cfg_thumb2['quality'] = 100;

            $this->image_lib->initialize($img_cfg_thumb2);
            $this->image_lib->crop();

            return $fileData['raw_name'] . $fileData['file_ext'];
        }
        else
        {
            return "";
        }
    }
	
	
	
	
	
}