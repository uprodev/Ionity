const gulp = require('gulp');

module.exports = function images() {
  return gulp.src(['src/img/**/*', 'src/img/*'])
    .pipe(gulp.dest('build/assets/img'))
};
