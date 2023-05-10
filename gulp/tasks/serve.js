const gulp = require("gulp");

const images = require("./images");
const fonts = require("./fonts");
const styles = require("./styles");
const script = require("./scripts");
const server = require("browser-sync").create();

module.exports = function serve(cb) {
  server.init({
    server: "build",
    notify: false,
    open: true,
    cors: true,
  });

  gulp.watch(["src/img/*", "src/img/**/*"], gulp.series(images)).on("change", server.reload);
  gulp.watch("src/fonts/*", gulp.series(fonts)).on("change", server.reload);
  gulp.watch("src/scss/**/*.scss", gulp.series(styles));
  gulp.watch("src/js/**/*.js", gulp.series(script)).on("change", server.reload);
  gulp.watch("build/*.html").on("change", server.reload);

  return cb();
};
