function handleFileSelect(evt) {
    var file = evt.target.files; // FileList object
    var f = file[0];

    var reader = new FileReader();
    // Closure to capture the file information.
    reader.onload = (function(theFile) {
        return function(e) {
            // Render thumbnail.
            var span = document.createElement('div');
            span.id = "del";
            span.innerHTML = ['<img class="thumb" title="', decodeURI(theFile.name), '" src="', e.target.result, '" />'].join('');
            document.getElementsByClassName('upload_photo_preview')[0].appendChild(span);
            window.a = e.target.result;
        };
    })(f);
    // Read in the image file as a data URL.
    if (f && f.type.match('image.*')) {
        reader.readAsDataURL(f);
    }
}
document.getElementById('fileToUpload').addEventListener('change', handleFileSelect, false);
