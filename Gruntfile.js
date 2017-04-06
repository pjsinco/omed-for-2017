module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");
  grunt.loadNpmTasks("grunt-grunticon");
  grunt.loadNpmTasks("grunt-svgmin");
  grunt.loadNpmTasks("grunt-babel");

  grunt.initConfig({

    babel: {
      dist: {
        options: {
          sourceMap: true,
          presets: ['babel-preset-es2015'],
        },
        files: {
          'scripts/bundle.js': 'scripts/main.js',
        },
      },
    },

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
      scripts: {
        options: {
          title: 'Scripts',
          message: 'Babelified!',
        },
      },

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

      scripts: {
        files: ['scripts/**/*.js'],
        tasks: ['babel:dist', 'notify:scripts'],
      },
      
      sass: {
        files: ['**/*.scss'],
        tasks: ['sass:dist', 'notify:sass', 'autoprefixer:css'],
      },

      php: {
        files: ['**/*.php'],
      },
    
    }, // watch

  }); // initConfig
  
  grunt.registerTask('default', ['watch']);

}; // exports

