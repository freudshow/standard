// Adds Purge option to the "More" menu.

mw.util.addPortletLink(
	'p-cactions',
    mw.util.getUrl( null, { action: 'purge' } ),
    mw.config.get( 'skin' ) === 'vector' ? 'Purge' : '*',
    'ca-purge',
    'Purge the server cache of this page',
    '*'
);