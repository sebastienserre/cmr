<?php
global $wpdb;
$table_dpt = $wpdb->prefix.'frdptsvg';
$table_map = $wpdb->prefix.'frdptset';
echo "<div class=wrap>";
echo "<div class='icon32' id='icon-edit'><br /></div>
    <h2>";
	_e('Department settings', 'fr_dpt_wp');
echo "</h2>";	
echo "<table class=\"form-table\">
			<tbody><tr>
			<th scope='row'><label for='departements'>";_e('Edit a department', 'fr_dpt_wp'); echo "</label></th>
			<td>";	
echo "<select name='departements' onchange=\"document.location.href='".admin_url('/options-general.php?page=frdpt', __FILE__)."'+this.options[this.selectedIndex].value;\">";
					echo "<option value=''>Select a department</option>";
					$resultats = $wpdb->get_results("SELECT * FROM $table_dpt") ;
					foreach ($resultats as $post) {
					echo "<option value='&dpt=$post->dpt'"; if(isset($_GET['dpt']) && $_GET['dpt']==$post->dpt){ echo " SELECTED"; } echo ">$post->ndpt</option>";
					}
					echo "</select></td></tr></table><p class=\"description\">"; _e('To edit a department\'s settings, select it from the drop-down menu above.', 'fr_dpt_wp'); echo "</p><hr>";
	
	
	
if(isset($_POST['update_map'])){
extract($_POST);
$maj = $wpdb->query( "UPDATE $table_dpt SET color = '#$xcolor', url = '$xurl', target = '$xtarget' WHERE dpt='$xdpt'" );
if($maj>0) {
echo "<div class='updated notice'><p>$xndpt has been successfully updated !</p></div>";
}else{
echo "<div class='error notice'><p>There has been an error.</p></div>";
}
}
	
	
	
if(isset($_GET['dpt']) && $_GET['dpt']!="")
{
//dpt 	ndpt 	color 	url 	target 	path 
$resultat = $wpdb->get_row("SELECT * FROM $table_dpt WHERE dpt = ".$_GET['dpt']."" ) ;
$dpt =  $resultat->dpt;
$ndpt = $resultat->ndpt;
$color = $resultat->color;
$url = $resultat->url;
$target = $resultat->target;
	echo "<form method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\">";
	echo "<div class='postbox ' id='postexcerpt'><h3>";
	_e('Edit this department', 'fr_dpt_wp');
	echo "</h3>
            <div class='inside'>
			<table class=\"form-table\">
			<tbody><tr>
			<th scope='row'><label for='xndpt'>";_e('Department name', 'fr_dpt_wp'); echo "</label></th>
			<td><input name='xndpt' id='xndpt' value=\"$ndpt\" class=\"regular-text\" type=\"text\"></td>
			</tr>
			<tr>
			<th scope='row'><label for='xcolor'>";_e('Department color', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xcolor' id='xcolor' class='color' value='$color'></td>
			</tr>
			<tr>
			<th scope='row'><label for='xurl'>";_e('Department link', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xurl' id='xurl' value=\"$url\">
			<p class=\"description\">";_e('To disable this department on your map, leave this field blank', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr>
			<th scope='row'><label for='xtarget'>";_e('Link target', 'fr_dpt_wp'); echo "</label></th>
			<td><select name='xtarget' id='xtarget'>
				<option value='_self'"; if($target=="_self"){ echo " SELECTED"; } echo ">_self</option>
				<option value='_blank'"; if($target=="_blank"){ echo " SELECTED"; } echo ">_blank</option>
				<option value='_parent'"; if($target=="_parent"){ echo " SELECTED"; } echo ">_parent</option>
				<option value='_top'"; if($target=="_top"){ echo " SELECTED"; } echo ">_top</option>
				</select>
				<p class=\"description\">";_e('_self: same window | _blank: new window', 'fr_dpt_wp'); echo "</p>
				</td>
			</tr>";
                    
                    
        echo "<tr><td>
		<input type='hidden' name='xdpt' value='$dpt'>
		</td><td><input type='submit' name='update_map' value='"; _e('Update', 'fr_dpt_wp'); echo "' class='button button-primary' /></td></tr></table>
		</div></form>";
	
	
	
	
	
echo "</div>";

  
}
echo "<div class=wrap>";
echo "<div class='icon32' id='icon-edit'><br /></div>
    <h2>";
	_e('Map settings', 'fr_dpt_wp');
echo "</h2>";

if(isset($_POST['update_map_set'])){
extract($_POST);
$maj2 = $wpdb->query( "UPDATE $table_map SET mapoff = '#$xmapoff', maphover_fill = '#$xmaphover_fill', mapstroke = '#$xmapstroke', mapstroke_width = '$xmapstroke_width', aff_dom = '$xaff_dom', aff_reg = '$xaff_reg' WHERE idp='$xidp'" );
if($maj2>0) {
echo "<div class='updated notice'><p>Map parameters has been successfully updated !</p></div>";
}else{
echo "<div class='error notice'><p>There has been an error.</p></div>";
}
}
if(isset($_POST['update_map_color'])){
extract($_POST);
$maj3 = $wpdb->query( "UPDATE $table_dpt SET color = '#$xmapfill'" );
$maj4 = $wpdb->query( "UPDATE $table_map SET mapfill = '#$xmapfill' WHERE idp='$xidp'" );
if($maj3>0) {
echo "<div class='updated notice'><p>Map parameters has been successfully updated !</p></div>";
}else{
echo "<div class='error notice'><p>There has been an error.</p></div>";
}
}



//idp 	mapfill 	mapoff 	maphover_fill 	mapstroke 	mapstroke_width 	mapOriginWidth 	mapOriginHeight 	mapWidth 	mapHeight 	aff_dom 	
$resultat2 = $wpdb->get_row("SELECT * FROM $table_map" ) ;
$mapfill =  $resultat2->mapfill;
$mapoff = $resultat2->mapoff;
$maphover_fill = $resultat2->maphover_fill;
$mapstroke = $resultat2->mapstroke;
$mapstroke_width = $resultat2->mapstroke_width;
$mapWidth = $resultat2->mapWidth;
$aff_dom = $resultat2->aff_dom;
$aff_reg = $resultat2->aff_reg;
	
	echo "<div class='postbox ' id='postexcerpt'><h3>";
	_e('Edit the map', 'Cmap_plugin');
	echo "</h3>";
            
			
			echo "<div class='inside'><form method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\"><table class=\"form-table\">";
			echo "<tr>
			<th scope='row'><label for='xmaphover_fill'>";_e('Rollover color', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xmaphover_fill' id='xmaphover_fill' class='color' value='$maphover_fill'>
			<p class=\"description\">";_e('Color of the departments at the mouse hover.', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr>
			<tr>
			<th scope='row'><label for='xmapoff'>";_e('Disabled color', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xmapoff' id='xmapoff' class='color' value='$mapoff'>
			<p class=\"description\">";_e('Color of disabled departments (to disable a department, leave its \'URL\' field blank, it will be considered as inactive.', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr>
			<tr>
			<th scope='row'><label for='xmapstroke'>";_e('Map stroke color', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xmapstroke' id='xmapstroke' class='color' value='$mapstroke'>
			<p class=\"description\">";_e('Departments outlines color.', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr>
			<tr>
			<th scope='row'><label for='xmapstroke_width'>";_e('Stroke width', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xmapstroke_width' id='xmapstroke_width' value=\"$mapstroke_width\">
			<p class=\"description\">";_e('Thickness of departments outlines, ex.: 0.6, 1.22, 4 ...', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr>
			<th scope='row'><label for='xaff_dom'>";_e('Display D.O.M.', 'fr_dpt_wp'); echo "</label></th>
			<td><select name='xaff_dom' id='xaff_dom'>
				<option value='true'"; if($aff_dom=="true"){ echo " SELECTED"; } echo ">Yes</option>
				<option value='false'"; if($aff_dom=="false"){ echo " SELECTED"; } echo ">No</option>
				</select></td>
			</tr>
			<th scope='row'><label for='xaff_reg'>";_e('Display regions outlines', 'fr_dpt_wp'); echo "</label></th>
			<td><select name='xaff_reg' id='xaff_reg'>
				<option value='true'"; if($aff_reg=="true"){ echo " SELECTED"; } echo ">Yes</option>
				<option value='false'"; if($aff_reg=="false"){ echo " SELECTED"; } echo ">No</option>
				</select></td>
			</tr>";
                    
                    
        echo "<tr><td>
		<input type='hidden' name='xidp' value='1'>
		</td><td><input type='submit' name='update_map_set' value='"; _e('Update', 'fr_dpt_wp'); echo "' class='button button-primary' /></td></tr></table>
		</form></div><hr>";
		
		echo "<div class='inside'><form method=\"post\" action=\"".$_SERVER['REQUEST_URI']."\">";
			echo "<table class=\"form-table\">
			<tbody>
			<tr>
			<th scope='row'><label for='xmapfill'>";_e('Reset color', 'fr_dpt_wp'); echo "</label></th>
			<td><input type='text' name='xmapfill' id='xmapfill' class='color' value='$mapfill'>
			<p class=\"description\">";_e('Set the background color of the entire map by default. <br> Be careful, the colors previously saved by department will be overwritten!', 'fr_dpt_wp'); echo "</p>
			</td>
			</tr><tr><td>
		<input type='hidden' name='xidp' value='1'>
		</td><td><input type='submit' name='update_map_color' value='"; _e('Reset color', 'fr_dpt_wp'); echo "' class='button button-primary' /></td></tr>
		</table></form></div><hr>";

echo "</div>";
echo "<div class=wrap>";
echo "<div class='icon32' id='icon-edit'><br /></div>
    <h2>";
	_e('Integration / Support', 'fr_dpt_wp');
echo "</h2>";
echo "<h3>Shortcode</h3><p>";_e('Use <strong>[frdpt]</strong> shortcode  in your pages or articles to display your map.', 'fr_dpt_wp'); echo "</p>";
echo "<h3>Support</h3><p><a href=\"https://blog.comersis.com/articles/wordpress/\" target='_blank'>"; _e('Comersis Wordpress maps User Manual', 'fr_dpt_wp'); echo "</a></p>";
echo "</div>";
wp_enqueue_script('my-map', plugins_url('js/jscolor.js', __FILE__));
?>