const gulp = require("gulp");
const plumber = require("gulp-plumber");
const scss = require("gulp-sass");
const cleanCSS = require("gulp-clean-css");
const autoprefixer = require("gulp-autoprefixer");
const argv = require("yargs").argv;
const gulpif = require("gulp-if");

module.exports = function styles() {
  return gulp
    .src("src/scss/*.scss")
    .pipe(plumber())
    .pipe(
      autoprefixer({
        overrideBrowserslist: ["last 4 version"],
        cascade: false,
      })
    )
    .pipe(scss())
    .pipe(
      gulpif(
        argv.prod,
        cleanCSS(
          {
            debug: true,
            compatibility: "*",
          },
          (details) => {
            console.log(`${details.name}: Original size:${details.stats.originalSize} - Minified size: ${details.stats.minifiedSize}`);
          }
        )
      )
    )
    .pipe(gulp.dest("build/assets/css"));
};
