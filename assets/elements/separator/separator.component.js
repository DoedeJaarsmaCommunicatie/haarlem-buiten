import {
	html,
	property
} from 'hybrids';

export default  {
	spaceTop: property(false),
	spaceBottom: property(false),
	render: ({ spaceTop, spaceBottom }) => html`
<hr class="${spaceBottom? 'space-bottom' : ''}${spaceTop ? 'space-top' : ''}">
<style>
hr {
	border: none;
	border-top: 7px solid #f4f4f4;
	margin: 0;
	display: block;
	box-sizing: content-box;
	height: 0;
	overflow: visible;
}

hr.space-top {
	margin-top: 1.5rem;
}

hr.space-bottom {
	margin-bottom: 1.5rem;
}
</style>
`
}
