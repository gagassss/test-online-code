<?php
$input_user_filtered = false;

if (isset($_POST['submit'])) {
    $input_user = $_POST['input'];
     
    $age = preg_replace('/[^0-9]/', '', $input_user);
    
    $age_index_position = strpos($input_user, $age[0]);

    $name = substr($input_user, 0, $age_index_position);
    
    $city = substr($input_user, $age_index_position + strlen($age));
    
    $invalid_text = [
        'Tahun',        
        'TH',
        'tahun',
        'TAHUN',
        'Th',
        'th'
    ];
    
    $city = str_replace($invalid_text, '', $city);
    $input_user_filtered = true;
}

?>

<form action="" method="post">
    text input : <input type="text" name="input" required>
    <button type="submit" name="submit">submit</button>
</form>

<?php if ($input_user_filtered) : ?>
    <table border="2" cellpadding="4" cellspacing="0">
        <tr>
            <th>Nama</th>
            <th>Usia</th>
            <th>Kota</th>
        </tr>
        <tr>
            <td><?= $name; ?></td>
            <td><?= $age; ?></td>
            <td><?= $city; ?></td>
        </tr>
    </table>
<?php endif; ?>




