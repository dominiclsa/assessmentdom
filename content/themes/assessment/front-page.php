<?php
/**
 * Template: Front Page
 */
get_header(); ?>

<main class="site-main">
    <h1>Featured Movies</h1>

    <div id="movie-list" class="movie-grid">
        <!-- Movie posts will be injected here -->
    </div>

    <div id="loading" style="text-align: center; margin: 20px 0; display: none;">
        <em>Loading more movies...</em>
    </div>
</main>

<script>
let page = 1;
let loading = false;
let initialLoad = true;
const container = document.getElementById('movie-list');
const loadingIndicator = document.getElementById('loading');

function getMoviesPerScreen() {
    const movieCardHeight = 300; 
    const screenHeight = window.innerHeight;
    const rows = Math.ceil(screenHeight / movieCardHeight);
    const columns = Math.floor(container.offsetWidth / 300) || 1; 
    return rows * columns;
}

function loadMovies(perPage = 5) {
    if (loading) return;
    loading = true;
    loadingIndicator.style.display = 'block';

    fetch(`/wp-json/wp/v2/movies?per_page=${perPage}&page=${page}`)
        .then(res => {
            if (!res.ok) throw new Error("No more posts");
            return res.json();
        })
        .then(data => {
            data.forEach(movie => {
                const div = document.createElement('div');
                div.classList.add('movie-card');

                const imageUrl = `https://picsum.photos/seed/${movie.id}/400/250`;

                div.innerHTML = `
                    <a href="${movie.link}">
                        <img src="${imageUrl}" alt="${movie.title.rendered}" />
                        <h2>${movie.title.rendered}</h2>
                    </a>
                    <p>${movie.excerpt.rendered}</p>
                `;

                container.appendChild(div);
            });

            if (data.length < perPage) {
                window.removeEventListener('scroll', handleScroll);
                loadingIndicator.innerHTML = "<em>No more movies to load.</em>";
            } else {
                page++;
                loading = false;
                loadingIndicator.style.display = 'none';
            }
        })
        .catch(() => {
            window.removeEventListener('scroll', handleScroll);
            loadingIndicator.innerHTML = "<em>No more movies to load.</em>";
        });
}

function handleScroll() {
    const scrollY = window.scrollY;
    const viewportHeight = window.innerHeight;
    const fullHeight = document.body.offsetHeight;

    if (scrollY + viewportHeight >= fullHeight - 200) {
        loadMovies(5); // Load 5 at a time after first load
    }
}

window.addEventListener('DOMContentLoaded', () => {
    const perPage = getMoviesPerScreen();
    loadMovies(perPage);
    window.addEventListener('scroll', handleScroll);
});
</script>


<?php get_footer(); ?>
