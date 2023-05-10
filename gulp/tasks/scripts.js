const gulp = require("gulp");
var concat = require("gulp-concat");

module.exports = function script() {
  return gulp.src(["src/js/*.js", "src/js/lib/*.js", "src/js/components/*.js"]).pipe(gulp.dest("build/assets/js/"));
};
