const gulp = require("gulp");

module.exports = function fonts() {
  return gulp.src(["src/fonts/**/*", "src/fonts/*"]).pipe(gulp.dest("build/assets/fonts"));
};
