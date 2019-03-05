<?php

class MUtils extends CI_Model
{
    var $languages;
    var $statusMsg;

    function __construct()
    {
        //Load languages and Default Language
        $this->languages = $this->MLanguage->getLanguages()->result();
    }

    //This function save image path in media table and return the id from the table.
    function saveImagePath($name)
    {
        $arr = array (
            'image' => $name
        );

        $this->db->insert('media', $arr);
        return $this->db->insert_id();
    }

    //seperate data according to languages in different array...
    function arrangeDataAccordingToLanguage($arrData, $data)
    {
        $view = array();
        foreach ($arrData as $row)
        {
            $code = $row->code;
            if (!isset($view[$code]))
                $view[$code] = array();

            array_push($view[$code], $row);
        }
		
		
        return $view;
    }

    //Return Languages Data
    function getLanguages()
    {
        return $this->languages;
    }

    //Return Default Language
    function getDefaultLanguage()
    {
        return $this->languages[0]->id;
    }

    //Set JSON success message
    function setSuccess($msg)
    {
        $this->statusMsg = '{"status":"success", "msg":"' . $msg . '"}';
    }

    //Set JSON failure message
    function setError($msg)
    {
        $this->statusMsg = '{"status":"error", "msg":"' . $msg . '"}';
    }

    //Return JSON Status Message
    function getStatus()
    {
        return $this->statusMsg;
    }

    //Upload file and return url
    function doUpload($field, $width, $height, $resize=false)
    {
        //Configure upload.
        $this->upload->initialize(array(
            "upload_path"   => "../uploads/",
            "allowed_types" => "gif|jpg|png",
        ));


        //Perform upload.
        if($this->upload->do_upload($field)){

            $fileData = $this->upload->data();

            if ($resize == true)
            {
                $width = $fileData['image_width'];
                $height = $fileData['image_height'];
            }


            $img_cfg_thumb['image_library'] = 'gd2';
            $img_cfg_thumb['source_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['maintain_ratio'] = FALSE;
            $img_cfg_thumb['new_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['width'] = $width;
            $img_cfg_thumb['height'] = $height;
            $img_cfg_thumb['quality'] = 90;
            print_r($img_cfg_thumb);
            $this->load->library('image_lib');
            $this->image_lib->initialize($img_cfg_thumb);
            $this->image_lib->resize();


            return $fileData['raw_name'] . $fileData['file_ext'];
        }
        else
        {
            return "";
        }
    }
	
	
	
	
	 function doUploadAjx($field, $width, $height, $resize=false)
    {
        //Configure upload.
        $this->upload->initialize(array(
            "upload_path"   => "../uploads/",
            "allowed_types" => "gif|jpg|png",
        ));


        //Perform upload.
        if($this->upload->do_upload($field)){

            $fileData = $this->upload->data();

            if ($resize == true)
            {
                $width = $fileData['image_width'];
                $height = $fileData['image_height'];
            }


            $img_cfg_thumb['image_library'] = 'gd2';
            $img_cfg_thumb['source_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['maintain_ratio'] = FALSE;
            $img_cfg_thumb['new_image'] = "../uploads/" . $fileData['raw_name'] . $fileData['file_ext'];
            $img_cfg_thumb['width'] = $width;
            $img_cfg_thumb['height'] = $height;
            $img_cfg_thumb['quality'] = 90;
            print_r($img_cfg_thumb);
            $this->load->library('image_lib');
            $this->image_lib->initialize($img_cfg_thumb);
            $this->image_lib->resize();


            return $fileData;
        }
        else
        {
            return "";
        }
    }

    /* print the contents of a url */
    function print_r_xml($arr,$wrapper = 'data',$cycle = 1)
    {
        //useful vars
        $new_line = "";

        //start building content
        if($cycle == 1) { /* $output = '<?xml version="1.0" encoding="UTF-8" ?>'.$new_line; */ $output = ''; }
        $output.= $this->tabify($cycle - 1).'<'.$wrapper.'>'.$new_line;
        foreach($arr as $key => $val)
        {
            if(!is_array($val))
            {
                //$output.= tabify($cycle).'<'.htmlspecialchars($key).'>'.$val.'</'.htmlspecialchars($key).'>'.$new_line;
                $output.= '<'.htmlspecialchars($key).'>'.$val.'</'.htmlspecialchars($key).'>'.$new_line;
            }
            else
            {
                $output.= print_r_xml($val,$key,$cycle + 1).$new_line;
            }
        }
        //$output.= tabify($cycle - 1).'</'.$wrapper.'>';
        $output.= '</'.$wrapper.'>';

        //return the value
        return $output;
    }

    /* tabify */
    function tabify($num_tabs)
    {
        //for($x = 1; $x <= $num_tabs; $x++) { $return.= "\t"; }
        //return $return;
    }


    function xml2array($contents, $get_attributes=1, $priority = 'tag') {
        if(!$contents) return array();

        if(!function_exists('xml_parser_create')) {
            //print "'xml_parser_create()' function not found!";
            return array();
        }

        //Get the XML parser of PHP - PHP must have this module for the parser to work
        $parser = xml_parser_create('');
        xml_parser_set_option($parser, XML_OPTION_TARGET_ENCODING, "UTF-8"); # http://minutillo.com/steve/weblog/2004/6/17/php-xml-and-character-encodings-a-tale-of-sadness-rage-and-data-loss
        xml_parser_set_option($parser, XML_OPTION_CASE_FOLDING, 0);
        xml_parser_set_option($parser, XML_OPTION_SKIP_WHITE, 1);
        xml_parse_into_struct($parser, trim($contents), $xml_values);
        xml_parser_free($parser);

        if(!$xml_values) return;//Hmm...

        //Initializations
        $xml_array = array();
        $parents = array();
        $opened_tags = array();
        $arr = array();

        $current = &$xml_array; //Refference

        //Go through the tags.
        $repeated_tag_index = array();//Multiple tags with same name will be turned into an array
        foreach($xml_values as $data) {
            unset($attributes,$value);//Remove existing values, or there will be trouble

            //This command will extract these variables into the foreach scope
            // tag(string), type(string), level(int), attributes(array).
            extract($data);//We could use the array by itself, but this cooler.

            $result = array();
            $attributes_data = array();

            if(isset($value)) {
                if($priority == 'tag') $result = $value;
                else $result['value'] = $value; //Put the value in a assoc array if we are in the 'Attribute' mode
            }

            //Set the attributes too.
            if(isset($attributes) and $get_attributes) {
                foreach($attributes as $attr => $val) {
                    if($priority == 'tag') $attributes_data[$attr] = $val;
                    else $result['attr'][$attr] = $val; //Set all the attributes in a array called 'attr'
                }
            }

            //See tag status and do the needed.
            if($type == "open") {//The starting of the tag '<tag>'
                $parent[$level-1] = &$current;
                if(!is_array($current) or (!in_array($tag, array_keys($current)))) { //Insert New tag
                    $current[$tag] = $result;
                    if($attributes_data) $current[$tag. '_attr'] = $attributes_data;
                    $repeated_tag_index[$tag.'_'.$level] = 1;

                    $current = &$current[$tag];

                } else { //There was another element with the same tag name

                    if(isset($current[$tag][0])) {//If there is a 0th element it is already an array
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;
                        $repeated_tag_index[$tag.'_'.$level]++;
                    } else {//This section will make the value an array if multiple tags with the same name appear together
                        $current[$tag] = array($current[$tag],$result);//This will combine the existing item and the new item together to make an array
                        $repeated_tag_index[$tag.'_'.$level] = 2;

                        if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well
                            $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                            unset($current[$tag.'_attr']);
                        }

                    }
                    $last_item_index = $repeated_tag_index[$tag.'_'.$level]-1;
                    $current = &$current[$tag][$last_item_index];
                }

            } elseif($type == "complete") { //Tags that ends in 1 line '<tag />'
                //See if the key is already taken.
                if(!isset($current[$tag])) { //New Key
                    $current[$tag] = $result;
                    $repeated_tag_index[$tag.'_'.$level] = 1;
                    if($priority == 'tag' and $attributes_data) $current[$tag. '_attr'] = $attributes_data;

                } else { //If taken, put all things inside a list(array)
                    if(isset($current[$tag][0]) and is_array($current[$tag])) {//If it is already an array...

                        // ...push the new element into that array.
                        $current[$tag][$repeated_tag_index[$tag.'_'.$level]] = $result;

                        if($priority == 'tag' and $get_attributes and $attributes_data) {
                            $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                        }
                        $repeated_tag_index[$tag.'_'.$level]++;

                    } else { //If it is not an array...
                        $current[$tag] = array($current[$tag],$result); //...Make it an array using using the existing value and the new value
                        $repeated_tag_index[$tag.'_'.$level] = 1;
                        if($priority == 'tag' and $get_attributes) {
                            if(isset($current[$tag.'_attr'])) { //The attribute of the last(0th) tag must be moved as well

                                $current[$tag]['0_attr'] = $current[$tag.'_attr'];
                                unset($current[$tag.'_attr']);
                            }

                            if($attributes_data) {
                                $current[$tag][$repeated_tag_index[$tag.'_'.$level] . '_attr'] = $attributes_data;
                            }
                        }
                        $repeated_tag_index[$tag.'_'.$level]++; //0 and 1 index is already taken
                    }
                }

            } elseif($type == 'close') { //End of tag '</tag>'
                $current = &$parent[$level-1];
            }
        }

        return($xml_array);
    }




}