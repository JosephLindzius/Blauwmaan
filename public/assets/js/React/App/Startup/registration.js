import {ReactOnRails} from 'react-on-rails'
import ReactApp from './ReactApp';

ReactOnRails.register({ ReactApp });

if (typeof window !== 'undefined') {
    let iInnerHeight = window.innerHeight;
}
