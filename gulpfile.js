var path = require('path');
var gulp = require('gulp');
var del = require('del');
var runSequence = require('run-sequence');
var browserSync = require('browser-sync');
var wiredep = require('wiredep');
var gulpLoadPlugins = require('gulp-load-plugins');
var pkg = require('./package.json');
var realFavicon = require ('gulp-real-favicon');
var fs = require('fs');
var gutil = require('gulp-util');
var plugins = gulpLoadPlugins();
var reload = browserSync.reload;

var SRC_PATH = './assets';
var BUILD_PATH = './public';
var TMPL_PATH = './craft/templates';
var TEMP_PATH = '.tmp';
var BOWER_PATH = './assets/vendor';

gulp.task('help', plugins.taskListing);
gulp.task('default', ['help']);

// Compile and automatically prefix stylesheets
gulp.task('css', function () {
  return gulp.src([SRC_PATH + '/css/style.less'])
    .pipe(plugins.sourcemaps.init())
    .pipe(
      plugins.less().on('error', function (err) {
        gutil.log(err);
        this.emit('end');
      })
    )
    .pipe(plugins.autoprefixer({browsers: ['last 3 version', '> 5%']}))
    .pipe(gulp.dest(TEMP_PATH + '/css'))
    // Minify styles
    //.pipe(plugins.if('*.css', plugins.minifyCss()))
    .pipe(plugins.size({title: 'css'}))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(BUILD_PATH + '/css'));
});

gulp.task('vendor-css', function () {
  // For best performance, don't add Sass partials to `gulp.src`
  return gulp.src(getWireDepFiles('css'))
    .pipe(plugins.sourcemaps.init())
    .pipe(gulp.dest(TEMP_PATH + '/css'))
    .pipe(plugins.concat('vendors.css'))
    // Concatenate and minify styles
    .pipe(plugins.if('*.css', plugins.minifyCss()))
    .pipe(plugins.size({title: 'vendor-css'}))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(BUILD_PATH + '/css'))
    .pipe(browserSync.stream());
});

gulp.task('fonts', function () {
  return gulp.src([
      BOWER_PATH + '/font-awesome/fonts/*',
      BOWER_PATH + '/roboto-fontface/fonts/Roboto/*',
      SRC_PATH + '/fonts/**/*.*'
    ])
    .pipe(gulp.dest(BUILD_PATH + '/fonts'));
});

gulp.task('scripts', function () {
  return gulp.src([SRC_PATH + '/js/*'])
    .pipe(plugins.newer(TEMP_PATH + '/js'))
    .pipe(plugins.sourcemaps.init())
    .pipe(gulp.dest(TEMP_PATH + '/js'))
    .pipe(plugins.concat('scripts.js'))
    .pipe(plugins.uglify().on('error', function(err){
      gutil.log(err);
      this.emit('end');
    }))
    //.pipe(plugins.stripDebug())
    // Output files
    .pipe(plugins.size({title: 'js'}))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(BUILD_PATH + '/js'))
    .pipe(browserSync.stream());
});

gulp.task('vendor-js', function () {
  return gulp.src(getWireDepFiles('js'))
    .pipe(plugins.newer(TEMP_PATH + '/js'))
    .pipe(plugins.sourcemaps.init())
    .pipe(gulp.dest(TEMP_PATH + '/js'))
    .pipe(plugins.concat('vendors.js'))
    .pipe(plugins.uglify())
    .pipe(plugins.stripDebug())
    // Output files
    .pipe(plugins.size({title: 'vendor-js'}))
    .pipe(plugins.sourcemaps.write('.'))
    .pipe(gulp.dest(BUILD_PATH + '/js'))
    .pipe(browserSync.stream());
});

// Optimize images
gulp.task('images', function () {
  return gulp.src(SRC_PATH + '/images/**/*')
    .pipe(plugins.cache(plugins.imagemin({
      progressive: true,
      interlaced: true
    })))
    .pipe(gulp.dest(BUILD_PATH + '/images'))
    .pipe(plugins.size({title: 'images'}));
});

// Clean output directory
gulp.task('clean', function () {
  return del(['.tmp', BUILD_PATH + '/css', BUILD_PATH + '/js', BUILD_PATH + '/images'], {dot: true});
});

//  Grouped Functions
gulp.task('copy-misc', function () {

  gulp.src(BOWER_PATH + '/roboto-fontface/fonts/*/*')
    .pipe(gulp.dest(BUILD_PATH + '/css/fonts'));

  gulp.src(BOWER_PATH + '/slick-carousel/slick/fonts/*')
    .pipe(gulp.dest(BUILD_PATH + '/css/fonts'));

  gulp.src(BOWER_PATH + '/slick-carousel/slick/*.gif')
    .pipe(gulp.dest(BUILD_PATH + '/css'));

  gulp.src([
      BOWER_PATH + '/picturefill/dist/picturefill.min.js',
      BOWER_PATH + '/html5shiv/dist/html5shiv.min.js',
      BOWER_PATH + '/respond/dest/respond.min.js',
      './bower_components/underscore/underscore-min.js',
      './node_modules/underscore.string/dist/underscore.string.min.js',
    ])
    .pipe(gulp.dest(BUILD_PATH + '/js'));
});


// Wiredep Helper function
function getWireDepFiles(fileType) {
  var bowerScriptsAbsolute = wiredep()[fileType];

  var bowerScriptsRelative = bowerScriptsAbsolute.map(function makePathRelativeToCwd(file) {
    return path.relative('', file);
  });

  return bowerScriptsRelative.concat();
}

// File where the favicon markups are stored
var FAVICON_DATA_FILE = 'public/favicons/faviconData.json';

gulp.task('favicons-generate', function(done) {
  realFavicon.generateFavicon({
    masterPicture: 'assets/images/default-logo.jpg',
    dest: 'public/favicons',
    iconsPath: '/favicons',
    design: {
      ios: {
        pictureAspect: 'backgroundAndMargin',
        backgroundColor: '#ffffff',
        margin: '0%',
        assets: {
          ios6AndPriorIcons: false,
          ios7AndLaterIcons: false,
          precomposedIcons: false,
          declareOnlyDefaultIcon: true
        }
      },
      desktopBrowser: {},
      windows: {
        pictureAspect: 'noChange',
        backgroundColor: '#ffffff',
        onConflict: 'override',
        assets: {
          windows80Ie10Tile: false,
          windows10Ie11EdgeTiles: {
            small: false,
            medium: true,
            big: false,
            rectangle: false
          }
        }
      },
      androidChrome: {
        pictureAspect: 'noChange',
        themeColor: '#ffffff',
        manifest: {
          name: pkg.name,
          display: 'standalone',
          orientation: 'notSet',
          onConflict: 'override',
          declared: true
        },
        assets: {
          legacyIcon: false,
          lowResolutionIcons: false
        }
      },
      safariPinnedTab: {
        pictureAspect: 'silhouette',
        themeColor: '#ffffff'
      }
    },
    settings: {
      scalingAlgorithm: 'Mitchell',
      errorOnImageTooSmall: false
    },
    markupFile: FAVICON_DATA_FILE
  }, function() {
    done();
  });
});

gulp.task('favicons-markup', function() {
  gulp.src(['craft/templates/_layouts/_partials/favicons.twig'])
    .pipe(realFavicon.injectFaviconMarkups(JSON.parse(fs.readFileSync(FAVICON_DATA_FILE)).favicon.html_code))
    .pipe(gulp.dest('craft/templates/_layouts/_partials'));
});


// Watch files for changes & reload

gulp.task('serve', ['css'], function () {
  browserSync({
    notify: false,
    // Customize the Browsersync console logging prefix
    logPrefix: 'Flow',
    proxy: 'http://' + pkg.domain + '/'
  });

  gulp.watch([TMPL_PATH + '/**/*.{twig,html}'], reload);
  gulp.watch([SRC_PATH + '/css/**/*.less'], ['css', reload]);
  gulp.watch([SRC_PATH + '/js/**/*.js'], ['scripts', reload]);
  gulp.watch([SRC_PATH + '/images/**/*'], ['images', reload]);
});


gulp.task('build', function (callback) {
  runSequence(['clean'], ['images', 'css', 'fonts', 'scripts', 'vendor-css', 'vendor-js', 'copy-misc'], callback);
  return false;
});
gulp.task('default', ['build']);

gulp.task('favicons', [], function (callback) {
  runSequence(['favicons-generate'], ['favicons-markup'], callback);
  return false;
});

