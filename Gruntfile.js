module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");
  grunt.loadNpmTasks("grunt-svgmin");
  grunt.loadNpmTasks("grunt-svgstore");
  grunt.loadNpmTasks("grunt-babel");

  grunt.initConfig({

    svgstore: {

      default: {
        files: {
          'public/defs.svg': ['images/svg/minified/*.svg'],
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

    babel: {
      dist: {
        options: {
          sourceMap: true,
          presets: ['babel-preset-es2015'],
        },
        files: {
          'public/scripts/bundle.js': 'scripts/main.js',
        },
      },
    },

    notify: {
      sass: {
        options: {
          title: 'Sass',
          message: 'Sassed!'
        },
      },

      scripts: {
        options: {
          title: 'Scripts',
          message: 'Babelified!',
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

      scripts: {
        files: ['scripts/**/*.js'],
        tasks: ['babel:dist', 'notify:scripts'],
      },

      svg: {
        files: ['images/svg/*.svg'],
        tasks: ['svgmin:dist', 'svgstore'],
      },

      php: {
        files: ['**/*.php'],
      },
    
    }, // watch

  }); // initConfig
  
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('svg', ['svgmin:dist', 'svgstore']);

}; // exports

