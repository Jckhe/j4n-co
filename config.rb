require 'middleman-gh-pages'
###
# Blog settings
###
page "work/*", :layout => "project"
page "work", :layout => "index"
page "lab", :layout => "index"
page "/", :layout => "fullscreen"

page "/sitemap.xml", :layout => false

activate :livereload

activate :blog do |blog|
  blog.permalink = "/thoughts/:title.html"
  blog.sources = "/thoughts/:title/index.html"
  # blog.taglink = "tags/:tag.html"
  blog.layout = "blog"
  # blog.summary_separator = /(READMORE)/
  # blog.summary_length = 250
  # blog.year_link = ":year.html"
  # blog.month_link = ":year/:month.html"
  # blog.day_link = ":year/:month/:day.html"
  # blog.default_extension = ".markdown"
  # blog.prefix = ""
  # blog.tag_template = "tag.html"
 blog.calendar_template = "/thoughts/calendar.html"
end

### 
# Compass
###

# Susy grids in Compass
# First: gem install compass-susy-plugin
# require 'susy'

# Change Compass configuration
# compass_config do |config|
#   config.output_style = :compact
# end

###
# Page options, layouts, aliases and proxies
###

# Per-page layout changes:
# 
# With no layout
# page "/path/to/file.html", :layout => false
# 
# With alternative layout
# page "/path/to/file.html", :layout => :otherlayout
# 
# A path which all have the same layout
# with_layout :admin do
#   page "/admin/*"
# end

# Proxy (fake) files
# page "/this-page-has-no-template.html", :proxy => "/template-file.html" do
#   @which_fake_page = "Rendering a fake page with a variable"
# end

###
# Helpers
###

# Automatic image dimensions on image_tag helper
# activate :automatic_image_sizes

# Methods defined in the helpers block are available in templates
# helpers do
#   def some_helper
#     "Helping"
#   end
# end
helpers do

  def article_dir
    pieces = current_page.url.chomp("/").split("/")
    pieces[-1] = File.basename(pieces.last, File.extname(pieces.last))
    pieces.join("/")
  end

  def article_asset_path(path)
    File.join(article_dir, path)
  end

  def article_image_tag(path, *args)
    args.unshift article_asset_path(path)
    image_tag(*args)
  end

end


set :css_dir, 'stylesheets'

set :js_dir, 'javascripts'

set :images_dir, 'images'

# Build-specific configuration
configure :build do
  # For example, change the Compass output style for deployment
  activate :minify_css
  
  # Minify Javascript on build
  #activate :minify_javascript
  
  # Enable cache buster
  activate :cache_buster
  
  # Use relative URLs
   activate :relative_assets
  
  # Compress PNGs after build
  # First: gem install middleman-smusher
  # require "middleman-smusher"
  # activate :smusher
  
  # Or use a different image path
  # set :http_path, "/Content/images/"
end
