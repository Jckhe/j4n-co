#COMPASS config file

# General
#require './sass_debug_overide'
require 'autoprefixer-rails'

output_style = :compressed
line_comments = false
relative_assets = true
sass_dir = "styles/sass"
css_dir = "styles"
fonts_dir = "fonts"
javascripts_dir="javascripts"
images_dir="images"
project_type="stand_alone"
environment="production"
sass_options = {:sourcemap => true }


on_stylesheet_saved do |file|
  css = File.read(file)
  File.open(file, 'w') do |io|
    io << AutoprefixerRails.process(css, browsers: ["last 4 version", "> 4%"])
  end
end

livereload = true
#sass_options = { :debug_info => [true, :replace => ['..', :with=> 'summ' ] }

#debug_info = true