function imageconvertor()
{
    var reader = new FileReader();
    var x = document.forms["uploadForm"]["fileUploading"].files[0];
    var y = reader.readAsDataURL(x);
    reader.onload = imageIsLoaded;
};

function imageIsLoaded(e) {
      //  $('#myImg').attr('src', e.target.result);
      //  $('#yourImage').attr('src', e.target.result);
};