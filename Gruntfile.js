module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");
  grunt.loadNpmTasks("grunt-grunticon");
  grunt.loadNpmTasks("grunt-svgmin");

  grunt.initConfig({

    svgmin: {
      dist: {
        options: {
          plugins: [
            { removeXMLProcInst: true },
            { removeViewBox: false },
            { removeUselessStrokeAndFill: false },
          ],
        },
        files: [{
          expand: true,
          cwd: 'images/svg',
          src: ['*.svg'],
          dest: 'images/svg/minified',
        }]
      }
    },

    grunticon: {
      icons: {
        files: [
          {
            expand: true,
            //cwd: 'images/svg/minified',
            cwd: 'images/svg',
            src: ["*.svg", '*.png'],
            dest: 'dist/grunticon',
          },
        ],
        options: {
          enhanceSVG: true,
          pngpath: 'images/png',
          colors: {
            //red: '#df2826',
            red: '#fa4132',
            //lightblue: '#67dfff',
            lightblue: '#7fc3ff',
            white: '#ffffff',
            warmgray: '#babbb1',
          },
          //dynamicColorOnly: true,
        },
      },
    },

    sass: {
      dist: {
        options: {
          sourcemap: 'none',
        },
        files: [{
          expand: true,
          cwd: 'sass',
          src: ['**/*.scss'],
          dest: '.',
          ext: '.css',
        }],
      },
    },

    notify: {
      sass: {
        options: {
          title: 'Sass',
          message: 'Sassed!'
        },
      },
    },

    autoprefixer: {
      css: {
        src: '*.css',
        options: {
          browsers: [
            '> 1%',
            'last 2 versions',
            'Firefox ESR',
            'iOS >= 7',
            'ie >= 10'
          ],
        },
      },
    },

    watch: {
      options: {
        livereload: true,
      },
      
      sass: {
        files: ['**/*.scss'],
        tasks: ['sass:dist', 'notify:sass', 'autoprefixer:css'],
      },

      php: {
        files: ['**/*.php'],
        options: {
          livereload: 35729,
        },
      },
    
    }, // watch

  }); // initConfig
  
  grunt.registerTask('default', ['watch']);

}; // exports

