<?php
	function arrayToCsv($array, $filename = '')
	{
		 if ($filename != '')
        {    
            header('Content-Type: application/csv');
            header('Content-Disposition: attachement; filename="' . $filename . '"');
        }
        ob_start();
        $f = fopen('php://output', 'w') or show_error("Can't open php://output");
        $n = 0;        
        foreach ($array as $line)
        {
            $n++;
            if (!fputcsv($f, $line))
            {
                show_error("Can't write line $n: $line");
            }
        }
        fclose($f) or show_error("Can't close php://output");
        $str = ob_get_contents();
        ob_end_clean();
        if ($filename == '')
        {
            return $str;    
        }
        else
        {    
            echo $str;
        }        
	}
  /*
  * @param  $query    Object. Data result set from a query.
  * @param  $headers  ??
  * @param  $filename Desired filename of the exported file.
  */
	function downloadAsCsv($query, $headers = true, $filename = '')
	{
		$CI = get_instance();
		$CI->load->helper('inflector');
		//
		$array = array();
        if ($headers)
        {
            $line = array();
            foreach ($query->list_fields() as $name)
            {
                $line[] = humanize($name);
            }
            $array[] = $line;
        }
        foreach ($query->result_array() as $row)
        {
            $line = array();
            foreach ($row as $item)
            {
                $line[] = $item;
            }
            $array[] = $line;
        }
        echo arrayToCsv($array, $filename);
	}