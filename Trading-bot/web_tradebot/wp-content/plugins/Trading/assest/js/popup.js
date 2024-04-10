function popup() {
    let cards = document.getElementsByClassName('card');
    let postId;
    for (var i = 0; i < cards.length; i++) {
        cards[i].addEventListener('click', function (e) {
            e.stopPropagation();
            let popup = document.getElementById('popup1');
            popup.style.display = 'block';
            postId = e.target.closest('.card').getAttribute('post_id');
            popup.classList.add("overlay");
            // Transfer data using AJAX
            let loadingButton = '<div class="lds-ring" id="loading-button" style="display: block"><div></div><div></div><div></div><div></div></div>'
            popup.innerHTML = loadingButton;
            // Transfer data using HTTP REQUEST
            var xhr = new XMLHttpRequest();
            var method = 'POST'; // or 'POST' if you're sending data
            xhr.open(method, popup_ajax_object.ajax_url, true);
            xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
            xhr.onload = function () {
                if (xhr.status >= 200 && xhr.status < 400) {
                    var response = JSON.parse(xhr.responseText);
                    popup.innerHTML = response.data;

                    let closeButton = document.getElementById('okdDialogCloseBtn1');

                    closeButton.addEventListener('click', function(e) {
                        let popup = document.getElementById('popup1');
                        popup.style.display = 'none';
                        popup.classList.remove("overlay");
                    })
                    
                } else {
                    console.error('Request failed with status:', xhr.status);
                }
                // executeChart();
                executePopupChart();
                changeTab();
            };
            xhr.onerror = function () {
                loadingButton.style.display = 'none';
                console.error('Request failed');
            };
            xhr.send('action=my_ajax_action&id=' + postId); // Replace with your action name
        })
    }
}

document.addEventListener('DOMContentLoaded', function () {
    popup();
});