module.exports = function (grunt) {
  grunt.initConfig({
    watch: {
      sass: {
        files: "public/assets/css/app.scss",
        tasks: ['sass']
      }
    },
    sass: {
        dev: {
            files: {
                "public/assets/css/build/app.css" : "public/assets/css/app.scss"
            }
        }
    },
  });

  grunt.loadNpmTasks('grunt-contrib-sass');
  grunt.loadNpmTasks('grunt-contrib-watch');
};
