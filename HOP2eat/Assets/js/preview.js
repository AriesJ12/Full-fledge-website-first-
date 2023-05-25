function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById("main_picture");
    var reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
    };  
    reader.readAsDataURL(input.files[0]);
}