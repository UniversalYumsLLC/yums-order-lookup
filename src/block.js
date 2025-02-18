import { useState } from '@wordpress/element';

/**
 * This Block will be rendered on the frontend and in the editor.
 *
 * It should include:
 *
 * - An input field to enter the email address.
 * - A button to submit the form.
 *
 * When the form is submitted, the Block should:
 *
 * - Fetch the order data from the server.
 * - Display the order data in a table.
 *
 * You should have basic error handling:
 *
 * - For example, if the email address is not found, display a message.
 */
export const Block = () => {
	// Action to take when the email is submitted.
	const handleSubmit = async (event) => {};

	// Markup to return for the Block.
	// Currently just returns a placeholder.
	return <div>Yums Order Lookup Block</div>;
};
