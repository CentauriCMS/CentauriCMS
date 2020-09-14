/*
 |--------------------------------------------------------------------------
 | Mix Asset Management
 |--------------------------------------------------------------------------
 |
 | Mix provides a clean, fluent API for defining some Webpack build steps
 | for your Laravel application. By default, we are compiling the Sass
 | file for the application as well as bundling up all the JS files.
 |
 */

let mix = require("laravel-mix");
let fileName = "centauri.min";

mix.setPublicPath("./public/backend/");

mix.options({
    processCssUrls: true,

    postCss: [
        require("postcss-css-variables")()
    ],

    terserOptions: {
        reserved: [
            "Centauri"
        ]
    }
});

let jsDirNames = [
    "__Functions",
    "Callbacks",
    "Centauri",
    "Components",
    "Core",
    "Events",
    "Helper",
    "Init",
    "Lib",
    "Listener",
    "Modal",
    "Service",
    "Utility",
    "View"
];

mix
    .js("resources/js/*.js", `public/backend/js/${fileName}.js`)
    .sass("resources/scss/main.scss", `public/backend/css/${fileName}.css`)
;

jsDirNames.forEach(jsDirName => {
    mix.js(`resources/js/${jsDirName}/**/*.js`, `public/backend/js/${fileName}.js`);
});

if(mix.inProduction()) {
    mix.version();

    mix.then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");

        convertToFileHash({
            publicPath: "public/backend/",
            manifestFilePath: "public/backend/mix-manifest.json"
        });
    });
}
