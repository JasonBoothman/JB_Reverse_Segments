<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/*
====================================================================================================
 Author: Jason Boothman
 https://github.com/jdboothman/JB_Reverse_Segments
====================================================================================================
 Purpose: Access url segments in reverse order (from right to left)
----------------------------------------------------------------------------------------------------
 Install: Copy the 'jb_reverse_segments' folder to the
 			system/expressionengine/third_party/ce_img folder in your ExpressionEngine installation
 ----------------------------------------------------------------------------------------------------
 Brief Instructions: Use the variables {reverse_segment_1}, {reverse_segment_2}, etc.
 						Segments count right to left instead of EE's default left to right.
====================================================================================================
*/
 
class Jb_reverse_segments_ext {
	
	//Required Variables
	var $settings = array();

	public $name = 'JB Reverse Segments';
	public $version = '1.0';
	public $description = 'Description';
	public $settings_exist = 'n';
	public $docs_url = 'https://github.com/jdboothman/JB_Reverse_Segments';
	
	
	/**
	 * Activate Extension
	 *
	 * This function enters the extension into the exp_extensions table
	 *
	 * @return void
	 */
	public function activate_extension()
	{
		$data = array(
	        'class'     => __CLASS__,
	        'method'    => 'template_fetch_template',
	        'hook'      => 'template_fetch_template',
	        'settings'  => '',
	        'priority'  => 10,
	        'version'   => $this->version,
	        'enabled'   => 'y'
	    );
		
		ee()->db->insert('extensions', $data);
	}
	
	/**
	 * Update Extension
	 *
	 * This function performs any necessary db updates when the extension
	 * page is visited
	 *
	 * @return  mixed   void on update / false if none
	 */
	function update_extension($current = '')
	{
	    if ($current == '' OR $current == $this->version)
	    {
	        return FALSE;
	    }
	
	    if ($current < '1.0')
	    {
	        // Update to version 1.0
	    }
	
	    ee()->db->where('class', __CLASS__);
	    ee()->db->update(
	                'extensions',
	                array('version' => $this->version)
	    );
	}
	
	/**
	 * Disable Extension
	 *
	 * This method removes information from the exp_extensions table
	 *
	 * @return void
	 */
	public function disable_extension()
	{
		ee()->db->where('class', __CLASS__);
		ee()->db->delete('extensions');
	}
	
	public function template_fetch_template()
	{
		$data = array();
	
		//Get segment data.
		$segments = ee()->uri->segments;
		
		//Reverse the data.
		$reversed = array_reverse($segments);
		
		//Loop through segments and set the reverse segments.
		foreach ($reversed as $num => $seg) {
			$data['reverse_segment_' . ($num + 1)] = $seg;
		}
		
		//Add to the global variables.
		ee()->config->_global_vars = ee()->config->_global_vars + $data;
	}
}
