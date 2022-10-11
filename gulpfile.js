const { src, dest, watch, series } = require('gulp')
const sass = require('gulp-sass')(require('sass'))

function buildStyles() {
    return src('./public/assets/sass/**/*.scss')
        .pipe(sass())
        .pipe(dest('./public/assets/dist/css'))
}

function watchTask() {
    watch(['./public/assets/sass/**/*.scss'], buildStyles)
}

exports.default = series(buildStyles, watchTask)
