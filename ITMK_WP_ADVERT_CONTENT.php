<?php 
    /*
        You can show different content depending on requester IP.
        Can modify this to go by URL if needed.  Requires edit to the initial script.
    */
	
	/* Base new output functions off of how the outputDefault function below is formatted */
    
    if($_SERVER['REMOTE_ADDR'] == "108.167.189.47") {
        outputDefault();
    } else {
        outputDefault();
    }
?>

<?php function outputDefault() { ?>
    <p>Put HTML content that you want displayed here.  This will show for anyone who has the plugin installed.</p>
<?php } ?>