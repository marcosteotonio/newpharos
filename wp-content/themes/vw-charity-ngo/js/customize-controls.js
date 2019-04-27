( function( api ) {

	// Extends our custom "vw-charity-ngo" section.
	api.sectionConstructor['vw-charity-ngo'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );