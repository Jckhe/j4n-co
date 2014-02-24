Sass::Tree::RuleNode.class_eval do 

    def debug_info
      filepath = URI.escape(File.expand_path(filename)).gsub('/root/', '/Volumes/sandbox/root/')
      #p "file://" + filepath
      {:filename => filename && ("file://" + filepath),
       :line => self.line}
    end

end