var keyword = document.getElementById('keyword');
var tombolCari = document.getElementById('tombol-cari');
var container = document.getElementById('container');

function searchData(url, queryParam) {
    var xhr = new XMLHttpRequest();

    xhr.onreadystatechange = function() {
        if (xhr.readyState == 4 && xhr.status == 200) {
            container.innerHTML = xhr.responseText;
        }
    }

    xhr.open('GET', url + '?' + queryParam + '=' + keyword.value, true);
    xhr.send();
}

keyword.addEventListener('keyup', function() {
    var currentPage = window.location.pathname;

    if (currentPage.includes('reservasi')) {
        searchData('../search/search_res.php', 'keyword');
    } else if (currentPage.includes('database')) {
        searchData('../search/search_user.php', 'keyword');
    }
});