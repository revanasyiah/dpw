<?php
// ================================================
// FILE: Database.php
// Kelas OOP untuk menangani koneksi dan query
// ke database MySQL menggunakan Prepared Statements
// Modul Praktikum 12 – PHP Database OOP
// ================================================

class Database {
    // ── Properties ──────────────────────────────
    private string $host;
    private string $user;
    private string $pass;
    private string $dbname;
    private mysqli $conn;

    // ── Constructor – membangun koneksi ─────────
    public function __construct(
        string $host   = "localhost",
        string $user   = "root",
        string $pass   = "",
        string $dbname = "db_kampus"
    ) {
        $this->host   = $host;
        $this->user   = $user;
        $this->pass   = $pass;
        $this->dbname = $dbname;

        $this->connect();
    }

    // ── Membuat koneksi ──────────────────────────
    private function connect(): void {
        $this->conn = new mysqli(
            $this->host,
            $this->user,
            $this->pass,
            $this->dbname
        );

        if ($this->conn->connect_error) {
            die("<div class='alert alert-danger'>❌ Koneksi gagal: "
                . htmlspecialchars($this->conn->connect_error)
                . "</div>");
        }

        $this->conn->set_charset("utf8mb4");
    }

    // ── Getter koneksi (untuk dipakai di luar) ───
    public function getConn(): mysqli {
        return $this->conn;
    }

    // ── Prepared SELECT – mengembalikan array baris ──
    // $types : "i" integer, "s" string, "d" double, "b" blob
    public function select(string $sql, string $types = "", array $params = []): array {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("<div class='alert alert-danger'>❌ Prepare error: "
                . htmlspecialchars($this->conn->error) . "</div>");
        }

        if ($types !== "" && count($params) > 0) {
            $stmt->bind_param($types, ...$params);
        }

        $stmt->execute();
        $result = $stmt->get_result();
        $rows   = [];
        while ($row = $result->fetch_assoc()) {
            $rows[] = $row;
        }
        $stmt->close();
        return $rows;
    }

    // ── Prepared SELECT – mengembalikan satu baris ──
    public function selectOne(string $sql, string $types = "", array $params = []): ?array {
        $rows = $this->select($sql, $types, $params);
        return $rows[0] ?? null;
    }

    // ── Prepared INSERT / UPDATE / DELETE ────────
    public function execute(string $sql, string $types = "", array $params = []): bool {
        $stmt = $this->conn->prepare($sql);
        if (!$stmt) {
            die("<div class='alert alert-danger'>❌ Prepare error: "
                . htmlspecialchars($this->conn->error) . "</div>");
        }

        if ($types !== "" && count($params) > 0) {
            $stmt->bind_param($types, ...$params);
        }

        $result = $stmt->execute();
        $stmt->close();
        return $result;
    }

    // ── Hitung jumlah baris ──────────────────────
    public function count(string $table): int {
        $row = $this->selectOne("SELECT COUNT(*) AS total FROM `$table`");
        return (int)($row['total'] ?? 0);
    }

    // ── Menutup koneksi ──────────────────────────
    public function close(): void {
        $this->conn->close();
    }

    // ── Destructor – tutup koneksi otomatis ──────
    public function __destruct() {
        if (isset($this->conn)) {
            $this->conn->close();
        }
    }
}
?>
