import React from "react";
import ReactDOM from "react-dom"
import {ReactOnRails} from 'react-on-rails'
import ReactApp from './ReactApp';
ReactOnRails.register({ ReactApp });

const name = 'Josh Perez';
const element = <h1>Hello, {name}</h1>;

ReactDOM.render(
    element,
    document.getElementById('root')
);
