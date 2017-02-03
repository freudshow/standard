$(document).ready( function($) {
	var username, project;

	if ( $.inArray( mw.config.get( 'wgNamespaceNumber' ), [ 2, 3 ] ) === -1 ) {
		return;
	}

	username = encodeURIComponent(wgTitle.split("/", 1)[0]);
	project = mw.config.get( 'wgContentLanguage' ) + '.' + mw.config.get( 'wgSiteName' ).toLowerCase() + '.org';

	/*
	Files needing licenses no longer functional.
	mw.util.addPortletLink
	(
		'p-tb',
		'http://toolserver.org/~daniel/WikiSense/UntaggedImages.php?wiki=' + project + '&img_user_text=' + username,
		'Files needing licenses',
		'ca-untagged'
	);
	*/
});