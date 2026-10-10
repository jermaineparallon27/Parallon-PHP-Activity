<main>
  <section class="hero">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <p id="welcome" class="welcome-message" aria-live="polite">Welcome, <?= e($_SESSION['user'] ?? 'guest') ?>!</p>
          <h1>Find your next destination.</h1>
          <p class="my-4">Hand-picked trips to Batangas, with boats, stays and guides already sorted.</p>
          <div class="d-flex flex-wrap gap-3">
            <a href="#destinations" class="btn btn-sun">Browse trips</a>
            <a href="#book" class="btn btn-glass">Plan your trip</a>
          </div>
        </div>
      </div>
    </div>
  </section>

  <section id="destinations" aria-labelledby="dest-title">
    <div class="container">
      <h2 class="section-title" id="dest-title">Popular destinations</h2>
      <p class="mb-4 opacity-75">Three trips travelers book most.</p>
      <div class="row g-4">
        <div class="col-md-6 col-lg-4">
          <article class="glass dest-card">
            <div class="dest-img"><img src="https://dynamic-media-cdn.tripadvisor.com/media/photo-o/1a/03/df/10/img-5bd9789d25f10d176857658901.jpg?w=1200&amp;h=-1&amp;s=1" alt="Tower of Peace | Montemaria Shrine" loading="lazy"></div>
            <div class="body">
              <h3>Mother of All Asia – Tower of Peace / Montemaria Shrine</h3>
              <p>The statue doubles as a building consisting of several Marian chapels and prayer rooms, overlooking the vast grounds.</p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-lg-4">
          <article class="glass dest-card">
            <div class="dest-img"><img src="https://encrypted-tbn0.gstatic.com/images?q=tbn:ANd9GcS18T6_IiIvNcoQHaiyKLFmY3O3JWMGk87BXNCLWoia8w&amp;s=10" alt="Minor Basilica and Parish of the Immaculate Conception" loading="lazy"></div>
            <div class="body">
              <h3>Minor Basilica and Parish of the Immaculate Conception</h3>
              <p>Established in 1614, this historical church was built with a neoclassical design. It was first built as a parish in 1581 and underwent developments until it achieved its current structure.</p>
            </div>
          </article>
        </div>
        <div class="col-md-6 col-lg-4 mx-md-auto">
          <article class="glass dest-card">
            <div class="dest-img"><img src="https://www.thepoortraveler.net/wp-content/uploads/2012/04/Plaza-Mabini.jpg" alt="Plaza Mabini, Batangas City" loading="lazy"></div>
            <div class="body">
              <h3>Plaza Mabini</h3>
              <p>Plaza Mabini remains one of the popular Batangas City tourist attractions to this day. It features two water fountains, a gazebo, and public restrooms.</p>
            </div>
          </article>
        </div>
      </div>
    </div>
  </section>

  <section id="why" aria-labelledby="why-title">
    <div class="container">
      <h2 class="section-title mb-4" id="why-title">Why travel with Batangas</h2>
      <div class="row g-4">
        <div class="col-md-4"><div class="glass feature"><div class="icon" aria-hidden="true">🛶</div><h3 class="h5 mt-2">Transfers included</h3><p class="mb-0">Boats, vans and buses are booked for you.</p></div></div>
        <div class="col-md-4"><div class="glass feature"><div class="icon" aria-hidden="true">🏝️</div><h3 class="h5 mt-2">Local guides</h3><p class="mb-0">Every trip is led by someone from the province.</p></div></div>
        <div class="col-md-4"><div class="glass feature"><div class="icon" aria-hidden="true">💬</div><h3 class="h5 mt-2">Free rebooking</h3><p class="mb-0">Weather changes your plans? Move your dates at no cost.</p></div></div>
      </div>
    </div>
  </section>

  <section id="book" aria-labelledby="book-title">
    <div class="container">
      <div class="glass cta">
        <h2 class="section-title" id="book-title">Ready to go?</h2>
        <p class="mb-4">Your next Batangas trip is just a few steps away.</p>
        <a href="#destinations" class="btn btn-sun">Explore destinations</a>
      </div>
    </div>
  </section>
</main>
