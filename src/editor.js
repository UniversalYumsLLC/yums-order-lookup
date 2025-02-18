import { registerBlockType } from '@wordpress/blocks';

/**
 * Internal dependencies
 */
import './editor.scss';
import { Block } from './block';

// Renders the Block in the editor.
const Edit = () => {
	return (
		<div className="yums-order-lookup">
			<Block />
		</div>
	);
};

// Markup to save and output on the frontend.
const Save = () => {
	return (
		<div className="yums-order-lookup-container">
			{/* Placeholder for React component */}
		</div>
	);
};

// Registers the edit and save functions with the block.
registerBlockType('yums/yums-order-lookup', {
	edit: Edit,
	save: Save,
});
