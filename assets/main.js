//CKEDITOR.replace( 'editor' );
$(function() {
    tinymce.suffix = '.min';
    tinymce.init({
        selector: '.editor',
        menubar: false,
        elementpath: false,
        theme: 'modern',
        skin: 'light',
        language : 'sk',
        plugins: 'autoresize',
        autoresize_bottom_margin: 0,
        autoresize_max_height: 500
    });
});
