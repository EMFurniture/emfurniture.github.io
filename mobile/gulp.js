const gulp = require('gulp');
const sass = require('gulp-sass')(require('sass'));
const concat = require('gulp-concat');

gulp.task('sass', function() {
  return gulp.src('mobile/keyframes.scss')
    .pipe(sass().on('error', sass.logError))
    .pipe(gulp.dest('mobile')); 
});

gulp.task('concat', function() {
  return gulp.src([
    'mobile/keyframes.css',
    'notice.css', 
    // Add paths to any other CSS files here
  ])
    .pipe(concat('master.css'))
    .pipe(gulp.dest('')); // Output to project root
});

gulp.task('default', gulp.parallel('sass', 'concat'));