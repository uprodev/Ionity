const del = require('del');

module.exports = function clean(cb) {
  return del('build/assets').then(() => {
    cb()
  })
};
