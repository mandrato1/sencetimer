<?php

class block_sencetimer extends block_base {
	public function init() {
		$this->title = get_string('sencetimer', 'block_sencetimer');
	}
	
	public function get_content() {
	    global $DB, $USER;
	    
	    $record = $DB->get_record_sql("SELECT MAX(id) AS maxid, estadoactividad FROM {uaio_sence_notifications} WHERE userid = ?", array($USER->id));
	    
	    if ($record->estadoactividad == 2) {
	        $elapsedtime = 0;
	    } else {
    	    $id = $record->maxid;
    	    
    	    $notificationrecord = $DB->get_record('uaio_sence_notifications', array('id' => $id));
    	    $timelogin = $notificationrecord->timecreated;
    	    $elapsedtime = time() - $timelogin;
	    }
	    
		$html = "<link rel='stylesheet' type='text/css' href='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/timeTo.css'>

				<script src='https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js'></script>
				
				<script src='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/jquery.timeTo.js'></script>  
				
				<script src='http://www.jqueryscript.net/demo/jQuery-Countdown-Timer-Digital-Clock-Plugin-timeTo/jquery.timeTo.min.js'></script>
				
				<script>
					$(document).ready(function(){
					    $('#timerdiv').timeTo({
					        seconds: $elapsedtime,
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