var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCSS = require('gulp-clean-css');
var autoprefixer = require('gulp-autoprefixer');
var uglify = require('gulp-uglify');
var sass = require('gulp-sass');

var config = {
    sass: [
        'wp-content/themes/ukrblog/sass/main.scss'
    ],
    js: [
        'wp-content/themes/ukrblog/js/main.js'
    ]
};

gulp.task('compile:sass', function () {
    return gulp.src(config.sass) 
        .pipe(sass().on('error', sass.logError))
        .pipe(autoprefixer())
        .pipe(concat('compressed.min.css'))
        .pipe(cleanCSS())
        .pipe(gulp.dest('./wp-content/themes/ukrblog/compressed/'));
});

gulp.task('compile:js', function () {
    return gulp.src(config.js)
        .pipe(concat('compressed.min.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./wp-content/themes/ukrblog/compressed/'));
});

gulp.task('watch', ['compile:js', 'compile:sass'], function () {
    gulp.watch(config.js , ['compile:js']);
    gulp.watch(config.sass , ['compile:sass']);
});

gulp.task('default', [
    'compile:js',
    'compile:sass'
]);