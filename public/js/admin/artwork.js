Dropzone.autoDiscover = false;

var dropzone = $('div#dropzone-form');
var editor = $('#editor');
var form = $('#form-artwork');
var columnsRow = $('#columns-row');

editor.wysiwyg();

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

$('#type').change(function() {
    var index = $('#type').val();
    if (index == 0)
        columnsRow.hide();
    else
        columnsRow.show();
});

columnsRow.hide();

// process the form
form.submit(function(event) {
    // stop the form from submitting the normal way and refreshing the page
    event.preventDefault();

    var formData = new FormData($(this)[0]);
    console.log(formData);
    formData.append('text', editor.cleanHtml());


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

    // process the form
    $.ajax({
        type        : 'POST', // define the type of HTTP verb we want to use (POST for our form)
        url         : 'store', // the url where we want to POST
        data        : formData, // our data object
        dataType    : 'json', // what type of data do we expect back from the server
        encode      : true,
        cache: false,
        contentType: false,
        processData: false
    })
    // using the done promise callback
    .done(function(data) {

        // log data to the console so we can see
        console.log(data);

        // here we will handle errors and validation messages
    })
    .fail(function(data) {
        console.log(data);
    });

});
