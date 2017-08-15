<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

function getRef($NO, $SECT)
	{
		$CI = & get_instance();
        $data = $CI->db->get_where('BIODATA_WNI_MASTER',array('NO'=>$NO, 'SECT'=>$SECT))->result_array();
		return $data[0]["DESCRIP"];
	}
	
	function getWilayah($NO_PROP=0, $NO_KAB=0, $NO_KEC=0, $NO_KEL=0)
	{
	if($NO_KEL > 0){
			$CI = & get_instance();
			$data = $CI->db->get_where('STS_DEMOGRAPHICS_CMS_DP4_OK',array('NO_PROP'=>$NO_PROP, 'NO_KAB'=>$NO_KAB, 'NO_KEC'=>$NO_KEC, 'NO_KEL'=>$NO_KEL))->result_array();
			return $NO_KEL;
		}elseif($NO_KEC > 0){
			$CI = & get_instance();
			$data = $CI->db->get_where('STS_DEMOGRAPHICS_CMS_DP4_OK',array('NO_PROP'=>$NO_PROP, 'NO_KAB'=>$NO_KAB, 'NO_KEC'=>$NO_KEC))->result_array();
			return $data[0]["NO_KEC"];
		}elseif($NO_KAB > 0){
			$CI = & get_instance();
			$data = $CI->db->get_where('STS_DEMOGRAPHICS_CMS_DP4_OK',array('NO_PROP'=>$NO_PROP, 'NO_KAB'=>$NO_KAB))->result_array();
			return $data[0]["NO_KAB"];
		}elseif($NO_PROP > 0){
			$CI = & get_instance();
			$data = $CI->db->get_where('STS_DEMOGRAPHICS_CMS_DP4_OK',array('NO_PROP'=>$NO_PROP))->result_array();
			return $data[0]["NO_PROP"];
		}
	}
	
	function tambah_nol($text, $n){
		return str_pad($text, $n, "0", STR_PAD_LEFT);
	}

	function faces($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$filename = "faces/".$NO_PROP."/".str_pad($NO_KAB, 2, "0", STR_PAD_LEFT)."/".str_pad($NO_KEC, 2, "0", STR_PAD_LEFT)."/".$NO_KEL."/".$NIK.".jpg";		
		if(is_file("g:/".$filename)){
			$file["FACE"] = "images/".$filename;
		}else{
			$file["FACE"] = "images/user.png";
		}
		return $file;
	}
	
	function signatures($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$filename = "sign/".$NO_PROP."/".str_pad($NO_KAB, 2, "0", STR_PAD_LEFT)."/".str_pad($NO_KEC, 2, "0", STR_PAD_LEFT)."/".$NO_KEL."/".$NIK.".jpg";
		if(is_file("h:/".$filename)){
			$file["SIGNATURE"] = "images/".$filename;
		}else{
			$file["SIGNATURE"] = "images/no_image.png";
		}
		return $file;
	}
	
	function iris($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$NIK = substr($NIK, 12);
		$filename['RIGHT_IRIS'] = "iris/99/".$NIK."RIGHT_IRIS.jpg";
		$filename['LEFT_IRIS'] = "iris/99/".$NIK."LEFT_IRIS.jpg";
		foreach($filename as $key=>$value){
			if(is_file("l:/".$value)){
				$file[$key] = "images/".$value;
			}else{
				$file[$key] = "images/no_image.png";
			}
		}
		return $file;
	}
	
	function fingers($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$NIK = substr($NIK, 12);
		$filename['LEFT_INDEX'] = "finger/99/".$NIK."LEFT_INDEX.jpg";
		$filename['LEFT_LITTLE'] = "finger/99/".$NIK."LEFT_LITTLE.jpg";
		$filename['LEFT_MIDDLE'] = "finger/99/".$NIK."LEFT_MIDDLE.jpg";
		$filename['LEFT_RING'] = "finger/99/".$NIK."LEFT_RING.jpg";
		$filename['LEFT_THUMB'] = "finger/99/".$NIK."LEFT_THUMB.jpg";
		$filename['RIGHT_INDEX'] = "finger/99/".$NIK."RIGHT_INDEX.jpg";
		$filename['RIGHT_LITTLE'] = "finger/99/".$NIK."RIGHT_LITTLE.jpg";
		$filename['RIGHT_MIDDLE'] = "finger/99/".$NIK."RIGHT_MIDDLE.jpg";
		$filename['RIGHT_RING'] = "finger/99/".$NIK."RIGHT_RING.jpg";
		$filename['RIGHT_THUMB'] = "finger/99/".$NIK."RIGHT_THUMB.jpg";
		foreach($filename as $key=>$value){
			if(is_file("l:/".$value)){
				$file[$key] = "images/".$value;
			}else{
				$file[$key] = "images/no_image.png";
			}
		}
		return $file;
	}
	
	/*
	function iris($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$CI = & get_instance();
		$CI->db->where(array('NIK'=>$NIK));
		$hasil = $CI->db->count_all_results('IRIS_DEMO');
		if($hasil == 0){
			$hasil_blob['RIGHT_IRIS'] = "images/no_image.png";	
			$hasil_blob['LEFT_IRIS'] = "images/no_image.png";	
			return $hasil_blob;
		}
		$hasil = $CI->db->get_where('IRIS_DEMO', array('NIK'=>$NIK))->result_array();
		$hasil_blob['RIGHT_IRIS'] = $hasil[0]['RIGHT_IRIS']->load();	
		$hasil_blob['LEFT_IRIS'] = $hasil[0]['LEFT_IRIS']->load();	
		$dir_foto = "/TNP2K/Iris/".$NO_PROP."/".$NO_KAB."/".$NO_KEC."/".$NO_KEL."/".$NIK."/";
		$folder = getcwd().$dir_foto;
		if(!file_exists($folder)){
			mkdir($folder,0777,true);
		}
		foreach($hasil_blob as $key=>$value){
			if($value){
				$file[$key] = $dir_foto.$NIK."_".$key.".jpg";
				file_put_contents(getcwd().$file[$key], $value);
				continue;
			}
			$file[$key] = "images/no_image.png";
		}
		return $file;
	}
	
	function fingers($NIK, $NO_PROP, $NO_KAB, $NO_KEC, $NO_KEL){
		$CI = & get_instance();
		$CI->db->where(array('NIK'=>$NIK));
		$hasil = $CI->db->count_all_results('FINGERS_DEMO');
		if($hasil == 0){
			$hasil_blob['LEFT_INDEX'] = "images/no_image.png";	
			$hasil_blob['LEFT_LITTLE'] = "images/no_image.png";	
			$hasil_blob['LEFT_MIDDLE'] = "images/no_image.png";	
			$hasil_blob['LEFT_RING'] = "images/no_image.png";	
			$hasil_blob['LEFT_THUMB'] = "images/no_image.png";	
			$hasil_blob['RIGHT_INDEX'] = "images/no_image.png";	
			$hasil_blob['RIGHT_LITTLE'] = "images/no_image.png";	
			$hasil_blob['RIGHT_MIDDLE'] = "images/no_image.png";	
			$hasil_blob['RIGHT_RING'] = "images/no_image.png";	
			$hasil_blob['RIGHT_THUMB'] = "images/no_image.png";	
			return $hasil_blob;
		}
		$hasil = $CI->db->get_where('FINGERS_DEMO', array('NIK'=>$NIK))->result_array();
		$hasil_blob['LEFT_INDEX'] = $hasil[0]['LEFT_INDEX']->load();	
		$hasil_blob['LEFT_LITTLE'] = $hasil[0]['LEFT_LITTLE']->load();	
		$hasil_blob['LEFT_MIDDLE'] = $hasil[0]['LEFT_MIDDLE']->load();	
		$hasil_blob['LEFT_RING'] = $hasil[0]['LEFT_RING']->load();	
		$hasil_blob['LEFT_THUMB'] = $hasil[0]['LEFT_THUMB']->load();	
		$hasil_blob['RIGHT_INDEX'] = $hasil[0]['RIGHT_INDEX']->load();	
		$hasil_blob['RIGHT_LITTLE'] = $hasil[0]['RIGHT_LITTLE']->load();	
		$hasil_blob['RIGHT_MIDDLE'] = $hasil[0]['RIGHT_MIDDLE']->load();	
		$hasil_blob['RIGHT_RING'] = $hasil[0]['RIGHT_RING']->load();	
		$hasil_blob['RIGHT_THUMB'] = $hasil[0]['RIGHT_THUMB']->load();	
		$dir_foto = "/TNP2K/Fingers/".$NO_PROP."/".$NO_KAB."/".$NO_KEC."/".$NO_KEL."/".$NIK."/";
		$folder = getcwd().$dir_foto;
		if(!file_exists($folder)){
			mkdir($folder,0777,true);
		}
		foreach($hasil_blob as $key=>$value){
			if($value){
				$file[$key] = $dir_foto.$NIK."_".$key.".jpg";
				file_put_contents(getcwd().$file[$key], $value);
				continue;
			}
			$file[$key] = "images/no_image.png";
		}
		return $file;
	}
	*/
