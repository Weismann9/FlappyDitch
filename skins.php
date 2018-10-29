<?php

require_once 'src/project_init.php';

if (isset($_POST['skin-btn'])) {
    $userId = $_SESSION['id'];
    $skin = $_POST['skin'];
    $query = "UPDATE User SET skin='$skin' WHERE id='$userId'";
    $result = mysqli_query($db, $query) or die (mysqli_connect_errno() . " Writing error: UserId - $userId, Skin file - $skin.");
}

?>

<head>
    <?= RenderHead() ?>
    <!--  Show Video Explicitly ( Uses jQuery, load after vendors )  -->
    <script rel="script" type="text/javascript" src="<?= VENDORS_ROOT . 'jquery.backgroundvideo.min.js' ?>"></script>
    <script rel="script" type="text/javascript" src="<?= ASSETS_ROOT . 'background_video_settings.js' ?>"></script>
</head>
<body style="background-color: #818182">
<header>
    <a href="index.php" style="font-family: Lobster"><?= APP_NAME ?></a>
</header>
<table class="container col-4 table table-bordered table-hover table-responsive-sm" id="skins_table"
       style="font-family: Lobster; font-size: 120%">
    <tr>
        <th>Skin</th>
        <th>Preview</th>
    </tr>
    <?php
    $characters = array_splice(scandir($_SERVER['DOCUMENT_ROOT'] . CHARACTERS_ROOT), 2);
    foreach ($characters as $character):?>
        <tr>
            <td><?= ucfirst(basename($character, '.png')) ?></td>
            <td class="char-preview"
                style="background: url('<?= CHARACTERS_ROOT . $character ?>'); background-size: cover;"
                title="<?= $character ?>"></td>
        </tr>
    <?php endforeach; ?>
</table>


<form method="post" class="container col-4">
    <select class="form-control btn-block" id="skin-selector" name="skin">
        <?php foreach ($characters as $character): ?>
            <option value="<?= basename($character, '.png') ?>"><?= ucfirst(basename($character, '.png')) ?></option>
        <?php endforeach; ?>
    </select>
    <input style="font-family: Lobster" name="skin-btn" type="submit" class="btn-block btn btn-success"
           value="Set character">
</form>
</body>

<?php
$id = $_SESSION['id'];
$query = "SELECT skin FROM User WHERE id='$id'";
$result = mysqli_query($db, $query);
$currentSkin = mysqli_fetch_array($result, MYSQLI_ASSOC)['skin'];
?>
<script>
    let selectedTd;
    let table = document.getElementById('skins_table');
    let selector = document.getElementById('skin-selector');
    selector.options.selectedIndex = <?= array_search($currentSkin . '.png', $characters) ?>;
    highlight(table.rows[selector.options.selectedIndex + 1].cells[0]);
    table.onclick = function (event) {
        let target = event.target;
        let row = event.target;
        if (target.tagName !== 'TD') return;
        selector.options.selectedIndex = target.parentNode.rowIndex - 1;
        highlight(target);
    };
    selector.onchange = function (event) {
        highlight(table.rows[selector.options.selectedIndex + 1].cells[0]);

    };

    function highlight(node) {
        if (selectedTd) {
            selectedTd.classList.remove('highlight');
        }
        selectedTd = node;
        selectedTd.classList.add('highlight');
    }


</script>
