#CSS Architecture

Using SCSS as a pre-processor, files are organized in the following structure:

- elements
- modules
- settings
- _layout.scss
- style.scss

A mix of SMACSS and BEM principles are used. The SMACSS principles include seperating layout concerns from module concerns. All layout is placed into a  `_layout.scss` file and all layout styles are prefixed with `ł`. Layout styles are all grouped together and start with a `.ł` prefix. Modules are layout agnostic and could in theory be placed in different positions.

Modules follow BEM naming conventions.


##Development
run from this directory with:
$ sass --watch ./scss:./css
$ python -m SimpleHTTPServer 8000
