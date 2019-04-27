( function( api ) {

	// Extends our custom "it-company" section.
	api.sectionConstructor['it-company'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );