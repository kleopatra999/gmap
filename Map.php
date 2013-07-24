<?php
/*
$wgVisualEditorPluginModules[] = 'ext.ve-gmap';

$wgResourceModules['ext.ve-gmap'] = array(
	'scripts' => array(
		'js/test.js'
	),
	'localBasePath' => dirname( __FILE__ )
);
*/

// Hooks
$wgHooks['ParserFirstCallInit'][] = 'wfMapParserInit';

function wfMapParserInit( Parser $parser ) {
	$parser->setHook( 'gmap', 'wfMapRender' );
	return true;
}

// Render map
function wfMapRender( $input, array $args, Parser $parser, PPFrame $frame ) {
	$params = array();
	$params['markers'] = $args['lat'] . ',' . $args['long'];
	$params['size'] = $args['width'] . 'x' . $args['height'];
	$params['zoom'] = $args['zoom'];
	$params['maptype'] = 'roadmap';
	$params['sensor'] = 'false';
	return '<div style="float: left;"><img src="http://maps.googleapis.com/maps/api/staticmap?' . wfArrayToCgi( $params ) . '"/></div>';
}
