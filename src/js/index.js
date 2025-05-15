import Gifa11y from 'gifa11y';
import { isAnimatedGif } from './isAnimatedGif';

( function() {
	const options = {
		...window?.edapag?.options,
	};

	const gifs = Array.from( document.querySelectorAll( 'img[src$=".gif"]' ) );
	const animatedGifs = [];

	Promise.all(
		gifs.map( async ( img ) => {
			if ( await isAnimatedGif( img.src ) ) {
				animatedGifs.push( img );
			} else {
				img.classList.add( 'gifa11y-ignore' );
			}
		} )
	).then( () => {
		if ( animatedGifs.length > 0 ) {
			window.gifa11y = new Gifa11y(	options );
		}
	} );

	// If there are no gifa11y-button elements on the page by this point then try
	// to find new gifs as they may have been added or completed load after init.
	addEventListener( 'DOMContentLoaded', () => {
		if ( document.querySelectorAll( 'gifa11y-button' ).length === 0 ) {
			if ( ! window.gifa11y ) {
				window.gifa11y = new Gifa11y( options );
			}
			window.gifa11y.findNew();
		}
	} );
}() );
