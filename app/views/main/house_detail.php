<div class="row align-items-start">
    <!-- Text Info -->
    <div class="col-md-5" id="left-column">
        <h3 class="mb-3"><?= $house['nom_type'] ?></h3>
        <!-- Used for js -->
        <input type="hidden" id="habitation_id" value="<?= $house['habitation_id'] ?>">
        <p><?= $house['description'] ?></p>
        <p>
            <strong data-translate="rooms_label">Rooms</strong>: <?= $house['chambres'] ?>
        </p>
        <p>
            <strong data-translate="rent_per_day_label">Rent per day</strong>: <?= $house['loyer_par_jour'] ?> €
        </p>
        <p>
            <strong data-translate="neighborhood_label">Neighborhood</strong>: <?= $house['quartier'] ?>
        </p>


        <!-- Reservation Form -->
        <form action="<?= $baseUrl ?>/main/house/reserve" id="reservationForm" class="mt-5 p-3 border rounded shadow-sm">
            <h4 class="mb-3" data-translate="reserve_this_house">Reserve this house</h4>
            <div class="row g-3">
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="arrivalDate" class="form-label" data-translate="arrival_date">Arrival date</label>
                        <input type="date" id="arrivalDate" name="arrivalDate" class="form-control" required>
                    </div>
                </div>
                <div class="col-md-6 col-12">
                    <div class="mb-3">
                        <label for="departureDate" class="form-label" data-translate="departure_date">Departure
                            date</label>
                        <input type="date" id="departureDate" name="departureDate" class="form-control" required>
                    </div>
                </div>
            </div>
            <button type="submit" class="btn btn-primary w-100" data-translate="reserve_now">Reserve Now</button>
            <div id="responseMessage" class="mt-2 d-none px-3"></div>
        </form>

    </div>

    <!-- Photos Section -->
    <div class="col-md-7">
        <!-- Main Image -->
        <div id="mainPhotoContainer" class="mb-4">
            <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photos[0]['photo_url'] ?>" class="img-fluid rounded shadow"
                alt="Main Photo" style="height: 400px; object-fit: cover; width: 100%;">
        </div>

        <!-- Thumbnails (Horizontal Scrolling) -->
        <div id="photoGallery" class="d-flex overflow-auto gap-2">
            <?php foreach ($photos as $index => $photo) { ?>
                <img src="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>"
                    class="clickable-photo rounded shadow <?= $index === 0 ? 'active-thumbnail' : '' ?>"
                    data-photo-url="<?= $baseUrl ?>/assets/img/houses/<?= $photo['photo_url'] ?>"
                    style="height: 80px; cursor: pointer;">
            <?php } ?>
        </div>
    </div>
</div>