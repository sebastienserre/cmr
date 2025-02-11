<?php
$Plugin_Name="Cmap departements France";
$Plugin_URI="https://comersis.com";
$Description="C-map";
$Version="5.1";
$Author="Stefan M.";
global $wpdb;
$table_dpt = $wpdb->prefix.'frdptsvg';
$table_map = $wpdb->prefix.'frdptset';
$mapfill = "#FF0000";		// Default fill color of each shape
$mapoff = "#CCCCCC";		// Default fill color of desactivated shape
$maphover_fill = "#CC00CC";	// Mouse over fill color
$mapstroke = "#FFFFFF";		// Color of stroke outlines
$mapstroke_width = 1.2;		// Stroke outlines thickness
$mapWidth = "450";			// Map display width
$resultat2 = $wpdb->get_row("SELECT * FROM $table_map" ) ;
$mapfill =  $resultat2->mapfill;
$mapoff = $resultat2->mapoff;
$maphover_fill = $resultat2->maphover_fill;
$mapstroke = $resultat2->mapstroke;
$mapstroke_width = $resultat2->mapstroke_width;
$mapWidth = $resultat2->mapWidth;
$aff_dom = $resultat2->aff_dom;
$aff_reg = $resultat2->aff_reg;
/////////////////////////////////////////////////////////////////////
echo "<style>path.act { transition: .6s fill; } path.act:hover { fill: $maphover_fill; }</style>";
echo "<?xml version=\"1.0\" standalone=\"no\"?><!DOCTYPE svg PUBLIC \"-//W3C//DTD SVG 1.1//EN\" \"http://www.w3.org/Graphics/SVG/1.1/DTD/svg11.dtd\">
<svg xmlns=\"http://www.w3.org/2000/svg\" xmlns:xlink=\"http://www.w3.org/1999/xlink\" viewBox = \"0 0 300 340\" version = \"1.1\">";
echo "<g><a xlink:href=\"$Plugin_URI\"><text x='280' y='320' style='fill:#fff;stroke:none;font-size:5px;'>$Description</text></a></g>";
echo "<g stroke=\"$mapstroke\" stroke-linejoin=\"round\" stroke-width=\"$mapstroke_width\">";
//$resultats = $wpdb->get_results($wpdb->prepare( "SELECT * FROM $table_dpt" ));
if($aff_dom=='false'){
$resultats = $wpdb->get_results("SELECT * FROM $table_dpt ORDER BY dpt ASC LIMIT 0,96");
}else{
$resultats = $wpdb->get_results("SELECT * FROM $table_dpt");
}
foreach ($resultats as $post) {
if($post->url!=""){
echo "<a xlink:href=\"$post->url\" target=\"$post->target\" title=\"$post->ndpt\" rel=\"tooltip\" >";
echo "<path class='act' fill=\"$post->color\" id=\"$post->dpt\"  d=\"$post->path\" />";
echo "</a>";
}else{
echo "<path fill=\"$mapoff\" id=\"$post->dpt\"  d=\"$post->path\" />";
}
}
echo "</g>";
if($aff_reg=='true'){
include( plugin_dir_path( __FILE__ ) . 'regs.php');
}
echo "</svg>";
wp_enqueue_script('maptip', plugins_url( 'js/maptip.js' , __FILE__ ));
wp_enqueue_style('cmap_style', plugins_url( 'css/cmap_style.css' , __FILE__ ));
wp_enqueue_script('jquery');
?>