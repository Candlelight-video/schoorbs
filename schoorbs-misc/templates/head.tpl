<?xml version="1.0" encoding="UTF-8"?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.1//EN" "http://www.w3.org/TR/xhtml11/DTD/xhtml11.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="de">
<head>
    <title>{$mrbs_company|strip_tags} - Schoorbs</title>
    <link rel="stylesheet" type="text/css" href="schoorbs-misc/style/style.css" />
    <link rel="home" href="index.php" />

    <script type="text/javascript" src="schoorbs-misc/js/jquery.pack.js"></script>
    <script type="text/javascript" src="schoorbs-misc/js/schoorbs.js"></script>
    <!-- compliance patch for microsoft browsers -->
    <!--[if lt IE 7]>
    <script type="text/javascript">
        IE7_PNG_SUFFIX = ".png";
    </script>
    <script src="schoorbs-misc/js/ie7/ie7-standard-p.js" type="text/javascript"></script>
    <![endif]-->
</head>
<body>
	<div id="menu_logo">
		<span class="headerLink" style="color: #555;">{$mrbs_company}</span>
	</div>
	<div id="menu">
		{if $logonbox neq ""}
			<table style="float: right;">
	    	<tr>
	    		{$logonbox}
	    	</tr>
	    	</table>
    	{/if}

		<!-- // Report link deactivated due to deactivated report-page 
		<a class="menu_link" href="report.php"><img src="schoorbs-misc/gfx/report.png" class="menu_icon" alt="{get_vocab text="report}" />{get_vocab text="report}</a>
		-->
		
		<!-- Search deactivated due to deactivated search page -->
		<!--<form method="get" action="search.php">
        	<div id="menu_searchbox">
        		<a class="menu_link" style="font-size: 14px;" href="search.php?advanced=1">
        			<img src="schoorbs-misc/gfx/find.png" class="menu_icon" alt="{get_vocab text="search"}" />
        			{get_vocab text="search"}
        		</a>
           		<input type="text" name="search_str" value="{$search_str}" size="10" />
           		<input type="hidden" name="day" value="{$Day}" />
           		<input type="hidden" name="month" value="{$Month}" />
           		<input type="hidden" name="year" value="{$Year}" />
           		{$pview}
        	</div>
    	</form>-->
	</div>
	<div id="linkbar">
		<span id="poweredby" class="vcard"><a class="url" href="http://schoorbs.xhochy.com">Powered by <span class="fn org">Schoorbs</span></a></span>
		<a class="menu_link" href="admin.php">{get_vocab text="admin"}</a><a class="menu_link" href="help.php">{get_vocab text="help"}</a>
		<form action="day.php" method="get">
        	<div id="menu_selector">
        		{genDateSelector prefix=$prefix day=$Day month=$Month year=$Year}
	   			{if $Area neq ""}
	     			<input type="hidden" name="area" value="{$Area}" />
	   			{/if}
           		<script type="text/javascript">
           			ChangeOptionDays(''); // Note: The 2nd arg must match the first in the call to genDateSelector above.
           		</script>
           		<input class="gendateselector-submit" type="submit" value="{get_vocab text="viewday"}" />
           </div>
		</form>
	</div>
