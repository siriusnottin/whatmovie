<?php require_once dirname((__DIR__)) . '/partials/_header.php'; ?>

<section data-page="discover" class="hero" style="background: linear-gradient(to top, rgba(15, 4, 29, 1), rgba(12, 3, 23, 0.08), rgba(12, 3, 23, 0)), url('/uploads/movie-poster-full.webp') no-repeat center center / cover;">
  <article class="movie-card">
    <div class="movie-poster">
      <img src="/uploads/movie-poster.webp" alt="Movie Poster" class="poster">
    </div>
    <div>
      <div class="movie-title">
        <h2 class="hidden">Movie Title</h2>
        <img src="/uploads/movie-logo.webp" alt="Movie Logo" class="logo">
      </div>
      <div class="movie-info">
        <div class="movie-details">
          <span class="rating">6.2</span>
          <span class="release-date-year">2025</span>
          <span class="duration">109 min</span>
        </div>
        <div class="movie-actions">
          <a href="/add-to-watchlist?movieId=1" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
        </div>
      </div>
    </div>

  </article>
  <a href="#" class="btn btn-icon-circle btn-play"><i class="ci-Play"></i><span class="btn-text">Play Now!</span></a>
  
</section>
<main>
  <section class="test">
    <h2>Test</h2>
    <div class="row movies">
      <?php

      require_once dirname((__DIR__)) . '/configs/database.php';

      $sql = "SELECT * FROM movie";
      $stmt = $pdo->prepare($sql);
      $stmt->execute();
      $movies = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($movies as $movie) {
        echo $movie['title'];
      }
      $sql = "SELECT * FROM media WHERE id = :id";
      $stmt = $pdo->prepare($sql);
      $stmt->bindParam(':id', $movie['id']);
      $stmt->execute();
      $media = $stmt->fetchAll(PDO::FETCH_ASSOC);
      foreach ($media as $mediaItem) {
        echo '<img src="' . $mediaItem['path'] . '" alt="Movie Poster" class="poster w-100">';
      }
      ?>
<?php
      if (isset($_POST['movie-name'])) {
        $movieName = $_POST['movie-name'];
        $sql = "UPDATE movie SET title = :title, updated_at = NOW() WHERE id = :id";
        $stmt = $pdo->prepare($sql);
        $stmt->bindParam(':title', $movieName);
        $stmt->bindParam(':id', $movie['id']);
        $stmt->execute();
        echo "Movie name updated to: " . htmlspecialchars($movieName);
        header("Location: " . $_SERVER['PHP_SELF']);
        exit();
      }
      ?>
      <form action="" method="POST">
        <input type="text" name="movie-name" id="movie-name" placeholder="Movie Name">
        <input type="submit" value="Update">
      </form>

      
    </div>
  </section>
  <section class="last-seen">
    <h2>Last Seen</h2>
    <div class="row movies">
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
      <article class="movie-card">
        <div class="movie-poster">
          <img src="/uploads/flow_affiche_web_fc.jpg" alt="Last Seen Movie Poster" class="poster">
        </div>
        <div class="movie-info">
            <div>
                <h3>Holland</h3>
              <div class="movie-details">
                <time class="duration" datetime="PT109M">109 min</time>
                <time class="release-date-year" datetime="2025">2025</time>
              </div>
              <div class="movie-genres">
                <span class="genre">Action</span>
              </div>
            </div>
            <div class="movie-actions">
              <a href="/add-to-watchlist?movieId=2" class="btn btn-icon-circle btn-add"><i class="ci-Heart_01"></i><span class="btn-text hidden">Add to Watchlist</span></a>
            </div>
          </div>
      </article>
    </div>
  </section>
</main>

<?php require_once dirname((__DIR__)) . '/partials/_footer.php'; ?>
