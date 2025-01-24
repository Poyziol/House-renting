$(document).ready(function () {
    const habitationId = $('#habitation_id').val();
    const arrivalDate = $('#arrivalDate');
    const departureDate = $('#departureDate');

    setDates();
    handlePics();
    handleReservation(habitationId);
});

function setDates() {
    const today = new Date();
    const tomorrow = new Date(today);
    tomorrow.setDate(today.getDate() + 1);

    // Format dates as yyyy-mm-dd
    const formatDate = (date) => date.toISOString().split('T')[0];

    // Set the values for the date inputs
    arrivalDate.val(formatDate(today));
    departureDate.val(formatDate(tomorrow));
}

function handlePics() {
    const mainPhoto = $('#mainPhotoContainer img');
    const thumbnails = $('#photoGallery .clickable-photo');

    // Update main photo when a thumbnail is clicked
    thumbnails.on('click', function () {
        const photoUrl = $(this).data('photo-url');

        mainPhoto.attr('src', photoUrl);
        thumbnails.removeClass('active-thumbnail');
        $(this).addClass('active-thumbnail');
    });
}

function handleReservation(habitationId) {
    $('#reservationForm').submit(function (event) {
        event.preventDefault();
        
        if (!arrivalDate || !departureDate) {
            $('#responseMessage').removeClass('d-none').text('Please select both arrival and departure dates.');
            $('#responseMessage').addClass('bg-grey');
            return;
        }

        console.log(`${habitationId}, ${arrivalDate}, ${departureDate}, ${baseUrl}`);

        $.ajax({
            url: `${baseUrl}/main/house/reservation`,
            type: 'POST',
            data: {
                habitationId: habitationId,
                arrivalDate: arrivalDate,
                departureDate: departureDate
            },
            success: function (response) {
                const data = response;
                if (data.success) {
                    // Success message
                    $('#responseMessage').removeClass('d-none').text(data.message);
                    $('#responseMessage').addClass('bg-success');
                } else {
                    // Error message
                    $('#responseMessage').removeClass('d-none').text(data.message);
                    $('#responseMessage').addClass('bg-danger');
                }
            },
            error: function (xhr, status, error) {
                // Handle error in case the AJAX request fails
                const errorMessage = xhr.responseJSON ? xhr.responseJSON.message : 'An error occurred, please try again later.';
                $('#responseMessage').removeClass('d-none').text(errorMessage);
                $('#responseMessage').addClass('bg-danger');
            }
        });
    });
}

/* VANILLA JS */

/*
document.addEventListener("DOMContentLoaded", () => {
    const mainPhoto = document.querySelector("#mainPhotoContainer img");
    const thumbnails = document.querySelectorAll("#photoGallery .clickable-photo");
    const reservationForm = document.querySelector("#reservationForm");
    const errorMessage = document.querySelector("#errorMessage");

    // Update main photo when a thumbnail is clicked
    thumbnails.forEach((thumbnail) => {
        thumbnail.addEventListener("click", () => {
            const photoUrl = thumbnail.dataset.photoUrl;

            // Update the main photo
            mainPhoto.src = photoUrl;

            // Remove active-thumbnail class from all thumbnails
            thumbnails.forEach((thumb) => thumb.classList.remove("active-thumbnail"));

            // Add active-thumbnail class to the clicked thumbnail
            thumbnail.classList.add("active-thumbnail");
        });
    });

    // Handle form submission
    reservationForm.addEventListener("submit", (e) => {
        const arrivalDate = document.querySelector("#arrivalDate").value;
        const departureDate = document.querySelector("#departureDate").value;

        if (!checkAvailability(arrivalDate, departureDate)) {
            e.preventDefault();
            errorMessage.classList.remove("d-none");
            errorMessage.textContent = "L'habitation n'est pas disponible pour les dates sélectionnées.";
        }
    });

    // Dummy availability check
    function checkAvailability(arrivalDate, departureDate) {
        // Add logic to verify availability (e.g., fetch data from the server)
        return true; // Assume available for now
    }
});

*/