<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Counter</title>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
</head>
<body>
    <input class="btnclass" type="button" name="button" value="Click me" onclick="incrementCounter()">
    <label id="counterLabel" for="button">0</label>
    <br>

    <input type="file" id="fileInput" accept="image/*" style="display: none;" onchange="displayImage(event)">
    <button onclick="document.getElementById('fileInput').click();">Select Image</button>
    <img id="selectedImage" style="padding:5px; display: none;">

    <script>
        function incrementCounter() {
            let currentValue = parseInt($('#counterLabel').text());
            $.ajax({
                url: 'increment_counter.php',
                type: 'POST',
                data: { counter: currentValue },
                success: function(response) {
                    $('#counterLabel').text(response);
                }
            });
        }
        function displayImage(event) {
            const file = event.target.files[0];
            if (file) {
                const reader = new FileReader();
                reader.onload = function(e) {
                    document.getElementById('selectedImage').src = e.target.result;
                    document.getElementById('selectedImage').style.display = 'block';
                };
                reader.readAsDataURL(file);
            }
        }
    </script>
</body>
</html>
