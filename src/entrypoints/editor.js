// eslint-disable-next-line import/no-extraneous-dependencies
import { registerPlugin } from '@wordpress/plugins';

import DisplayComponent from '../editor/components/Display';

// Register the plugin.
wp.domReady(() => {
  registerPlugin('sample-i18n-plugin', {
    icon: 'editor-paragraph',
    render: DisplayComponent,
  });
});
