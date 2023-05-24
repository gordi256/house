// import './bootstrap';
import '~adminlte/plugins/jquery/jquery.min.js';
import '~adminlte/dist/js/adminlte.min.js';
import Alpine from 'alpinejs';
 
// import Uppy from '@uppy/core'
// import Webcam from '@uppy/webcam'
// import Dashboard from '@uppy/dashboard'
// import XHRUpload from '@uppy/xhr-upload'

// import '@uppy/core/dist/style.css'
// import '@uppy/dashboard/dist/style.css'
// import '@uppy/webcam/dist/style.css'

// const uppy = new Uppy({
//   debug: true,
//   autoProceed: false,
// })
 

// uppy.use(Webcam)
// uppy.use(Dashboard, {
//   inline: true,
//   target: 'body',
//   plugins: ['Webcam'],
// })
// uppy.use(XHRUpload, {
//   endpoint: 'http://localhost:3020/upload.php',
// })


window.Alpine = Alpine;

Alpine.start();

try {
    window.Popper = require('popper.js').default;
    window.$ = window.jQuery = require('jquery');

    require('bootstrap');
} catch (e) {}
 