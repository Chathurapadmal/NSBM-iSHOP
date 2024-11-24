document.addEventListener("DOMContentLoaded", function() {
    const searchIcon = document.querySelector('.material-symbols-outlined');
    if (searchIcon) {
        searchIcon.addEventListener('click', function() {
            const query = document.querySelector('.searchBar').value;
            if (query) {
                window.location.href = `/search.html?query=${encodeURIComponent(query)}`;
            } else {
                alert("Please enter a search term.");
            }
        });
    } else {
        console.error("Search icon not found.");
    }
});