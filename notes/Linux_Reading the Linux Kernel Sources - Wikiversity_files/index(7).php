/**
 * Initialization script for Dialectiki
 * Documentation at https://commons.wikimedia.org/wiki/Help:Dialectiki
 */

// Only load on debate pages
var nodes = $( '.dialectiki-node' );
if ( nodes.length > 0 ) {

	// Only load when viewing or previewing
	var action = mw.config.get( 'wgAction' );
	if ( action === 'view' || action === 'submit' ) {

		// Load directly from Commons
		mw.loader.load( '//commons.wikimedia.org/w/index.php?title=MediaWiki:Dialectiki.js&action=raw&ctype=text/javascript' );
		mw.loader.load( '//commons.wikimedia.org/w/index.php?title=MediaWiki:Dialectiki.css&action=raw&ctype=text/css', 'text/css' );
	}
}