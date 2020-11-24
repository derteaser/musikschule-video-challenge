const gulp = require('gulp');
const postcss = require('gulp-postcss');
const minifyCSS = require('gulp-csso');
const rename = require('gulp-rename');
const env = require('gulp-env');
const svgSprite = require('gulp-svg-sprite');
const googleWebFonts = require('gulp-google-webfonts');


gulp.task('dev-css', function () {
  return gulp
    .src('./css/musikschule-tailwind.css')
    .pipe(postcss([
      require('postcss-import'),
      require('tailwindcss'),
      require('postcss-nested'),
      require('autoprefixer'),
    ]))
    .pipe(rename('app.css'))
    .pipe(gulp.dest('./dist'))
});

gulp.task('prod-css', function () {
  env.set({
    NODE_ENV: 'production'
  });
  return gulp
    .src('./css/musikschule-tailwind.css')
    .pipe(postcss([
      require('postcss-import'),
      require('tailwindcss'),
      require('postcss-nested'),
      require('autoprefixer'),
    ]))
    .pipe(rename('app.min.css'))
    .pipe(minifyCSS())
    .pipe(gulp.dest('./dist'))
});

gulp.task('copy-js-tools', function () {
  return gulp.src([
    'node_modules/lazysizes/lazysizes.min.js',
    'node_modules/alpinejs/dist/alpine.js',
    'node_modules/alpinejs/dist/alpine-ie11.js',
    'node_modules/axios/dist/axios.min.js'
  ])
    .pipe(gulp.dest('./dist'));
});

gulp.task('icons', function () {
  const config = {
    mode: {
      symbol: {
        dest: '.',
        example: false,
        sprite: 'icons.svg'
      }
    }
  };

  return gulp.src([
    // Navigation
    'node_modules/heroicons/solid/dots-horizontal.svg',
    'node_modules/heroicons/outline/logout.svg',
    'node_modules/heroicons/outline/menu.svg',
    'node_modules/heroicons/outline/x.svg',

    // Alerts
    'node_modules/heroicons/solid/check-circle.svg',
    'node_modules/heroicons/solid/exclamation-circle.svg',
    'node_modules/heroicons/solid/information-circle.svg',
    'node_modules/heroicons/solid/question-mark-circle.svg',

    // Directions

    // Documents

    // Brands
    'node_modules/simple-icons/icons/facebook.svg',
    'node_modules/simple-icons/icons/instagram.svg',
    'node_modules/simple-icons/icons/whatsapp.svg',
    'node_modules/simple-icons/icons/twitter.svg',
    // Misc

  ])
    .pipe(svgSprite(config))
    .pipe(gulp.dest('dist/img'));
});

gulp.task('fonts', function () {
  return gulp.src('./fonts.list')
    .pipe(googleWebFonts({
      fontsDir: 'fonts/'
    }))
    .pipe(gulp.dest('./css'))
    ;
});

gulp.task('dist-fonts', function() {
  return gulp.src('css/fonts/*')
    .pipe(gulp.dest('dist/fonts'))
});

gulp.task('default', gulp.series('fonts', 'dist-fonts', 'dev-css', 'copy-js-tools', 'icons', 'prod-css'));
