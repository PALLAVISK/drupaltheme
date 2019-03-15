var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();


gulp.task('sass', defaultTask);
function defaultTask(){
    return gulp.src('app/scss/style.scss')
      .pipe(sass()) // Converts Sass to CSS with gulp-sass
      .pipe(gulp.dest('app/css'))
      .pipe(browserSync.reload({
        stream: true
      }))
};

gulp.task('browserSync',
function () {
  browserSync.init({
    server: {
      baseDir: 'app'
    },
  })
});

gulp.task('hello',()=>{
  console.log("hellooo...");
  
})



gulp.task('watch', function(){
gulp.watch('app/scss/style.scss', gulp.series(defaultTask,'hello')); 
});

gulp.task('wat', ['browserSync'], function (){
gulp.watch('app/scss/style.scss', gulp.series(defaultTask)); 
});