<?php

require_once 'php/db_connection.php';

if (isset($_POST['skin-btn'])) {
    $userId = $_SESSION['id'];
    $skin = $_POST['skin'];
    $query = "UPDATE User SET skin='$skin' WHERE id='$userId'";
    $result = mysqli_query($db, $query) or die (mysqli_connect_errno() . " Writing error: UserId - $userId, Skin file - $skin.");
}

?>

<head>
    <title><?= APP_NAME ?></title>
    <link rel="stylesheet" href="main.css">
    <!-- Bootstrap -->
    <link rel="stylesheet" href="/vendor/bootstrap.min.css">
    <script src="/vendor/jquery-3.3.1.slim.min.js"></script>
    <script src="/vendor/popper.min.js"></script>
    <script src="/vendor/bootstrap.min.js"></script>
</head>
<body>
<header>
    <a href="index.php">Menu</a>
</header>
<table>
    <tr>
        <th>Skin</th>
        <th>Preview</th>
    </tr>
    <?php
    $characters = array_splice(scandir($_SERVER['DOCUMENT_ROOT'] . '/assets/characters'), 2);
    foreach ($characters as $character):?>
        <tr>
            <td><?= ucfirst(basename($character, '.png')) ?></td>
            <td class="char-preview"
                style="background: url('/assets/characters/<?= $character ?>'); background-size: cover;"
                title="<?= $character ?>"></td>
        </tr>
    <?php endforeach; ?>
</table>

<form method="post">
    <select id="skin-selector" name="skin">
        <?php foreach ($characters as $character): ?>
            <option value="<?= basename($character, '.png') ?>"><?= ucfirst(basename($character, '.png')) ?></option>
        <?php endforeach; ?>
    </select>
    <input name="skin-btn" type="submit" class="btn btn-success">
</form>
</body>

<?php
$id = $_SESSION['id'];
$query = "SELECT skin FROM User WHERE id='$id'";
$result = mysqli_query($db, $query);
$currentSkin = mysqli_fetch_array($result, MYSQLI_ASSOC)['skin'];
?>
<script>
    let selector = document.getElementById('skin-selector');
    selector.options.selectedIndex = <?= array_search($currentSkin . '.png', $characters) ?>;
</script>
