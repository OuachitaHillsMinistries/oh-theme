# oh-theme
Theme for Ouachita Hills Ministries' website

## Setting Up Sass Compilation in PhpStorm

These instructions are only for the purpose of setting up your development environment. When pushing to production, 
`style.scss` is automatically compiled with the help of a GIT hook. All `.css` files are ignored in `.gitignore`.

### Mac OS X 10.6.8

1. In a terminal, run `gem install sass`.
2. Run `which sass` and copy down the complete path for later.
2. Open the `oh-theme` folder in PhpStorm.
3. Open `style.scss` for editing.
4. A green info bar should appear at the top of the editor. Click "Add watcher."
5. In the dialog that appears, paste the path to the sass gem into the "Program" field. For my 
installation, the path was `/Users/masteredit3/.gem/ruby/1.8/bin/sass`.

## Based On
BlankSlate WordPress Theme

Demo: http://wp-themes.com/blankslate/

Download: http://wordpress.org/themes/blankslate
