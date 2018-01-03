import React from 'react';
import { render } from 'react-dom';

import App from './App';
import myData from './initialState'

const initialState = myData;

render(
    <App initialState={initialState}/>,
    document.getElementById('root')
);
