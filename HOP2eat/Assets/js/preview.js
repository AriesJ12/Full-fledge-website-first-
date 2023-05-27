function previewImage(event) {
    var input = event.target;
    var preview = document.getElementById("main_picture");
    var reader = new FileReader();
    reader.onload = function() {
        preview.src = reader.result;
    };  
    reader.readAsDataURL(input.files[0]);
}

function previewText()
{
    var title = document.getElementById("name").value;
    if(title === ""){title = "Preview Title"};
    var address = document.getElementById("location").value;
    if(address === ""){address = "Preview Address"};
    var description = document.getElementById("description").value;
    if(description === ""){description = "Preview Description"};

    
    var targetTitle = document.getElementById("main_title");
    targetTitle.innerText = title;

    var targetAddress = document.getElementById("main_address");
    targetAddress.innerText = address;

    var targetDescription = document.getElementById("main_description");
    targetDescription.innerText = description;

}