import '@webcomponents/webcomponentsjs';
import { define } from 'hybrids';

const files = require.context('./', true, /\.component\.js$/i);
files.keys().map(key => define(`hb-${key.split('/').pop().split('.')[0].toLowerCase()}`, files(key).default));
