import React from 'react';
import ReactDOM from 'react-dom';

import './frontend.scss';
import { Block } from './block';

// Renders the Block on the frontend.
const OrderLookupBlock = () => {
	return (
		<div className="yums-order-lookup">
			<Block />
		</div>
	);
};

// Find all elements with class .yums-order-lookup and render the OrderLookupBlock component.
document.addEventListener('DOMContentLoaded', () => {
	const containers = document.querySelectorAll(
		'.yums-order-lookup-container'
	);
	containers.forEach((container) => {
		ReactDOM.render(<OrderLookupBlock />, container);
	});
});
