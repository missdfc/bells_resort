<?php
class Student {
    private $db;

    public function __construct($pdo) {
        $this->db = $pdo;
    }

    public function getProfile($student_id) {
        $stmt = $this->db->prepare("
            SELECT s.*, d.department_name 
            FROM students s 
            LEFT JOIN departments d ON s.department_id = d.id 
            WHERE s.student_id = ?
        ");
        $stmt->execute([$student_id]);
        return $stmt->fetch();
    }

    public function updateBioInfo($student_id, $phone, $bio) {
        $stmt = $this->db->prepare("UPDATE students SET phone = ?, bio = ? WHERE student_id = ?");
        return $stmt->execute([$phone, $bio, $student_id]);
    }

    public function getCourses($student_id) {
        $stmt = $this->db->prepare("
            SELECT c.course_code, c.course_name, c.credits 
            FROM courses c
            JOIN results r ON c.course_code = r.course_code
            WHERE r.student_id = ?
        ");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll();
    }

    public function getResults($student_id) {
        $stmt = $this->db->prepare("
            SELECT r.course_code, c.course_name, c.credits, r.score, r.grade, r.semester 
            FROM results r 
            JOIN courses c ON r.course_code = c.course_code 
            WHERE r.student_id = ?
        ");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll();
    }

    public function getFees($student_id) {
        $stmt = $this->db->prepare("SELECT * FROM fees WHERE student_id = ?");
        $stmt->execute([$student_id]);
        return $stmt->fetchAll();
    }
}