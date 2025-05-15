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
}() );
