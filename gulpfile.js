const gulp = require("gulp");
const images = require("./gulp/tasks/images");
const fonts = require("./gulp/tasks/fonts");
const script = require("./gulp/tasks/scripts");
const scriptmin = require("./gulp/tasks/scriptsmin");
const styles = require("./gulp/tasks/styles");
const stylesmin = require("./gulp/tasks/stylesmin");
const clean = require("./gulp/tasks/clean");
const serve = require("./gulp/tasks/serve");

require("events").EventEmitter.prototype._maxListeners = 2000;

const dev = gulp.parallel(script, styles, images, fonts);
const build = gulp.series(clean, stylesmin, images, fonts, scriptmin);

module.exports.start = gulp.series(dev, serve);
module.exports.build = gulp.series(build);
