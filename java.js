document.addEventListener('DOMContentLoaded', function () {
    const searchIconDiv = document.querySelector('.searchIconDiv');
    const searchInput = document.createElement('input');
    searchInput.setAttribute('type', 'text');
    searchInput.setAttribute('placeholder', 'Search');
    searchInput.classList.add('form-control');
    searchInput.style.display = 'none';

    searchIconDiv.addEventListener('click', function () {
        searchInput.style.display = searchInput.style.display === 'none' ? 'block' : 'none';
        if (searchInput.style.display === 'block') {
            searchInput.focus();
        }
    });

    document.addEventListener('click', function (event) {
        const isClickInside = searchIconDiv.contains(event.target) || searchInput.contains(event.target);
        if (!isClickInside) {
            searchInput.style.display = 'none';
        }
    });

    searchIconDiv.appendChild(searchInput);
});


document.addEventListener('DOMContentLoaded', function () {
    const dropdownBtn = document.querySelector('.dropdown-btn');
    const dropdownBox = document.getElementById('dropdownBox');

    dropdownBtn.addEventListener('click', function () {
        dropdownBox.style.display = dropdownBox.style.display === 'none' ? 'block' : 'none';
    });

    window.addEventListener('click', function (event) {
        if (!event.target.matches('.dropdown-btn')) {
            dropdownBox.style.display = 'none';
        }
    });
});


document.addEventListener('DOMContentLoaded', function () {
    const searchIconDiv = document.querySelector('.searchIconDiv');
    const searchInput = document.createElement('input');
    searchInput.setAttribute('type', 'text');
    searchInput.setAttribute('placeholder', 'Search');
    searchInput.classList.add('form-control');
    searchInput.style.display = 'none';

    
    

    searchIconDiv.appendChild(searchInput);
});

