<?php
if (isset($_COOKIE['email']) && isset($_COOKIE['login'])) {
    $changes = json_decode(file_get_contents('php://input'), true);

    if (!empty($changes)) {
        // Read the HTML file
        $html = file_get_contents('index.html');

        // Update the content or attribute within the element with the corresponding ID
        foreach ($changes as $id => $change) {
            $attribute = $change['attribute'];
            $value = $change['value'];

            if ($attribute == 'innerHTML') {
                $pattern = '/(<[^>]*id="' . $id . '"[^>]*>)(.*?)(<\/[^>]*>)/si';
                $replacement = '$1' . $value . '$3';
            } else {
                $pattern = '/(<[^>]*id="' . $id . '"[^>]*)(\s' . $attribute . '="[^"]*")?([^>]*>)/si';
                $replacement = '$1 ' . $attribute . '="' . $value . '" $3';
            }
            $html = preg_replace($pattern, $replacement, $html);
        }

        // Save the updated HTML back to the file
        file_put_contents('index.html', $html);
    }
} else {
    echo 'Unauthorized access';
}
