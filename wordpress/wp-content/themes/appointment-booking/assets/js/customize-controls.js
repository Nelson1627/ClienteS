( function( api ) {

	// Extends our custom "appointment-booking" section.
	api.sectionConstructor['appointment-booking'] = api.Section.extend( {

		// No events for this type of section.
		attachEvents: function () {},

		// Always make the section active.
		isContextuallyActive: function () {
			return true;
		}
	} );

} )( wp.customize );