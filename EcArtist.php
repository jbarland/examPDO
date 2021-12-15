<?php

class EcArtist extends EcAbstractConnectToDb
{
    public function selectAllSortByName(): array{
        $query = 'SELECT * FROM artist ORDER BY `name` DESC ';
        $resultats = $this->getPdo()->query($query);
        return $resultats->fetchAll(PDO::FETCH_ASSOC);
    }

    public function selectOneArtist(int $id): array
    {
        $query = 'SELECT * FROM artist WHERE id= :idArtist';
        $resultats = $this->getPdo()->prepare($query);
        $resultats->execute([
            ':idArtist' => $id,
        ]);

        return $resultats->fetch(PDO::FETCH_ASSOC);
    }

    public function insertArtist(string $name, int $age = null)
    {
        $pdo = $this->getPdo();
        $query = 'INSERT INTO artist(name, age) VALUES (:name, :age)';
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':name' => $name,
            ':age' => $age,
        ]);
    }

    public function updateArtist(string $id, string $name, int $age = null)
    {
        $pdo = $this->getPdo();
        $query = "UPDATE artist SET name = :name, type = :age WHERE id= :idArtist";
        $resultats = $pdo->prepare($query);
        $resultats->execute([
            ':idArtist' => $id,
            ':name' => $name,
            ':age' => $age,
        ]);
    }


}