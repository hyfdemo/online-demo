const gulp = require('gulp');
const autoprefixer = require('gulp-autoprefixer');
 const imagemin = require('gulp-imagemin');
 const htmlmin = require('gulp-htmlmin');
 const uglify = require('gulp-uglify');
 const babel = require('gulp-babel');
 const cleanCss=require('gulp-clean-css');
 const sourcemaps = require('gulp-sourcemaps');

gulp.task('htmlmin', function() {
  	gulp.src('pages/**/*.html')
    .pipe(htmlmin({collapseWhitespace: true}))
    .pipe(gulp.dest('dist/pages'));
});
gulp.task('jscompress', ()=> 
        gulp.src('pages/**/*.js')
        //.pipe(sourcemaps.init())
        .pipe(babel({
            presets: ['env']
        }))
        .pipe(uglify())
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest('dist/pages'))
);
gulp.task('csscompress', ()=> 
        gulp.src('pages/**/*.css')
        //.pipe(sourcemaps.init())
        .pipe(cleanCss())
        //.pipe(sourcemaps.write())
        .pipe(gulp.dest('dist/pages'))
);
gulp.task('auto',function(){
	gulp.watch('src/js/config.js',['jscompress'])
	gulp.watch('pages/**/*.css',['csscompress'])
});
gulp.task('img',()=>
	 gulp.src('src/img/*')
        .pipe(imagemin())
        .pipe(gulp.dest('dist/src/img'))
	);
gulp.task('cssfix', () =>
    gulp.src('pages/**/*.css')
        .pipe(autoprefixer({
            browsers: ['last 2 versions'],
            cascade: false
        }))
        .pipe(gulp.dest('dist/pages'))
);
gulp.task('default', ['img', 'cssfix','htmlmin','csscompress','auto']);