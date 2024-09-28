<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Widget</title>
    <style>
        / Basic styles for the modal /
        .modal {
            display: none;
            position: fixed;
            z-index: 999;
            left: 0;
            top: 0;
            width: 100%;
            height: 100%;
            background-color: rgba(0, 0, 0, 0.5);
            justify-content: center;
            align-items: center;
        }

        .modal-content {
            background-color: #fff;
            position: fixed;
            width: 100%;
            height: 100%;
            margin: 0 auto;
            border-radius: 8px;
            overflow: hidden;
            top:0;
        }

        .close-btn {
            position: absolute;
            top: 10px;
            right: 20px;
            font-size: 30px;
            cursor: pointer;
            color:#fff;
            z-index:2;

        }

        / Content container inside modal /
        #embedContainer {
            width: 100%;
            height: 100%;
            overflow: auto; / Ensure scrolling if content is large /
        }

        #designModal{
            display: none;
        }

        #designModal .widget-modal{
            width: 100%;
            /* height: 100%; */
            overflow: auto;
            margin: 0
        }
    </style>
</head>

<body>
    <!-- Design Now Button -->
    <button id="designNowBtn">Design Now</button>

    <!-- Modal structure -->
    <div id="designModal" class="modal designmodal_popup">
        <div class="modal-content widget-modal">
            <span class="close-btn" id="closeModal">&times;</span>
            <!-- The modal content where the UI will be loaded -->
            <div id="embedContainer"></div>
        </div>
    </div>

    <script>
        // Get elements
        const designNowBtn = document.getElementById('designNowBtn');
        const designModal = document.getElementById('designModal');
        const closeModalBtn = document.getElementById('closeModal');
        const embedContainer = document.getElementById('embedContainer');
        var modalLoaded = false;
        // Function to load the external script dynamically
        function loadExternalScript(src, callback) {
            if(modalLoaded == false){
                const script = document.createElement('script');
                script.src = src;
                script.async = true;
                script.onload = callback;
                embedContainer.appendChild(script); // Append the script to the modal content
                modalLoaded = true ;
            }
        }

        // Open the modal and load the external script
        designNowBtn.addEventListener('click', function () {
            designModal.style.display = 'flex'; // Show modal
            //embedContainer.innerHTML = ''; // Clear previous content
            loadExternalScript('https://widget.homedesigns.ai/embed.js?id=214', function () {
                console.log('Script loaded and UI rendered inside the modal.');
            });
        });

        // Close the modal when the close button is clicked
        closeModalBtn.addEventListener('click', function () {
            designModal.style.display = 'none';
            //$(".selector").tabs("refresh");
            $("#feature-redesign").trigger("click");
            //embedContainer.innerHTML = ''; // Clear the container content to remove the script and UI
        });

        // Close the modal when clicking outside the modal content
        window.addEventListener('click', function (event) {
            if (event.target == designModal) {
                designModal.style.display = 'none';
                $("#feature-redesign").trigger("click");
                //embedContainer.innerHTML = ''; // Clear the container content
            }
        });
    </script>
</body>

</html>
