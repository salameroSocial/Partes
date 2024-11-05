/**
 * First we will load all of this project's JavaScript dependencies which
 * includes React and other helpers. It's a great starting point while
 * building robust, powerful web applications using React + Laravel.
 */

import './bootstrap';

/**
 * Next, we will create a fresh React component instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import './components/Example';



// resources/js/app.js
require('./bootstrap');

// Importamos React y ReactDOM
import React from 'react';
import { createRoot } from 'react-dom/client';

// Importamos nuestro componente
import HelloComponent from './components/HelloComponent';

// Seleccionamos el div con el ID "app" y renderizamos el componente
const rootElement = document.getElementById('app');
if (rootElement) {
    const root = createRoot(rootElement);
    root.render(<HelloComponent />);
}
