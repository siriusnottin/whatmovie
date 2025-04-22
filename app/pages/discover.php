<?php

require_once dirname(__DIR__) . '/bootstrap.php';

use App\Core\Page;
use App\Core\View;

$page = new Page([
    'slug' => 'discover',
    'title' => 'Discover Movies - Whaat Movie?',
    'lang' => 'en',
    'description' => 'Find and explore movies to add to your watchlist.',
    'pageTemplate' => 'discover',
]);

// Start output buffering
ob_start();
?>
<section class="hero"
    style="background: linear-gradient(to top, rgba(15, 4, 29, 1), rgba(12, 3, 23, 0.08), rgba(12, 3, 23, 0)), url('/public/uploads/movie-poster-full.webp') no-repeat center center / cover;">
    <article class="movie-card">
        <div class="movie-poster">
            <img src="/public/uploads/movie-poster.webp" alt="Movie Poster" class="poster">
        </div>
        <div>
            <div class="movie-title">
                <h2 class="hidden">Movie Title</h2>
                <img src="/public/uploads/movie-logo.webp" alt="Movie Logo" class="logo">
            </div>
            <div class="movie-info">
                <div class="movie-details">
                    <div class="rating">
                        <i class="ci-Star"></i>
                        <span>6.2</span>
                    </div>
                    <span class="release-date-year">2025</span>
                    <span class="duration">109 min</span>
                </div>
                <div class="movie-actions">
                    <a href="/add-to-watchlist?movieId=1" class="btn btn-icon-circle btn-add"><i
                            class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
                </div>
            </div>
        </div>
    </article>
    <a href="#" class="btn btn-icon-circle btn-play"><i class="ci-Play"></i><span class="btn-text">Play Now!</span></a>
</section>
<main>

</main>
<?php
$content = ob_get_clean();

// Render the page using the View class
echo View::render(dirname(__DIR__) . '/templates/layout.php', [
    'page' => $page,
    'content' => $content,
]);
