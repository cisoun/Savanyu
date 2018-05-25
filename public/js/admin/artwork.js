import { showErrorsInForm, toTop } from '../helpers.js';

var id = $('#id').val();
var dropzone = $('div#dropzone-form');
var editor = $('#editor');
var form = $('#form-artwork');
var columnsRow = $('#columns-row');

var formInputs = ['title'];

//
// Editor
//

editor.wysiwyg();
editor.html(artwork.text);

//
// Dropzone
//
Dropzone.autoDiscover = false;

dropzone = new Dropzone('#dropzone-form', {
    url: '/file/post',
    uploadMultiple: true,
    acceptedFiles: 'image/jpg;image/jpeg',
    previewTemplate: document.querySelector('#dropzone-template').innerHTML
});

// Make the dropzone sortable.
$('div#dropzone-form').sortable({
    items:'.dz-preview',
    cursor: 'move',
    opacity: 0.5,
    containment: 'div#dropzone',
    distance: 20,
    tolerance: 'pointer'
});

//Add existing files into dropzone
if ('uploads' in artwork) {
    for (var i = 0; i < artwork.uploads.length; i++) {
        var thumbnail = artwork.uploads[i].name;
        var file = { name: i, size: 0 };
        dropzone.emit("addedfile", file);
        dropzone.emit("thumbnail", file, thumbnail);
        dropzone.emit("complete", file);   
    }
}

//
// Columns
//

$('#type').change(function() {
    var index = $('#type').val();
    if (index == 0)
        columnsRow.hide();
    else
        columnsRow.show();
});

columnsRow.hide();

//
// Form
//

// process the form
form.submit(function(event) {
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

    var formData = new FormData($(this)[0]);
    formData.append('text', editor.html());


    // get the form data
    // there are many ways to get this data using jQuery (you can use the class or id also)
    /*var formData = {
        'title'             : $('#title').val(),
        'category_id'       : $('#category').val(),
        'text'              : editor.cleanHtml(),
        'description'       : $('#description').val(),
    };*/

    for (var i = 0; i < dropzone.files.length; i++)
        formData.append('file' + i, dropzone.files[i]);

    var update = artwork.id > 0;

    // Process the form
    $.ajax({
        type        : 'POST', // POST only. PATCH doesn't work for form-data (Laravel bug).
        url         : update ? 'update' : 'store', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true,
        cache       : false,
        contentType : false,
        processData : false
    })
    // using the done promise callback
    .done(function(data) {

        // here we will handle errors and validation messages
        $(".alert").alert('close');
        $('#alert-success').after($('#alert-success').html());
        toTop();
    })
    .fail(function(data) {        
        $(".alert").alert('close');
        $('#alert-error').after($('#alert-error').html());
        toTop();        
        
        showErrorsInForm(formInputs, data);
    });

});
