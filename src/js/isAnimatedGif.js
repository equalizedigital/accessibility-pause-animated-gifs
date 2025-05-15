// Utility to check if a GIF is animated using gifuct-js
import { parseGIF, decompressFrames } from 'gifuct-js';

export async function isAnimatedGif( imgUrl ) {
	const response = await fetch( imgUrl );
	const arrayBuffer = await response.arrayBuffer();
	const gif = parseGIF( arrayBuffer );
	const frames = decompressFrames( gif, true );
	return frames.length > 1;
}

