<?php

class Template {

	var $page;

    function template($template, $data) {
        if (file_exists($template)) {
			extract($data); 
			ob_start();
			include($template);
			$contents = ob_get_contents();
			ob_end_clean();
			$this->page = $contents;
            //$this->page = file_get_contents($template);		
        } else {
            return false;
        }			
    }

    function parse($file) {
        ob_start();
        include($file);
        $buffer = ob_get_contents();
        ob_end_clean();
        return $buffer;
    }

    function replaceTags($tags = array()) {
        if (sizeof($tags) > 0) {
            foreach ($tags as $tag => $data) {
                $data = (file_exists($data)) ? $this->parse($data) : $data;
                $this->page = preg_replace('{' . $tag . '}', $data, $this->page);
            }
        } else {
            return false;
        }
    }

    function output() {
        return $this->page;
    }

} // end of template class

?> 
