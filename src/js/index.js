import Gifa11y from 'gifa11y';

( function() {
	const options = {
		...window?.edapag?.options,
	};

	window.gifa11y = new Gifa11y( options );
}() );
