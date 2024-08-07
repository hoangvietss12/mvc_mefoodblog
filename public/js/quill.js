var Font = Quill.import('formats/font');
Font.whitelist = ['default', 'nunito-sans', 'unna'];
Quill.register(Font, true);

const quill = new Quill('#editor', {
    modules: {
      toolbar: [
        [{ font: Font.whitelist }],
        ['bold', 'italic'],
        ['link', 'blockquote', 'code-block', 'image'],
        [{ list: 'ordered' }, { list: 'bullet' }],
      ],
    },
    theme: 'snow',
});