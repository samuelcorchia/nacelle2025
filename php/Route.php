<?php
create a file named Route.php with the following content:

<?php
namespace App;
class Route
{
    public static function redirect($sUrl)
    {
        header("Location: " . $sUrl);
        exit();
    }

    public static function render($sView, $aData = [])
    {
        extract($aData);
        require_once __DIR__ . '/../views/' . $sView . '.php';
    }

    public static function notFound()
    {
        http_response_code(404);
        self::render('404');
    }

    public static function methodNotAllowed()
    {
        http_response_code(405);
        self::render('405');
    }

    public static function internalServerError()
    {
        http_response_code(500);
        self::render('500');
    }

    public static function forbidden()
    {
        http_response_code(403);
        self::render('403');
    }
    public static function badRequest()
    {
        http_response_code(400);
        self::render('400');
    }
    public static function unauthorized()
    {
        http_response_code(401);
        self::render('401');
    }
    public static function redirectWithMessage($sUrl, $sMessage)
    {
        $_SESSION['flash_message'] = $sMessage;
        self::redirect($sUrl);
    }
    public static function getFlashMessage()
    {
        if (isset($_SESSION['flash_message'])) {
            $sMessage = $_SESSION['flash_message'];
            unset($_SESSION['flash_message']);
            return $sMessage;
        }
        return null;
    }
    public static function jsonResponse($aData, $iStatusCode = 200)
    {
        http_response_code($iStatusCode);
        header('Content-Type: application/json');
        echo json_encode($aData);
        exit();
    }
    public static function redirectToRoute($sRouteName, $aParams = [])
    {
        // This is a placeholder. In a real application, you would look up the route by name and generate the URL.
        $sUrl = '/' . $sRouteName; // This is a simplification.
        if (!empty($aParams)) {
            $sUrl .= '?' . http_build_query($aParams);
        }
        self::redirect($sUrl);
    }
    public static function currentUrl()
    {
        $sProtocol = (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off' || $_SERVER['SERVER_PORT'] == 443) ? "https://" : "http://";
        return $sProtocol . $_SERVER['HTTP_HOST'] . $_SERVER['REQUEST_URI'];
    }
    public static function previousUrl()
    {
        return $_SERVER['HTTP_REFERER'] ?? '/';
    }
    public static function isAjax()
    {
        return !empty($_SERVER['HTTP_X_REQUESTED_WITH']) && strtolower($_SERVER['HTTP_X_REQUESTED_WITH']) === 'xmlhttprequest';
    }
    public static function isPost()
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }
    public static function isGet()
    {
        return $_SERVER['REQUEST_METHOD'] === 'GET';
    }
    public static function isPut()
    {
        return $_SERVER['REQUEST_METHOD'] === 'PUT';
    }
    public static function isDelete()
    {
        return $_SERVER['REQUEST_METHOD'] === 'DELETE';
    }
    public static function isPatch()
    {
        return $_SERVER['REQUEST_METHOD'] === 'PATCH';
    }
    public static function isOptions()
    {
        return $_SERVER['REQUEST_METHOD'] === 'OPTIONS';
    }
    public static function isHead()
    {
        return $_SERVER['REQUEST_METHOD'] === 'HEAD';
    }
    public static function isCli()
    {
        return php_sapi_name() === 'cli';
    }
    
}
