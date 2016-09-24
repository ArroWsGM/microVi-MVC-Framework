<?php

if (! function_exists('flash_get')) {
    /**
     * Get flash message from session
     *
     * Note: Adapted from plasticbrain/PhpFlashMessages
     * @see https://github.com/plasticbrain/PhpFlashMessages
     *
     * @param  string $name
     * @return bool|array
     */
    function flash_get($name)
    {   
        if(!$name) return false;
        if(!isset($_SESSION['flash_messages'])) return false;
        
        $flash = false;
        
        if(array_key_exists($name, $_SESSION['flash_messages'])){
            $flash = $_SESSION['flash_messages'][$name];
            unset($_SESSION['flash_messages'][$name]);
        }
        
        return $flash;
    }
}

if (! function_exists('flash_get_all')) {
    /**
     * Get all flash messages from session
     *
     * Note: Adapted from plasticbrain/PhpFlashMessages
     * @see https://github.com/plasticbrain/PhpFlashMessages
     *
     * @return bool|array
     */
    function flash_get_all()
    {
        if(!isset($_SESSION['flash_messages'])) return false;
        
        $flash = false;
        
        if(array_key_exists('flash_messages', $_SESSION) && !empty($_SESSION['flash_messages'])){
            $flash = $_SESSION['flash_messages'];
            
            foreach($_SESSION['flash_messages'] as $key=>$val)
                unset($_SESSION['flash_messages'][$key]);
        }
        
        return $flash;
    }
}

if (! function_exists('flash_redirect')) {
    /**
     * Redirect the user if a URL was given
     *
     * Note: Adapted from plasticbrain/PhpFlashMessages
     * @see https://github.com/plasticbrain/PhpFlashMessages
     * 
     * @return bool|void
     * 
     */
    function flash_redirect($path)
    {
        if(!$path) return false;
        
        header('Location: ' . $path);
        exit();
    }
}

if (! function_exists('flash_set')) {
    /**
     * Add a flash message to the session data
     *
     * Note: Adapted from plasticbrain/PhpFlashMessages
     * @see https://github.com/plasticbrain/PhpFlashMessages
     *
     * @param  string $name
     * @param  string $message
     * @param  string $status
     * @param  string $redirect
     * 
     * @return bool|void
     */
    function flash_set($name, $message = '', $status = 'info', $redirect = null)
    {   
        if(!$name) return false;
        // Create session array to hold our messages if it doesn't already exist
        if (!array_key_exists('flash_messages', $_SESSION)) $_SESSION['flash_messages'] = [];
        
        $_SESSION['flash_messages'][$name] = ['status' => $status, 'message' => $message];
        
        // Handle the redirect if needed
        if (!is_null($redirect))
            flash_redirect(filter_var($redirect, FILTER_VALIDATE_URL, FILTER_FLAG_PATH_REQUIRED));
    }
}