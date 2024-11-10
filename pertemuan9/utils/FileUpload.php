<?php 

class FileUpload {
    private $uploadDir = 'uploads/';
    
    public function __construct() {
        if (!file_exists($this->uploadDir)) {
            mkdir($this->uploadDir, 0777, true);
        }
    }
    
    public function upload($file, $allowedTypes = ['pdf', 'doc', 'docx']) {
        $fileName = basename($file['name']);
        $targetPath = $this->uploadDir . $fileName;
        $fileType = strtolower(pathinfo($targetPath, PATHINFO_EXTENSION));
        
        // Validate file type
        if (!in_array($fileType, $allowedTypes)) {
            throw new Exception('File type not allowed');
        }
        
        // Move file to uploads directory
        if (move_uploaded_file($file['tmp_name'], $targetPath)) {
            return $targetPath;
        }
        
        throw new Exception('Failed to upload file');
    }
    
    public function delete($filePath) {
        if (file_exists($filePath)) {
            unlink($filePath);
        }
    }
}