function readUploadedImage(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            let attributes = {'src': e.target.result, 'height': 200, 'width': 150};
            for (let key in attributes) {
                document.getElementById('blah').setAttribute(key, attributes[key]);
            }
            document.getElementById('image-preview-container').classList.remove('hidden');
        };

        reader.readAsDataURL(input.files[0]);
    }
}