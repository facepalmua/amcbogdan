var syntax = 'scss', // Syntax: sass or scss;
  gulpVersion = '4'; // Gulp version: 3 or 4
gmWatch = false; // ON/OFF GraphicsMagick watching "img/_src" folder (true/false). Linux install gm: sudo apt update; sudo apt install graphicsmagick

var gulp = require('gulp');
(sass = require('gulp-sass')(require('sass'))),
  (browserSync = require('browser-sync')),
  (concat = require('gulp-concat')),
  (uglify = require('gulp-uglify-es').default),
  (cleancss = require('gulp-clean-css')),
  (rename = require('gulp-rename')),
  (autoprefixer = require('gulp-autoprefixer')),
  (notify = require('gulp-notify')),
  (rsync = require('gulp-rsync')),
  (imageResize = require('gulp-image-resize')),
  (sourcemaps = require('gulp-sourcemaps')),
  (del = require('del'));

// Local Server
gulp.task('browser-sync', function () {
  browserSync({
    proxy: 'http://project/',
    notify: false,
    // open: false,
    // online: false, // Work Offline Without Internet Connection
    //tunnel: 'stonedevelop', // Attempt to use the URL https://stonedevelop.loca.lt
  });
});

// Sass|Scss Styles
gulp.task('styles', function () {
  return gulp
    .src('amclinic-wordpress-theme-v4/assets/' + syntax + '/**/*.' + syntax + '')
    .pipe(sourcemaps.init()) // инициализируем создание Source Maps
    .pipe(sass({ outputStyle: 'expanded' }).on('error', notify.onError()))
    .pipe(rename({ suffix: '.min', prefix: '' }))
    .pipe(autoprefixer(['last 15 versions']))
    .pipe(cleancss({ level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
    .pipe(sourcemaps.write()) // пути для записи SourceMaps - в данном случае карта SourceMaps будет добавлена прям в данный файл main.min.css в самом конце
    .pipe(gulp.dest('amclinic-wordpress-theme-v4/assets/css'))
    .pipe(browserSync.stream());
});

// HTML Live Reload
gulp.task('code', function () {
  return gulp.src('amclinic-wordpress-theme-v4/*.php').pipe(browserSync.reload({ stream: true }));
});

// If Gulp Version 4
if (gulpVersion == 4) {
  // Img Processing Task for Gulp 4

  gulp.task('watch', function () {
    gulp.watch(
      'amclinic-wordpress-theme-v4/assets/' + syntax + '/**/*.' + syntax + '',
      gulp.parallel('styles'),
    );
    gulp.watch(
      'amclinic-wordpress-theme-v4/assets/css/_build/_components/_faq.scss',
      gulp.parallel('styles'),
    );
    gulp.watch(
      'amclinic-wordpress-theme-v4/assets/css/_build/_components/_sidebar-items.scss',
      gulp.parallel('styles'),
    );
    gulp.watch('amclinic-wordpress-theme-v4/assets/css/_build/**/*.scss', gulp.parallel('styles'));
    gulp.watch(
      'amclinic-wordpress-theme-v4/assets/css/_build/_components/**/*.scss',
      gulp.parallel('styles'),
    );
    gulp.watch('amclinic-wordpress-theme-v4/**/*.php', gulp.parallel('code'));
    gmWatch; // GraphicsMagick watching image sources if allowed.
  });
  gmWatch
    ? gulp.task('default', gulp.parallel('styles', 'browser-sync', 'watch'))
    : gulp.task('default', gulp.parallel('styles', 'browser-sync', 'watch'));
}
