//CKEDITOR.replace( 'editor' );
$(function() {
    tinyMCE.baseURL = '/components/tinymce';
    tinyMCE.suffix = '.min';
    tinyMCE.init({
        selector: '.editor',
        menubar: false,
        elementpath: true,
        theme: 'modern',
//        skin: 'light',
//        language : 'sk',
//        language_url: "/sk/sk.js",
        plugins: 'autoresize',
        autoresize_bottom_margin: 0,
        autoresize_max_height: 500
    });
});
