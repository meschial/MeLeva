<?php

/**
 * @param string|null $param
 * @return string
 */
function site(string $param = null): string
{
    if ($param && !empty(SITE[$param])){
        return SITE[$param];
    }

    return SITE["root"];
}

/**
 * @param string $imageUrl
 * @return string
 */
function routeImage(string $imageUrl): string
{
    return "https://via.placeholder.com/900X900/00009C/FFFFFF/?text={$imageUrl}";
}


/**
 * @param string $path
 * @param bool $time
 * @return string
 */
function asset(string $path, $time = true): string
{
    $file = SITE["root"] . "/views/login/assets/{$path}";
    $fileOnDir = dirname(__DIR__, 1)."/views/login/assets/{$path}";
    if ($time && file_exists($fileOnDir)){
        $file .= "?time" . filemtime($fileOnDir);
    }
    return $file;
}

/**
 * @param string $path
 * @param bool $time
 * @return string
 */
function assetAdmin(string $path, $time = true): string
{
  $file = SITE["root"] . "/views/login/admin/{$path}";
  $fileOnDir = dirname(__DIR__, 1)."/views/login/admin/{$path}";
  if ($time && file_exists($fileOnDir)){
    $file .= "?time" . filemtime($fileOnDir);
  }
  return $file;
}

/**
 * @param string $message
 * @param string $type
 * @return string
 */
function message(string $message, string $type): string
{
  return "<div class=\"message {$type}\">{$message}</div>";
}

/**
 * @param string|null $type
 * @param string|null $message
 * @return string|null
 */
function flash(string $type = null, string $message = null): ?string
{
    if ($type && $message){
        $_SESSION["flash"] = [
          "type" => $type,
          "message" => $message
        ];
        return null;
    }
    if (!empty($_SESSION["flash"]) && $flash = $_SESSION["flash"]){
        unset($_SESSION["flash"]);
        return "<div class=\"message {$flash["type"]}\">{$flash["message"]}</div>";
    }

    return null;

}