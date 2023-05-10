const gulp = require("gulp");
const plumber = require("gulp-plumber");
const scss = require("gulp-sass");
const cleanCSS = require("gulp-clean-css");
const autoprefixer = require("gulp-autoprefixer");
const argv = require("yargs").argv;
const gulpif = require("gulp-if");
var rename = require("gulp-rename");

module.exports = function stylesmin() {
  return (
    gulp
      .src("src/scss/*.scss")
      .pipe(plumber())

      .pipe(scss({ outputStyle: "compressed" }))
      //   .pipe(
      //     gulpif(
      //       argv.prod,
      //       cleanCSS(
      //         {
      //           debug: true,
      //           compatibility: "*",
      //         },
      //         (details) => {
      //           console.log(`${details.name}: Original size:${details.stats.originalSize} - Minified size: ${details.stats.minifiedSize}`);
      //         }
      //       )
      //     )
      // )
      .pipe(autoprefixer("last 2 version"))
      .pipe(gulp.dest("build/assets/css"))
  );
};
