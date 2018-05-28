
var gulp = require('gulp');
var sass = require('gulp-sass');
var connect = require('gulp-connect');
var concat = require('gulp-concat');
var uglify = require('gulp-uglify');
var gutil = require('gulp-util');
var livereload = require('gulp-livereload');


// keeps gulp from crashing for scss errors
gulp.task('sass', function() {
    return gulp.src('./sass/*.scss')
        .pipe(sass({ errLogToConsole: true }))
        .pipe(gulp.dest('./public/css'));
});

gulp.task('javascript', function() {
    gulp.src('js/*.js')
        .pipe(concat('todo.js'))
        .pipe(uglify())
        .pipe(gulp.dest('./public/js'))
});

gulp.task('livereload', function() {
    gulp.src('./public/**/*')
        .pipe(connect.reload());
});



gulp.task('watch', function() {
    gulp.watch('./sass/**/*.scss', ['sass']);
    gulp.watch('./js/**/*.js', ['javascript']);
    gulp.watch('./public/**/*', ['livereload']);
    //   gulp.watch('./public/**/*', ['deploy']);

});

gulp.task('default', ['livereload', 'watch', 'sass', 'javascript']);