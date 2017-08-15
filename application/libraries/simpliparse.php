<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');
Class Simpliparse
{
	function Simpliparse()
	{
		$this->SP =& get_instance();
		$this->SP->load->library(array('loader','validation'));
		$this->SP->load->library(array('pagination','ajaxpagination'));
	}
	function getPagination($total_page,$per_page,$url,$uri=3)
	{
		$config['base_url'] = base_url().'index.php/'.$url;
		$config['full_tag_open'] = '<div class=paging>';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class=pag_link_cur>';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class=pag_link>';
		$config['num_tag_close'] = '</span>';
		$config['uri_segment'] = $uri;
		$config['next_link'] = 'next &rsaquo';
		$config['prev_link'] = '&lsaquo; prev';
		$config['num_links'] = 3;
		$config['total_rows'] = $total_page;
		$config['per_page'] = $per_page;	
		$this->SP->pagination->initialize($config);
		$data['paging']=$this->SP->pagination->create_links();
		return $data;
	}
	function getAjaxPagination($total_page,$per_page,$url,$uri=3,$update)
	{
		$config['base_url'] = $url;
		$config['full_tag_open'] = '<div class=paging>';
		$config['full_tag_close'] = '</div>';
		$config['cur_tag_open'] = '<span class=pag_link_cur>';
		$config['cur_tag_close'] = '</span>';
		$config['num_tag_open'] = '<span class=pag_link>';
		$config['num_tag_close'] = '</span>';
		$config['uri_segment'] = $uri;
		$config['next_link'] = 'next &raquo';
		$config['prev_link'] = '&laquo prev';
		$config['num_links'] = 3;
		$config['total_rows'] = $total_page;
		$config['per_page'] = $per_page;	
		$config['update'] = $update;	
		$this->SP->ajaxpagination->initialize($config);
		$data['paging']=$this->SP->ajaxpagination->create_links();
		return $data;
	}
	function highlight($string)
	{
		$string = trim($string);
		$string = str_replace(array("#"),array(" "),$string);
		$string = str_replace(array("[code]","[/code]","<code>","</code>"),array("#","#","#","#"),$string);
		$first = substr($string,0,1);
		if($first=='#'){ $i=2;}else{ $i=3;}
		$exploded = explode("#",$string);
		foreach($exploded as $row)
		{
			if($row !='')
			{
				if($i % 2 != 0)
				{
					echo $row.'<br />';
				}else{
					echo highlight_code($row).'<br />';
				}
			}else{
				$i = $i - 1;
			}
		$i++;	
		}
	}
	function smiley()
	{
		$this->SP->load->helper('smiley');
		$this->SP->load->library('table');
		
		$image_array = get_clickable_smileys(base_url().'asset/images/smileys/');

		$col_array = $this->SP->table->make_columns($image_array, 5);		
			
		$data['smiley_table'] = $this->SP->table->generate($col_array);
		
		return $data['smiley_table'];
	}
	function build_select_day($name)
	{
		$result='';
		for($i=1;$i<=31;$i++)
		{
			$lebar=strlen($i);
			switch($lebar)
			{
			case 1:
			{
				$day="0".$i;
				break;
			}
			case 2:
			{
				$day=$i;
				break;
			}
			}
			$opt='<option value=\''.$day.'\' '
			.$this->SP->validation->set_select($name,$day).'>'.$day.'</option>';
			$result=$result.$opt;
		}
		echo '<select name=\''.$name.'\' class="day_select"><option value=\'00\'>::Tgl::</option>'
			.$result.
			'</select>';
	}
	function build_select_month($name,$tamb='')
	{	
		$result='';
		$namabulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
				"September","Oktober","November","Desember");
		for($j=1;$j<=12;$j++)
		{
			$lebar=strlen($j);
			switch($lebar)
			{
			case 1:
			{
				$mon="0".$j;
				break;
			}
			case 2:
			{
				$mon=$j;
				break;
			}
			}
			$opt='<option value=\''.$mon.'\' '
			.$this->SP->validation->set_select($name,$mon).'>'.$namabulan[$j].'</option>';
			$result=$result.$opt;
		}
		echo '<select name=\''.$name.'\' class="month_select"  '.$tamb.' ><option value=\'00\'>:: Bulan ::</option>'
			.$result.
			'</select>';
	} 
	function build_select_year($name)
	{
		$result='';
		for($k=1930;$k<=date("Y");$k++)
		{			   
			$opt='<option value=\''.$k.'\' '
			.$this->SP->validation->set_select($name,$k).'>'.$k.'</option>';
			$result=$result.$opt;
		}	  
		echo '<select name=\''.$name.'\' class="year_select"><option value=\'00\'>:: Tahun ::</option>'
			.$result.
			'</select>';
	}
	function build_select_common($name,$data,$value,$mid,$title,$tamb='',$delimiter=' - ')
	{
		$result='';
		if(is_array($mid))
		{
			foreach($data->result() as $row)
			{	
			    $str = array();
			    foreach($mid as $val)
    		    {
    		      if($row->$val != '')
    		          $str[] = $row->$val;
    		    }
    		    $str_jadi = implode($delimiter,$str);
    			$opt='<option value=\''.$row->$value.'\' '.$this->SP->validation->set_select($name,$row->$value).' >'.$str_jadi.'</option>';
    			$result = $result.$opt;
			}
		}else{
			foreach($data->result() as $row)
			{	
				$opt='<option value=\''.$row->$value.'\' '.$this->SP->validation->set_select($name,$row->$value).'>'.$row->$mid.'</option>';
				$result=$result.$opt;
			}
		}
		return '<select name=\''.$name.'\' '.$tamb.' ><option value=\'\'>'.$title.'</option>'
			.$result.
			'</select>';
	}	
	function build_select_common_array($name,$data,$value,$mid,$title,$id)
	{
		$result='';
		$pm=$mid[0];
		$pm2=$mid[1];
		//$v1=$value[0];
		//s$v2=$value[1];
		foreach($data->result() as $row)
		{	
			$opt='<option value=\''.$row->$value.'\'>'.$row->$pm.' '.$row->$pm2.'</option>';
			$result=$result.$opt;
		}
		echo '<select id=\''.$id.'\' name=\''.$name.'\' ><option value=\'\'>'.$title.'</option>'
			.$result.
			'</select>';
	}	
	function build_select_day_edit($name,$key)
	{
		$result='';
		for($i=1;$i<=31;$i++)
		{
			$lebar=strlen($i);
			switch($lebar)
			{
			case 1:
			{
				$day="0".$i;
				break;
			}
			case 2:
			{
				$day=$i;
				break;
			}
			}
			if($day==$key){ $check='selected';}else{ $check='';}
			$opt='<option value=\''.$day.'\' '
			.$check.'>'.$day.'</option>';
			$result=$result.$opt;
		}
		echo '<select name=\''.$name.'\' class="day_select"><option value=\'00\'>::Tgl::</option>'
			.$result.
			'</select>';
	}
	function build_select_month_edit($name,$key,$tamb='')
	{	
		$result='';
		$namabulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
				"September","Oktober","November","Desember");
		for($j=1;$j<=12;$j++)
		{
			$lebar=strlen($j);
			switch($lebar)
			{
			case 1:
			{
				$mon="0".$j;
				break;
			}
			case 2:
			{
				$mon=$j;
				break;
			}
			}
			if($mon==$key){ $check='selected';}else{ $check='';}
			$opt='<option value=\''.$mon.'\' ' 
			.$check.'  >'.$namabulan[$j].'</option>';
			$result=$result.$opt;
		}
		echo '<select name=\''.$name.'\' class="month_select" '.$tamb.' ><option value=\'00\'>:: Bulan ::</option>'
			.$result.
			'</select>';
	}
	function build_select_month_edit2($name,$key,$tamb='')
	{	
		$result='';
		$namabulan=array(1=>"Januari","Februari","Maret","April","Mei","Juni","Juli","Agustus",
				"September","Oktober","November","Desember");
		for($j=1;$j<=12;$j++)
		{
			$mon = $j;
			if($mon==$key){ $check='selected';}else{ $check='';}
			$opt='<option value=\''.$mon.'\' ' 
			.$check.'  >'.$namabulan[$j].'</option>';
			$result=$result.$opt;
		}
		echo '<select name=\''.$name.'\' class="month_select" '.$tamb.' ><option value=\'00\'>:: Bulan ::</option>'
			.$result.
			'</select>';
	} 
	function build_select_year_edit($name,$key,$tamb='')
	{
		$result='';
		for($k=1930;$k<=date("Y");$k++)
		{			   
			if($k==$key){ $check='selected';}else{ $check='';}
			$opt='<option value=\''.$k.'\' '
			.$check.'>'.$k.'</option>';
			$result=$result.$opt;
		}	  
		echo '<select name=\''.$name.'\' class="year_select" '.$tamb.' ><option value=\'00\'>:: Tahun ::</option>'
			.$result.
			'</select>';
	}
	function build_select_common_edit($name,$data,$value,$mid,$title,$key,$tamb='')
	{
		$result='';
		if(is_array($mid))
		{
			foreach($data->result() as $row)
			{	
			    if($row->$value==$key){ $check='selected';}else{ $check='';}
			    $str = array();
			    foreach($mid as $val)
    		    {
    		      if($row->$val != '')
    		          $str[] = $row->$val;
    		    }
    		    $str_jadi = implode(' - ',$str);
    			$opt='<option value=\''.$row->$value.'\' '.$this->SP->validation->set_select($name,$row->$value).' '
				.$check.' >'.$str_jadi.'</option>';
    			$result = $result.$opt;
			}
		}else{
			foreach($data->result() as $row)
			{	
				if($row->$value==$key){ $check='selected';}else{ $check='';}
				$opt='<option value=\''.$row->$value.'\' '
				.$check.'>'.$row->$mid.'</option>';
				$result=$result.$opt;
			}
		}
		return  '<select name=\''.$name.'\'  '.$tamb.'><option value=\'\'>'.$title.'</option>'
			.$result.
			'</select>';
	}
}
