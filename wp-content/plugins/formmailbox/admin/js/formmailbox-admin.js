( function () {
	'use strict';

	function renumber( container ) {
		container.querySelectorAll( '.fmbx-field-row' ).forEach( function ( row, index ) {
			row.querySelectorAll( '[name]' ).forEach( function ( input ) {
				input.name = input.name.replace( /fields\[[^\]]+\]/, 'fields[' + index + ']' );
			} );
		} );
		var empty = document.querySelector( '.fmbx-empty-fields' );
		if ( empty ) { empty.hidden = Boolean( container.children.length ); }
	}

	document.addEventListener( 'click', function ( event ) {
		var container = document.getElementById( 'fmbx-fields' );
		if ( ! container ) { return; }
		if ( event.target.closest( '[data-fmbx-add-field]' ) ) {
			event.preventDefault();
			var template = document.getElementById( 'fmbx-field-template' );
			var index = parseInt( container.dataset.nextIndex || container.children.length, 10 );
			container.insertAdjacentHTML( 'beforeend', template.innerHTML.split( '__INDEX__' ).join( index ) );
			container.dataset.nextIndex = index + 1; renumber( container );
			container.lastElementChild.querySelector( 'input' ).focus();
		}
		var row = event.target.closest( '.fmbx-field-row' );
		if ( ! row ) { return; }
		if ( event.target.closest( '[data-fmbx-remove]' ) ) { event.preventDefault(); row.remove(); renumber( container ); }
		if ( event.target.closest( '[data-fmbx-up]' ) && row.previousElementSibling ) { event.preventDefault(); container.insertBefore( row, row.previousElementSibling ); renumber( container ); }
		if ( event.target.closest( '[data-fmbx-down]' ) && row.nextElementSibling ) { event.preventDefault(); container.insertBefore( row.nextElementSibling, row ); renumber( container ); }
	} );

	document.addEventListener( 'input', function ( event ) {
		if ( event.target.matches( '[data-fmbx-label]' ) ) {
			var title = event.target.closest( '.fmbx-field-row' ).querySelector( '[data-fmbx-field-title]' );
			title.textContent = event.target.value || 'New field';
		}
	} );

	document.addEventListener( 'click', function ( event ) {
		if ( event.target.closest( '.fmbx-confirm-delete' ) && ! window.confirm( 'Permanently delete this item? This cannot be undone.' ) ) { event.preventDefault(); }
	} );
}() );
