(function() {
    function encodeFormData(data) {
        return Object.keys(data)
            .map(key => encodeURIComponent(key) + '=' + encodeURIComponent(data[key]))
            .join('&');
    }

    function pagination() {
        var search_input = document.getElementById('search');
        var trading_type = document.getElementById('trading_type');
        var trading_pair = document.getElementById('trading_pair');
        var trading_range = document.getElementById('trading_range');

        var paged = document.querySelectorAll('.pagination a.page-numbers');
        for (var i = 0; i < paged.length; i++) {
            paged[i].addEventListener('click', function(e) {
                e.preventDefault();
                var current_page = document.querySelector('.page-numbers.current')
                var page = Number(e.target.textContent)
                current_page = Number(current_page.textContent);
                if (e.target.classList.contains('prev')) {
                    page = current_page - 1;
                }
                if (e.target.classList.contains('next')) {
                    page = current_page + 1;
                }
                var data = {
                    action: 'search_action',
                    keyword: search_input.value,
                    trading_type: trading_type.value,
                    trading_pair: trading_pair.value,
                    trading_range: trading_range.value,
                    paged: page
                };
                custom_ajax(encodeFormData(data));
            })
        }
    }

    function custom_ajax(data) {
        let loadingButton = '<div class="lds-ring" id="loading-button" style="display: block"><div></div><div></div><div></div><div></div></div>';
        var list_cards = document.getElementById('list_cards');
        list_cards.innerHTML = loadingButton;

        var xhr = new XMLHttpRequest();
        var method = 'POST';
        xhr.open(method, search_ajax_object.ajax_url, true);
        xhr.setRequestHeader('Content-Type', 'application/x-www-form-urlencoded; charset=UTF-8');
        xhr.onload = function() {
            // loadingButton.style.display = 'none';
            if (xhr.status >= 200 && xhr.status < 400) {
                var response = JSON.parse(xhr.responseText);
                var list_cards = document.getElementById('list_cards');
                list_cards.innerHTML = response.data.includes('post_id') ? response.data : '<span style="width: 100%; display: flex; justify-content: center; align-items: center; color: #fff; font-size: 20px;">No Bot Found</span>';
                executeChart();
            } else {
                console.error('Request failed with status:', xhr.status);
            }
            pagination();
            popup();
        }
        xhr.onerror = function () {
            console.error('Request failed');
        };
        xhr.send(data);
       
    }

    document.addEventListener('DOMContentLoaded', function() {
        var search_input = document.getElementById('search');
        var trading_type = document.getElementById('trading_type');
        var trading_pair = document.getElementById('trading_pair');
        var trading_range = document.getElementById('trading_range');

        // Pagination
        pagination();

        // Filter by Trading Type
        trading_type.addEventListener('change', function(e) {
            var data = {
                action: 'search_action',
                keyword: search_input.value,
                trading_type: e.target.value,
                trading_pair: trading_pair.value,
                trading_range: trading_range.value,
                paged: 1
            };
            custom_ajax(encodeFormData(data));
        })

        // Filter by Trading Pair
        trading_pair.addEventListener('change', function(e) {
            var data = {
                action: 'search_action',
                keyword: search_input.value,
                trading_type: trading_type.value,
                trading_pair: e.target.value,
                trading_range: trading_range.value,
                paged: 1
            };
            custom_ajax(encodeFormData(data));
        })

        // Filter by Trading Range
        trading_range.addEventListener('change', function(e) {
            var data = {
                action: 'search_action',
                keyword: search_input.value,
                trading_type: trading_type.value,
                trading_pair: trading_pair.value,
                trading_range: e.target.value,
                paged: 1
            };
            custom_ajax(encodeFormData(data));
        })

        // Search
        search_input.addEventListener('change', function(e) {
            var data = {
                action: 'search_action',
                keyword: e.target.value,
                trading_type: trading_type.value,
                trading_pair: trading_pair.value,
                trading_range: trading_range.value,
                paged: 1
            };
            custom_ajax(encodeFormData(data));
        }) 
    })
})()


