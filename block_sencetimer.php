<?php

class block_sencetimer extends block_base {
	public function init() {
		$this->title = get_string('sencetimer', 'block_sencetimer');
	}
	
	public function get_content() {
		$html = "<link rel='stylesheet' type='text/css' href='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/timeTo.css'>

				<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
				
				<script src='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/jquery.timeTo.js'></script>  
				
				<script src='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/jquery.timeTo.min.js'></script>
				
				<script>
					$(document).ready(function(){
					    $('#timerdiv').timeTo({
					        seconds: 1,
					        displayHours: false,
					        callback: function () {
					
					        },
							countdown: false
						});
					});
				</script>
				
				<div id='timerdiv'></div>";
		
		$this->content = new stdClass();
		$this->content->text = $html;
		
		return $this->content;
	}
}