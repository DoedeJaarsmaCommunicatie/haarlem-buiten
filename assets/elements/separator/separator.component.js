import { html } from 'hybrids';

export default  {
	spaceTop: false,
	spaceBottom: false,
	render: ({ spaceTop, spaceBottom }) => html`
<hr class="${{'space-bottom': spaceBottom, 'space-top': spaceTop}}" >
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
	
	@media screen and (max-width: 768px) {
		hr {
			margin-left: 1rem;
			margin-right: 1rem;
		}
	}
</style>
`
}
