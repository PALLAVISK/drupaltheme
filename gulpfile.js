var gulp = require('gulp');
var sass = require('gulp-sass');
var browserSync = require('browser-sync').create();
var imagemin = require('gulp-imagemin');


gulp.task('sass', defaultTask); //converts sass to css files
function defaultTask(done){
    return gulp.src('custom/newboot_cdn/sass/style.scss')
      .pipe(sass()) 
      .pipe(gulp.dest('custom/newboot_cdn/css'))
      .pipe(browserSync.reload({
        stream: true
      }));
}

gulp.task('browserSync',function () {  // browser sync help to sync so no need to reload page everytime
  browserSync.init({
    open: 'external',
    hostname: 'localhost',
    proxy: 'http://localhost:8888/drupal8-dev/web/',    
  });
})
 
gulp.task('images', function(){  // it optimize the image according to the interface 
  return gulp.src('custom/newboot_cdn/css/images/**/*.+(png|jpg|gif|svg)')
  .pipe(imagemin())
  .pipe(gulp.dest('custom/newboot_cdn/myimages'))
});

gulp.task('hello',()=>{
  console.log("hellooo...");
  
})

gulp.task('watch', gulp.parallel('browserSync',function(done){
  gulp.watch('custom/newboot_cdn/sass/style.scss', gulp.series('sass'));
}))



// gulp.task('watch', function(){
// gulp.watch('custom/newboot_cdn/sass/style.scss', gulp.series(defaultTask,'hello')); 
// });

