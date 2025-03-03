<?php
class Personne {
    private $db;

    public function __construct() {
        $this->db = Database::getInstance()->getConnection();
    }

    // Créer une nouvelle personne
    public function create($nom) {
        $stmt = $this->db->prepare("INSERT INTO personnes (nom) VALUES (?)");
        $stmt->bind_param("s", $nom);
        $stmt->execute();
        $stmt->close();
    }

    // Lire toutes les personnes
    public function read() {
        $result = $this->db->query("SELECT * FROM personnes");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    // Mettre à jour le nom d'une personne
    public function update($id, $nom) {
        $stmt = $this->db->prepare("UPDATE personnes SET nom = ? WHERE id = ?");
        $stmt->bind_param("si", $nom, $id);
        $stmt->execute();
        $stmt->close();
    }

    // Supprimer une personne
    public function delete($id) {
        $stmt = $this->db->prepare("DELETE FROM personnes WHERE id = ?");
        $stmt->bind_param("i", $id);
        $stmt->execute();
        $stmt->close();
    }
}
?>
