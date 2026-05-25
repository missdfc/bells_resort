<?php
class Admin {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    // === STUDENT TABLES CRUD ===
    public function getAllStudents() {
        $stmt = $this->db->query("
            SELECT s.*, d.department_name 
            FROM students s 
            LEFT JOIN departments d ON s.department_id = d.id 
            ORDER BY s.student_id ASC
        ");
        return $stmt->fetchAll();
    }

    public function addStudent($student_id, $raw_password, $full_name, $email, $level) {
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            INSERT INTO students (student_id, password, full_name, email, level) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$student_id, $hashed_password, $full_name, $email, $level]);
    }

    public function updateStudent($student_id, $full_name, $email, $level, $phone, $bio) {
        $stmt = $this->db->prepare("
            UPDATE students 
            SET full_name = ?, email = ?, level = ?, phone = ?, bio = ? 
            WHERE student_id = ?
        ");
        return $stmt->execute([$full_name, $email, $level, $phone, $bio, $student_id]);
    }

    public function deleteStudent($student_id) {
        $stmt = $this->db->prepare("DELETE FROM students WHERE student_id = ?");
        return $stmt->execute([$student_id]);
    }

    // === STAFF TABLES CRUD ===
    public function getAllStaff() {
        $stmt = $this->db->query("
            SELECT s.*, d.department_name 
            FROM staff s
            LEFT JOIN departments d ON s.department_id = d.id
            ORDER BY s.staff_id ASC
        ");
        return $stmt->fetchAll();
    }

    public function addStaff($staff_id, $raw_password, $full_name, $email, $role) {
        $hashed_password = password_hash($raw_password, PASSWORD_DEFAULT);
        $stmt = $this->db->prepare("
            INSERT INTO staff (staff_id, password, full_name, email, role) 
            VALUES (?, ?, ?, ?, ?)
        ");
        return $stmt->execute([$staff_id, $hashed_password, $full_name, $email, $role]);
    }

    public function updateStaff($staff_id, $full_name, $email, $role) {
        $stmt = $this->db->prepare("
            UPDATE staff 
            SET full_name = ?, email = ?, role = ? 
            WHERE staff_id = ?
        ");
        return $stmt->execute([$full_name, $email, $role, $staff_id]);
    }

    public function deleteStaff($staff_id) {
        $stmt = $this->db->prepare("DELETE FROM staff WHERE staff_id = ?");
        return $stmt->execute([$staff_id]);
    }
}