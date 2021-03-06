module.exports = function(grunt) {

  grunt.loadNpmTasks("grunt-contrib-watch");
  grunt.loadNpmTasks("grunt-autoprefixer");
  grunt.loadNpmTasks("grunt-contrib-sass");
  grunt.loadNpmTasks("grunt-notify");
  grunt.loadNpmTasks("grunt-svgmin");
  grunt.loadNpmTasks("grunt-svgstore");
  grunt.loadNpmTasks("grunt-babel");
  grunt.loadNpmTasks("grunt-contrib-imagemin");
  grunt.loadNpmTasks("grunt-newer");
  grunt.loadNpmTasks("grunt-contrib-uglify");
  grunt.loadNpmTasks("grunt-contrib-cssmin");

  grunt.initConfig({

    svgstore: {
      default: {
        options: {
          svg: {
            xmlns: 'http://www.w3.org/2000/svg',
            width: '0',
            height: '0',
          },
        },
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

    imagemin: {
      options: {
        optimizationLevel: 7,
        progressive: false,
      },
      default: {
        files: [{
          expand: true,
          cwd: 'images',
          src: ['**/*.{png,jpg,gif}'],
          dest: 'public/images',
        }],
      },
    },

    cssmin: {
      dist: {
        options: {
          sourceMap: true,
        },
        files: [{
          expand: true,
          cwd: '.',
          src: 'style.css',
          dest: '.',
          ext: '.min.css',
        }],
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

    uglify: {
      dist: {
        options: {
          
        },
        files: {
          'public/scripts/bundle.min.js': 'public/scripts/bundle.js',
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

      images: {
        options: {
          title: 'Images',
          message: 'Optimized!',
        },
      },

      scripts: {
        options: {
          title: 'Scripts',
          message: 'Babelified! Uglified!',
        },
      },

      php: {
        options: {
          title: 'PHP File',
          message: 'Updated!',
        },
      },

      svg: {
        options: {
          title: 'SVG',
          message: 'Optimized!',
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

      images: {
        files: ['images/**/*.{jpg,gif,png}'],
        tasks: ['newer:imagemin', 'notify:images'],
      },
      
      styles: {
        files: ['sass/**/*.scss'],
        tasks: ['sass:dist', 'notify:sass', 'autoprefixer:css', 'cssmin:dist'],
      },

      scripts: {
        files: ['scripts/**/*.js'],
        tasks: ['babel:dist', 'uglify:dist', 'notify:scripts'],
      },

      svg: {
        files: ['images/svg/*.svg'],
        tasks: ['svgmin:dist', 'svgstore', 'notify:svg'],
      },

      php: {
        files: ['./**/*.php'],
        tasks: ['notify:php'],
      },
    
    }, // watch

  }); // initConfig
  
  grunt.registerTask('default', ['watch']);
  grunt.registerTask('svg', ['svgmin:dist', 'svgstore']);
  grunt.registerTask('images', ['newer:imagemin']);
}; // exports

