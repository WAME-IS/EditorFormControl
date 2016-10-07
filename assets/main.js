//CKEDITOR.replace( 'editor' );
$(function() {
    tinyMCE.baseURL = '/components/tinymce';
    tinyMCE.suffix = '.min';
    tinyMCE.init({
        selector: '.editor',
        schema: 'html5',
        menubar: false,
        elementpath: true,
        theme: 'modern',
//        skin: 'light',
//        language : 'sk',
//        language_url: "/sk/sk.js",
        plugins: [
            'autoresize code link image print preview anchor fullscreen emoticons charmap searchreplace visualblocks media table paste codesample hr pagebreak nonbreaking spellchecker template',
            'advlist autolink lists contextmenu',
            'colorpicker directionality importcss layer legacyoutput noneditable textcolor textpattern visualchars wordcount'
        ],
        toolbar1: 'undo redo | preview paste searchreplace print | template spellchecker | code codesample visualblocks fullscreen',
        toolbar2: 'styleselect forecolor backcolor | bold italic underline | alignleft aligncenter alignright alignjustify | nonbreaking hr pagebreak | bullist numlist | outdent indent | link anchor image imagetools media table | charmap emoticons',
        autoresize_bottom_margin: 0,
        autoresize_max_height: 500
    });
});
