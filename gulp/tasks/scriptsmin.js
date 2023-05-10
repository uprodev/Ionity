const gulp = require("gulp");
const uglify = require("gulp-uglify-es").default;
var concat = require("gulp-concat");

module.exports = function script() {
  return gulp.src(["src/js/*.js", "src/js/lib/*.js", "src/js/components/*.js"]).pipe(uglify()).pipe(gulp.dest("build/assets/js/"));
};
