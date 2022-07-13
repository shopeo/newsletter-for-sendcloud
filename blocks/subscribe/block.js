(function (blocks, editor, i18n, element, blockEditor) {
	let el = element.createElement;
	let __ = i18n.__;
	let RichText = editor.RichText;
	let useBlockProps = blockEditor.useBlockProps;

	blocks.registerBlockType('sendcloud-newsletter/subscribe', {
		apiVersion: 2,
		edit: function (props) {
			let content = props.attributes.content;

			function onChangeContent(value) {
				props.setAttributes({content: value});
			}

			return el(RichText, useBlockProps({
				tagName: 'p',
				className: props.className,
				onChange: onChangeContent,
				value: content
			}));
		},
		save: function (props) {
			return el(RichText.Content, useBlockProps.save({
				tagName: 'p',
				value: props.attributes.content
			}));
		}
	});
})(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.blockEditor
);
