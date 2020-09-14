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

mix.setPublicPath("./dist/");

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
    .js("src/js/*.js", `./dist/js/${fileName}.js`)
    .sass("src/scss/main.scss", `./dist/css/${fileName}.css`)
;

jsDirNames.forEach(jsDirName => {
    mix.js(`src/js/${jsDirName}/**/*.js`, `./dist/js/${fileName}.js`);
});

if(mix.inProduction()) {
    mix.version();

    mix.then(() => {
        const convertToFileHash = require("laravel-mix-make-file-hash");

        convertToFileHash({
            publicPath: "./dist/",
            manifestFilePath: "./dist/mix-manifest.json"
        });
    });
}
