(function (blocks, element, blockEditor, components, i18n, serverSideRender) {
  'use strict';

  var el = element.createElement;
  var InspectorControls = blockEditor.InspectorControls;
  var PanelBody = components.PanelBody;
  var TextControl = components.TextControl;
  var SelectControl = components.SelectControl;
  var ToggleControl = components.ToggleControl;
  var __ = i18n.__;
  var ServerSideRender = serverSideRender.default || serverSideRender;

  function yesNo(value) {
    if (value === true || value === '1' || value === 1) {
      return '1';
    }
    if (value === false || value === '0' || value === 0) {
      return '0';
    }
    return '';
  }

  blocks.registerBlockType('post-lattice/grid', {
    title: __('Post Lattice Grid', 'post-lattice'),
    description: __('Filterable post, blog, or newsletter card grid.', 'post-lattice'),
    icon: 'grid-view',
    category: 'widgets',
    keywords: ['posts', 'grid', 'blog', 'newsletter'],
    attributes: {
      id: { type: 'string', default: '' },
      profile: { type: 'string', default: '' },
      post_types: { type: 'string', default: '' },
      filter: { type: 'string', default: '' },
      include_categories: { type: 'string', default: '' },
      exclude_categories: { type: 'string', default: '' },
      title: { type: 'string', default: '' },
      show_hero: { type: 'string', default: '' },
      show_cta: { type: 'string', default: '' },
      columns: { type: 'string', default: '' },
      card_badge: { type: 'string', default: '' }
    },
    edit: function (props) {
      var atts = props.attributes;
      var filterChoices = (window.pltBlock && window.pltBlock.filterTypes) ? window.pltBlock.filterTypes : [];

      return el(
        element.Fragment,
        {},
        el(
          InspectorControls,
          {},
          el(
            PanelBody,
            { title: __('Grid options', 'post-lattice'), initialOpen: true },
            el(SelectControl, {
              label: __('Filter pills', 'post-lattice'),
              value: atts.filter,
              options: filterChoices,
              onChange: function (value) {
                props.setAttributes({ filter: value });
              }
            }),
            el(TextControl, {
              label: __('Shortcode ID slug (optional)', 'post-lattice'),
              help: __('Use a saved shortcode slug like blog-index or newsletter-index.', 'post-lattice'),
              value: atts.id,
              onChange: function (value) {
                props.setAttributes({ id: value, profile: value });
              }
            }),
            el(TextControl, {
              label: __('Post types', 'post-lattice'),
              help: __('Comma-separated types, e.g. post,page (Pro)', 'post-lattice'),
              value: atts.post_types,
              onChange: function (value) {
                props.setAttributes({ post_types: value });
              }
            }),
            el(TextControl, {
              label: __('Only these categories', 'post-lattice'),
              help: __('Slugs or IDs, comma-separated. Example: newsletter', 'post-lattice'),
              value: atts.include_categories,
              onChange: function (value) {
                props.setAttributes({ include_categories: value });
              }
            }),
            el(TextControl, {
              label: __('Hide these categories', 'post-lattice'),
              help: __('Slugs or IDs, comma-separated.', 'post-lattice'),
              value: atts.exclude_categories,
              onChange: function (value) {
                props.setAttributes({ exclude_categories: value });
              }
            }),
            el(TextControl, {
              label: __('Heading title override', 'post-lattice'),
              value: atts.title,
              onChange: function (value) {
                props.setAttributes({ title: value });
              }
            }),
            el(SelectControl, {
              label: __('Card badge', 'post-lattice'),
              value: atts.card_badge,
              options: [
                { label: __('Use plugin settings', 'post-lattice'), value: '' },
                { label: __('Category name', 'post-lattice'), value: 'category' },
                { label: __('Year', 'post-lattice'), value: 'year' },
                { label: __('Hidden', 'post-lattice'), value: 'none' }
              ],
              onChange: function (value) {
                props.setAttributes({ card_badge: value });
              }
            }),
            el(SelectControl, {
              label: __('Desktop columns', 'post-lattice'),
              value: atts.columns,
              options: [
                { label: __('Use plugin settings', 'post-lattice'), value: '' },
                { label: '2', value: '2' },
                { label: '3', value: '3' },
                { label: '4', value: '4' }
              ],
              onChange: function (value) {
                props.setAttributes({ columns: value });
              }
            }),
            el(ToggleControl, {
              label: __('Show heading', 'post-lattice'),
              checked: atts.show_hero !== '0',
              onChange: function (value) {
                props.setAttributes({ show_hero: yesNo(value) });
              }
            }),
            el(ToggleControl, {
              label: __('Show call to action', 'post-lattice'),
              checked: atts.show_cta !== '0',
              onChange: function (value) {
                props.setAttributes({ show_cta: yesNo(value) });
              }
            })
          )
        ),
        el(
          'div',
          { className: 'plt-block-preview' },
          el(ServerSideRender, {
            block: 'post-lattice/grid',
            attributes: atts
          })
        )
      );
    },
    save: function () {
      return null;
    }
  });
})(
  window.wp.blocks,
  window.wp.element,
  window.wp.blockEditor,
  window.wp.components,
  window.wp.i18n,
  window.wp.serverSideRender
);
