// Utility to check if a GIF is animated using gifuct-js
import { parseGIF, decompressFrames } from 'gifuct-js';

export async function isAnimatedGif( imgUrl ) {
	try {
		const response = await fetch( imgUrl );
		if (!response.ok) {
			console.warn(`Failed to fetch GIF: ${response.status} ${response.statusText}`);
			return false;
		}
		const arrayBuffer = await response.arrayBuffer();
		const gif = parseGIF( arrayBuffer );
		const frames = decompressFrames( gif, true );
		return frames.length > 1;
	} catch (error) {
		console.warn(`Error checking if GIF is animated: ${error.message}`);
		return false;
	}
}

