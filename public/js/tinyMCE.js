$(function() {
    tinymce.init({
        selector: '.add-post-content textarea',
        language: 'fr_FR',
        language_url: 'http://localhost:8888/Projet4/public/js/langs/fr_FR.js',
        theme: 'modern',
        height: 400,
        width: '100%',

        plugins: ['advlist autolink link lists charmap print preview hr anchor pagebreak',
                  'searchreplace wordcount visualblocks visualchars insertdatetime media nonbreaking',
                  'table contextmenu directionality emoticons paste textcolor code'
                 ],
        toolbar1: 'undo redo | bold italic uderline | alignleft aligncenter alignright alignjustify | bullist numlist outdent indent',
        toolbar2: '| link unlink anchor | forecolor backcolor | print preview code | caption'
    });
});

