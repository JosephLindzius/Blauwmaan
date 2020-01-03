// webpack.config.js
let Encore = require('@symfony/webpack-encore');
Encore
    // the project directory where compiled assets will be stored
    .setOutputPath('public/build/')
    // the public path used by the web server to access the previous directory
    .setPublicPath('/build')
    // the public path you will use in Symfony's asset() function - e.g. asset('build/some_file.js')
    //.setManifestKeyPrefix('build/')
    .cleanupOutputBeforeBuild()
    .enableSourceMaps(!Encore.isProduction())
    // the following line enables hashed filenames (e.g. app.abc123.css)
    .enableVersioning(Encore.isProduction())
    // allow sass/scss files to be processed
    .enableSassLoader()
    // React Pages Javascript
    .addEntry('js/app', './assets/js/React/App/Startup/registration.js')
    // Add style entry
    .addStyleEntry('css/app', './assets/scss/app.scss')
    // Add react preset
    .enableReactPreset()
    .configureBabel(function(babelConfig) {
        // add additional presets
   //     babelConfig.presets.push('es2015');
        babelConfig.presets.push('stage-0');
    })
    .enableBuildNotifications()
    .enablePostCssLoader()
// create hashed filenames (e.g. app.abc123.css)
//.enableVersioning()
;
// export the final configuration
module.exports = Encore.getWebpackConfig();
