var gulp = require('gulp');
var webserver = require('gulp-webserver');
var stylus = require('gulp-stylus');
var nib = require('nib');
var minifyCSS = require('gulp-minify-css');
var uglify = require('gulp-uglify');
var pump = require('pump');
var autoprefixer = require('gulp-autoprefixer');
var imagemin = require('gulp-tinypng');


var config = {
  styles: {
    main: './src/styles/main.styl',
    watch: './src/styles/**/*.styl',
    output: './build/css'
  },
  html: {
    watch: './build/*.html'
  }
}

gulp.task('server', function() {
  gulp.src('./build')
    .pipe(webserver({
      host: '0.0.0.0',
      port: 8080,
      livereload: true
    }));
});

gulp.task('build:css', function() {
  gulp.src(config.styles.main)
    .pipe(stylus({
      use: nib(),
      'include css': true
    }))
    .pipe(minifyCSS())
    .pipe(gulp.dest(config.styles.output));
});

gulp.task('watch', function() {
  gulp.watch(config.styles.watch, ['build:css']);
  gulp.watch(config.html.watch, ['build']);
});


gulp.task('compress', function (cb) {
  pump([
        gulp.src('src/js/*.js'),
        uglify(),
        gulp.dest('build/js')
    ],
    cb
  );
});

gulp.task('prefix', function () {
	return gulp.src('src/styles/main.css')
		.pipe(autoprefixer({
			browsers: ['last 2 versions','iOS 7'],
			cascade: false
		}))
		.pipe(gulp.dest('build/css'));
});

gulp.task('tinypng', function () {
	gulp.src('src/img/*.png')
		.pipe(imagemin('dkXP52yPofvF2hGtUEgQmZQuZ0BwJpv4'))
		.pipe(gulp.dest('build/img'));
});


gulp.task('build', ['build:css'])

gulp.task('default', ['server', 'watch', 'build','compress', 'prefix']);
