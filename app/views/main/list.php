<div class="row">
    <?php foreach ($houses as $house) { ?>
        <div class="col-md-4">
            <div class="card">
                <a href="<?= $baseUrl ?>/main/house/<?= $house['habitation_id'] ?>">
                    <img src="<?= $baseUrl ?>/assets/img/houses/<?= $house['photo_url'] ?>" 
                         class="card-img-top" 
                         alt="House Photo">
                </a>
                <div class="card-body">
                    <h5 class="card-title"><?= $house['nom_type'] ?></h5>
                    <p class="card-text"><?= $house['description'] ?></p>
                    <p class="card-text">
                        <strong data-translate="bedrooms">Rooms</strong>: <?= $house['chambres'] ?>
                    </p>
                    <p class="card-text">
                        <strong data-translate="rent_per_day">Rent per day</strong>: <?= $house['loyer_par_jour'] ?> €
                    </p>
                    <p class="card-text">
                        <strong data-translate="neighborhood">Neighborhood</strong>: <?= $house['quartier'] ?>
                    </p>
                </div>
            </div>
        </div>
    <?php } ?>
</div>