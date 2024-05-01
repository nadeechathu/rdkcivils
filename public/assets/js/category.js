// Add new category scripts ============================

function showCategorySelector() {

    let addAs = document.getElementById('cat_type').value;
    console.log('val === ', addAs);
    let categorySelector = document.getElementById('category_for_sub_category');

    if (addAs === "1") {
        categorySelector.style.display = 'block';
    } else {
        categorySelector.style.display = 'none';
    }
}

//end
var x = 1;

function validateImage(id, event) {
    let imagePreview = document.getElementById('img-result-output' + id);

    if (imagePreview != null) {

        imagePreview.remove();
    }

    let validationError = document.getElementById('img-validation-result' + id);
    validationError.innerHTML = '';

    var isValid = (/\.(gif|jpe?g|png)$/i).test(event.target.value);
    if (!isValid) {
        validationError.innerHTML = "Only gif, jpg, jpeg, png image types are allowed."
    } else {
        let image = document.getElementById('image' + id);

        if (image != null) {
            var output = document.createElement('img');
            output.id = 'img-result-output' + id;
            output.style.cssText = 'width:100%';
            output.src = URL.createObjectURL(event.target.files[0]);
            image.after(output);
        }

    }
}
//end add new category scripts ============================