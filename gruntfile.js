module.exports = function (grunt) {

  grunt.initConfig({
    watch: {
      sass: {
        files: "public/assets/css/**/*.scss",
        tasks: ['sass']
      }
    },
    sass: {
      dev: {
        files: {
          "public/assets/css/build/app.css" : "public/assets/css/app.scss",
          "public/assets/css/build/dashboard.css" : "public/assets/css/dashboard.scss"
        }
      }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');

};
