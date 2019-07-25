var gulp = require('gulp');
var gutil = require( 'gulp-util' );
var ftp = require( 'vinyl-ftp' );
var sftp = require('gulp-sftp');
var using = require('gulp-using');
var watch = require('gulp-watch');
var sass = require('gulp-sass');
var pipeErrorStop = require("pipe-error-stop");
var autoprefixer  = require('gulp-autoprefixer'),
		notify        = require("gulp-notify"),
		browserSync   = require('browser-sync').create(),
		browserSync2   = require('browser-sync').create(),
    cleancss      = require('gulp-clean-css');

var sourcemaps = require('gulp-sourcemaps');

const imageminFull = require('imagemin');
const imageminWebp = require('imagemin-webp');

const webp = require('gulp-webp');


var cache = require('gulp-cache');
var imagemin = require('gulp-imagemin');
var imageminPngquant = require('imagemin-pngquant');
var imageminZopfli = require('imagemin-zopfli');
var imageminMozjpeg = require('imagemin-mozjpeg'); //need to run 'brew install libpng'
var imageminGiflossy = require('imagemin-giflossy');


var host = 'clew.ftp.tools';
var user = 'clew_dev';
var pass = '4E3ex8yT9CjN';
var path = '/clew.shop/new/';

var conn = ftp.create( {
    host:     host,
    user:     user,
    password: pass,
    parallel: 15,
    log:      gutil.log,
    reload: true,
    idleTimeout: 100000
});

var sftpOptions = {
    host:     host,
    user:     user,
    password: pass,
    remotePath: path
}



gulp.task('webp', () =>
    gulp.src('wp-content/themes/voxlink/img/**/*.{jpg,png,webp}')
        .pipe(webp({
            quality: 99
        }))
        .pipe(gulp.dest('wp-content/themes/voxlink/webp'))
);



gulp.task('minWebP', function() {
    imageminFull(['wp-content/themes/voxlink/img/webp/*.webp'], 'wp-content/themes/voxlink/img/minwebp', {
        use: [
            imageminWebp({
                quality: 95
            })
        ]
    }).then(() => {
        console.log('Images optimized');
    });
});


gulp.task('browser-sync', function() {
	browserSync.init({
	    proxy: {
	        target: "new.clew.shop"
	    },
		port: 8080
	})
});


gulp.task('files', function (e) {
    return watch(['**/*.*','!node_modules', '!.c9'])
        .pipe( conn.dest(path) );
}); 




gulp.task('watchparser', function (e) {
    return watch('parser/**/*.*')
         .pipe( sftp({
            host:     host,
            user:     user,
            password: pass,
            remotePath: "/html/parser"
        }) );
});


gulp.task('watchindexfiles', function (e) {
    return watch('*.*')
         .pipe( sftp({
            host:     host,
            user:     user,
            password: pass,
            remotePath: "/html/"
        }) );
});

gulp.task('watchplugins', function (e) {
    return watch('wp-content/plugins/**/*.*')
         .pipe( sftp({
            host:     host,
            user:     user,
            password: pass,
            remotePath: "/html/wp-content/plugins"
        }) );
});


gulp.task('uploadimages', function (e) {
    return gulp.src('wp-content/themes/voxlink/webp/**/*.*')
        .pipe( conn.dest( '/wp-content/themes/voxlink/webp') );
});

gulp.task('uploadplugin', function (e) {
    return gulp.src('wp-content/plugins/woocommerce/**/*.*')
        .pipe( sftp({
            host:     host,
            user:     user,
            password: pass,
            remotePath: "/html/wp-content/plugins/woocommerce"
        }) );
});


gulp.task('sass', function () {
    return watch('./wp-content/themes/voxlink/scss/**/*.scss')
        .pipe(sass().on('error', sass.logError))
        .pipe(gulp.dest('./css'));
});


gulp.task('uftp', function () {
    return gulp.src('./wp-content/uploads/2017/**/*.*')
        .pipe( conn.dest("/wp-content/uploads/2017") )
        .pipe(pipeErrorStop())
});


gulp.task('styles', function(e) {
	return gulp.src('./wp-content/themes/voxlink/scss/**/*.scss')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('./wp-content/themes/voxlink/css/'))
	.pipe(browserSync.stream())
});



gulp.task('watchimages', function() {
	return watch('./wp-content/themes/Clew-shop/img/**/*.{jpg,png}')
	.pipe(cache(imagemin([
            //png
            imageminPngquant({
                speed: 1,
                quality: 85 //lossy settings
            }),
            imageminZopfli({
                more: true
                // iterations: 50 // very slow but more effective
            }),
            //gif
            // imagemin.gifsicle({
            //     interlaced: true,
            //     optimizationLevel: 3
            // }),
            //gif very light lossy, use only one of gifsicle or Giflossy
            imageminGiflossy({
                optimizationLevel: 3,
                optimize: 3, //keep-empty: Preserve empty transparent frames
                lossy: 2
            }),
            //svg
            imagemin.svgo({
                plugins: [{
                    removeViewBox: false
                }]
            }),
            //jpg lossless
            imagemin.jpegtran({
                progressive: true
            }),
            //jpg very light lossy, use vs jpegtran
            imageminMozjpeg({
                quality: 85
            })
    ])))
	.pipe(gulp.dest('site/bitrix/templates/bonyaspouch/minimg'))
// 	.pipe(webp({
//         quality: 85
//     }))
//     .pipe(gulp.dest('wp-content/themes/voxlink/webp'))
});

gulp.task('watchstyles', function() {
	return watch('./wp-content/themes/Clew-shop/scss/**/*.scss')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('./wp-content/themes/Clew-shop/css/'))
	.pipe(browserSync.stream())
});

gulp.task('watchstylesBitrix', function() {
	return watch('./site/bitrix/templates/bonyaspouch/components/bitrix/**/*.scss')
	.pipe(sass({ outputStyle: 'expanded' }).on("error", notify.onError()))
	.pipe(autoprefixer(['last 15 versions']))
	.pipe(cleancss( {level: { 1: { specialComments: 0 } } })) // Opt., comment out when debugging
	.pipe(gulp.dest('./site/bitrix/templates/bonyaspouch/components/bitrix/'))
	.pipe(browserSync.stream())
});


gulp.task('css', function() {
    return browserSync.watch('./wp-content/themes/Clew-shop/css/**/*.*', (evt, file) => {
        if(file.indexOf(".css") > -1 || file.indexOf(".scss") > -1){
            browserSync.stream();
        }
    });
});



gulp.task('watch', ['watchstyles' ,'watchimages','browser-sync'], function() {
// 	gulp.watch('./wp-content/themes/voxlink/scss/**/*.scss', ['styles']);
// 	gulp.watch('./wp-content/themes/voxlink/js/**/*.js', browserSync.reload());
// 	gulp.watch('./wp-content/themes/voxlink/**/*.php', browserSync.reload());
});

gulp.task('imagemin', () =>
    gulp.src('site/bitrix/templates/bonyaspouch/img/**/*.{jpg,png}')
        .pipe(cache(imagemin([
            //png
            imageminPngquant({
                speed: 1,
                quality: 85 //lossy settings
            }),
            imageminZopfli({
                more: true
                // iterations: 50 // very slow but more effective
            }),
            //gif
            // imagemin.gifsicle({
            //     interlaced: true,
            //     optimizationLevel: 3
            // }),
            //gif very light lossy, use only one of gifsicle or Giflossy
            imageminGiflossy({
                optimizationLevel: 3,
                optimize: 3, //keep-empty: Preserve empty transparent frames
                lossy: 2
            }),
            //svg
            imagemin.svgo({
                plugins: [{
                    removeViewBox: false
                }]
            }),
            //jpg lossless
            imagemin.jpegtran({
                progressive: true
            }),
            //jpg very light lossy, use vs jpegtran
            imageminMozjpeg({
                quality: 85
            })
    ])))
	.pipe(gulp.dest('site/bitrix/templates/bonyaspouch/minimg'))
);


gulp.task('default', ['watch','files']);