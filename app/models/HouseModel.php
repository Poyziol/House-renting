<?php

namespace app\Models;

use PDO;

class HouseModel
{
    protected $db;

    public function __construct(PDO $db)
    {
        $this->db = $db;
    }

    public function getHouses()
    {
        $query = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($query);
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    public function getHouseById($id)
    {
        $query = "
            SELECT h.habitation_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            WHERE h.habitation_id = ?
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($query);
        $STH->execute([$id]);
        return $STH->fetch(PDO::FETCH_ASSOC);
    }


    public function getPhotosByHouseId($houseId)
    {
        $query = "SELECT * FROM house_photo_habitation WHERE habitation_id = ?";
        $STH = $this->db->prepare($query);
        $STH->execute([$houseId]);
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    // Get all houses with their main photo
    public function getHousesWithPhotos()
    {
        $query = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description, MIN(p.photo_url) AS photo_url
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            LEFT JOIN house_photo_habitation p ON h.habitation_id = p.habitation_id
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($query);
        $STH->execute();
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    // Search houses by query
    public function searchHouses($query)
    {
        $query = "%$query%";
        $sql = "
            SELECT h.habitation_id, h.type_id, t.nom_type, h.chambres, h.loyer_par_jour, h.quartier, h.description, MIN(p.photo_url) AS photo_url
            FROM house_habitation h
            JOIN house_type_habitation t ON h.type_id = t.type_id
            LEFT JOIN house_photo_habitation p ON h.habitation_id = p.habitation_id
            WHERE h.description LIKE ? OR h.quartier LIKE ? OR t.nom_type LIKE ?
            GROUP BY h.habitation_id
        ";
        $STH = $this->db->prepare($sql);
        $STH->execute([$query, $query, $query]);
        return $STH->fetchAll(PDO::FETCH_ASSOC);
    }

    public function isHouseAvailable($houseId, $arrivalDate, $departureDate)
    {
        /**
         * Checking if the requested reservation overlaps with any existing reservation
         * with status not equal to -1 (rejected).
         * Reservation is considered unavailable if:
         * 1. The requested arrivalDate is within an existing reservation's range.
         * 2. The requested departureDate is within an existing reservation's range.
         * 3. The existing reservation is waiting or accepted.
         */
        $query = "
            SELECT COUNT(*) AS COUNT
            FROM house_reservation
            WHERE habitation_id = ?
            AND status_id != -1
            AND (
                (date_debut <= ? AND date_fin >= ?)  
                OR
                (date_debut <= ? AND date_fin >= ?)
                OR
                (date_debut >= ? AND date_fin <= ?)
            );
        ";

        $STH = $this->db->prepare($query);
        $STH->execute([$houseId, 
        $arrivalDate, $arrivalDate, // reservation starts before or on the requested arrival and ends after or on the requested arrival 
        $departureDate, $departureDate, // reservation starts before or on the requested departure and ends after or on the requested departure
        $arrivalDate, $departureDate]); // reservation fully contains the requested date range

        $result = $STH->fetch(PDO::FETCH_ASSOC);


        return $result['COUNT'] == 0; // no reservation
    }

}
