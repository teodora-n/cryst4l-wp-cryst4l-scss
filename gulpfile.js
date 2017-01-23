var gulp = require('gulp'),
	sass = require('gulp-sass'),
	autoprefixer = require('gulp-autoprefixer'),
	bulkSass = require('gulp-sass-bulk-import'),
	concat = require('gulp-concat'),
	cssnano = require('gulp-cssnano'),
	uglify = require('gulp-uglify'),
	rename = require('gulp-rename'),
	imagemin = require('gulp-imagemin'),
	pngquant = require('imagemin-pngquant'),
    sourcemaps = require('gulp-sourcemaps'),
	browserSync = require('browser-sync').create();
	
gulp.task('styles', function() {
    return gulp.src('assets/styles/source/styles.scss')
        .pipe(sourcemaps.init())
        .pipe(bulkSass())
        .pipe(sass({
            includePaths: ['assets/styles/source']
        }).on('error', sass.logError))
        .pipe(autoprefixer({
                browsers: ['last 4 versions'],
                cascade: false
            }))
            .pipe(cssnano())
            .pipe(rename({suffix: '.min'}))
        .pipe(sourcemaps.write('.'))
        .pipe(gulp.dest('assets/styles/build'));
});

gulp.task('scripts', function() {
    return gulp
        .src([
			'assets/js/source/plugins/jquery-3.0.0.min.js',
			'assets/js/source/main/scripts.js'
		])
		.pipe(concat('scripts.js'))
		.pipe(uglify())
		.pipe(rename({
			suffix: '.min'
		}))
        .pipe(gulp.dest('assets/js/build'))
});

gulp.task('images', function() {
    return gulp
		.src('assets/images/source/*')
        .pipe(imagemin({ 
            optimizationLevel: 2, 
            progressive: true, 
            interlaced: true,
            svgoPlugins: [{
				removeViewBox: false,
			}],
            use: [pngquant()] 
        }))
        .pipe(gulp.dest('assets/images/optimised'))
});

gulp.task('browser-sync', function() {
    browserSync.init({
        proxy: "http://localhost/cryst4l/",
		files: ['./**/**/**/**/*.scss', './**/**/**/**/*.js', './**/**/**/**/*.php']
    });
});

gulp.task('watch', function() {
    gulp.watch('assets/styles/source/**/*.scss', ['styles']);
	gulp.watch('assets/js/source/**/*.js', ['scripts']);
	gulp.watch('assets/images/**/*', ['images']);
});
	
gulp.task('default', ['styles', 'scripts', 'browser-sync', 'watch']);
