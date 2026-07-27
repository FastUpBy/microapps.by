<?php
declare(strict_types=1);

/**
 * CSRF Protection
 * 
 * Provides Cross-Site Request Forgery protection for forms and API endpoints.
 * Uses session-based tokens that are validated on each request.
 */
class CsrfProtection {
    private const TOKEN_NAME = 'csrf_token';
    private const TOKEN_LENGTH = 32;
    
    /**
     * Generate a new CSRF token
     * 
     * @return string
     */
    public static function generateToken(): string {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        $token = bin2hex(random_bytes(self::TOKEN_LENGTH));
        $_SESSION[self::TOKEN_NAME] = $token;
        
        return $token;
    }
    
    /**
     * Get current CSRF token (generates new one if doesn't exist)
     * 
     * @return string
     */
    public static function getToken(): string {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        if (empty($_SESSION[self::TOKEN_NAME])) {
            return self::generateToken();
        }
        
        return $_SESSION[self::TOKEN_NAME];
    }
    
    /**
     * Verify CSRF token from request
     * 
     * @param string|null $token Token to verify (if null, gets from $_POST or headers)
     * @return bool
     */
    public static function verifyToken(?string $token = null): bool {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        // Get expected token from session
        $expectedToken = $_SESSION[self::TOKEN_NAME] ?? '';
        
        if (empty($expectedToken)) {
            return false;
        }
        
        // Get token from parameter, POST, or headers
        if ($token === null) {
            $token = $_POST['csrf_token'] ?? 
                     $_SERVER['HTTP_X_CSRF_TOKEN'] ?? 
                     '';
        }
        
        if (empty($token)) {
            return false;
        }
        
        // Use hash_equals to prevent timing attacks
        return hash_equals($expectedToken, $token);
    }
    
    /**
     * Verify CSRF token or die with error
     * 
     * @param string|null $token
     * @return void
     */
    public static function verifyOrDie(?string $token = null): void {
        if (!self::verifyToken($token)) {
            http_response_code(403);
            header('Content-Type: application/json; charset=utf-8');
            echo json_encode([
                'ok' => false,
                'error' => 'csrf_token_invalid',
                'message' => 'CSRF token validation failed'
            ], JSON_UNESCAPED_UNICODE);
            exit;
        }
    }
    
    /**
     * Generate hidden input field with CSRF token
     * 
     * @return string
     */
    public static function inputField(): string {
        $token = self::getToken();
        return '<input type="hidden" name="csrf_token" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }
    
    /**
     * Generate meta tag with CSRF token (for JavaScript)
     * 
     * @return string
     */
    public static function metaTag(): string {
        $token = self::getToken();
        return '<meta name="csrf-token" content="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }
    
    /**
     * Regenerate token (e.g., after login)
     * 
     * @return string
     */
    public static function regenerateToken(): string {
        if (session_status() !== PHP_SESSION_ACTIVE) {
            session_start();
        }
        
        unset($_SESSION[self::TOKEN_NAME]);
        return self::generateToken();
    }
}
