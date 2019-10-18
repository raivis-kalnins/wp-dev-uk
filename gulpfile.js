var gulp = require('gulp');
var sass = require('gulp-sass');
var concat = require('gulp-concat');
var del = require('del');
var babel = require('gulp-babel');

sass.compiler = require('node-sass');

gulp.task('scripts', function () {
    return gulp.src([
        // "scripts/vendor/react.js",
        // "scripts/vendor/react-dom.js",
        "scripts/vendor/babel.min.js",
        // "scripts/vendor/react.production.min.js",
        "scripts/vendor/modernizr-2.6.2.min.js",
        "scripts/vendor/jquery.min.js",
        "scripts/vendor/jquery-ui.min.js",
        "scripts/vendor/jquery.ui.touch-punch.min.js",
        "scripts/vendor/bootstrap.min.js",
        "scripts/vendor/moment.min.js",
        //"scripts/vendor/jquery.googlecalreader.min.js",
        //"scripts/vendor/foundation.min.js",
        "scripts/vendor/owl.carousel.min.js",
        //"scripts/vendor/video.min.js",
        //"scripts/vendor/soundmanager2-jsmin.js",
        //"scripts/vendor/dom-to-image.min.js",
        //"scripts/vendor/html2canvas.min.js",
        "scripts/app.js"
    ])
    .pipe(concat('scripts.js'))
    .pipe(gulp.dest('assets/js/'));
});

gulp.task('sass', function () {
    return gulp.src('sass/main.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('assets/css/'));
});

gulp.task('watch:sass', function () {
    gulp.watch('sass/**/*.scss', gulp.series('clean', 'scripts', 'sass'));
});

gulp.task('watch:scripts', function () {
    gulp.watch('scripts/**/*.js', gulp.series('clean', 'scripts', 'sass'));
});

//Delete compiled script and css
gulp.task('clean', function () {
    return del(['css/main.css', 'js/app.js']);
});

gulp.task('build', gulp.series('clean', 'scripts', 'sass'));