<?php
/**
 * @var $auto \models\Auto
 */
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <title>Rent Car</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="/bootstrap/css/bootstrap.css">
    <script src="/js/jquery.js"></script>
    <script src="/bootstrap/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container bg-primary" style="padding-top: 20px; padding-bottom: 20px;">

    <a href="/" class="btn btn-info pull-right" role="button">Back</a>

    <h3>Create</h3>

    <div class="row">
        <div class="col-sm-4">

            <form role="form" action="/main/create" method="post">

                <div class="form-group">
                    <label>Transport Mark</label>
                    <input type="text" name="mark_id" value="<?= $auto->getMark()->mark; ?>" class="form-control">
                    <?php  if ($massage = $validator->getError('mark_id')) {
                        echo '<div class="error-message"><font color="#FFA07A">' . $massage . '</font></div>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Transport Type</label>
                    <select name="type" class="form-control">
                        <?php foreach ($types as $type => $name) { ?>
                            <option value="<?= $type; ?>" <?php if (isset($_POST['type']) && $_POST['type'] == $type) {
                                echo 'selected';
                            } ?>>
                                <?= $name; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <?php if (isset($err['type'])) {
                        echo $err['type'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Number</label>
                    <input type="text" name="number" value="<?= $auto->number; ?>" class="form-control">
                    <?php if ($massage = $validator->getError('number')) {
                        echo '<div class="error-message"><font color="#FFA07A">' . $massage . '</font></div>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Class</label>
                    <select name="class" class="form-control">
                        <?php foreach ($classes as $class) { ?>
                            <option value="<?= $class; ?>" <?php if (isset($_POST['class']) && $_POST['class'] == '-') {
                                echo 'selected';
                            } ?>>
                                <?= $class; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <?php if (isset($err['class'])) {
                        echo $err['class'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Body</label>
                    <select name="body" class="form-control">
                        <?php foreach ($bodys as $body) { ?>
                            <option value="<?= $body; ?>" <?php if (isset($_POST['body']) && $_POST['body'] == 'Sedan') {
                                echo 'selected';
                            } ?>>
                                <?= $body; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <?php if (isset($err['body'])) {
                        echo $err['body'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Transmission</label>
                    <select name="transmission" class="form-control">
                        <?php foreach ($transmissions as $transmission) { ?>
                            <option value="<?= $transmission; ?>" <?php if (isset($_POST['transmission']) && $_POST['transmission'] == 'mechanic') {
                                echo 'selected';
                            } ?>>
                                <?= $transmission; ?>
                            </option>
                        <?php } ?>
                    </select>
                    <?php if (isset($err['transmission'])) {
                        echo $err['transmission'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Color</label>
                    <select name="color_id" value="<?php echo isset($_POST['color_id']) ? $_POST['color_id'] : '' ?>"
                            class="form-control">
                        <?php
                        /** @var \models\Color $color */
                        foreach ($colors as $color) {
                            $selected = (isset($_POST['color_id']) && $_POST['color_id'] == $color->id) ? 'selected' : '';
                            echo "<option value='{$color->id}' {$selected}>{$color->color}</option>";
                        }
                        ?>
                    </select>
                    <?php if (isset($err['color_id'])) {
                        echo $err['color_id'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Amount</label>
                    <input type="text" name="amount" value="<?= $auto->amount; ?>" class="form-control">
                    <?php if ($massage = $validator->getError('amount')) {
                        echo '<div class="error-message"><font color="#FFA07A">' . $massage . '</font></div>';
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Transport Price</label>
                    <input type="text" name="price_id" value="<?= $auto->getPrice()->price; ?>" class="form-control">
                    <?php if ($massage = $validator->getError('price_id')) {
                        echo '<div class="error-message"><font color="#FFA07A">' . $massage . '</font></div>';
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-success btn-block">Add transport</button>
            </form>
            <div class="col-sm-8">
            </div>

        </div>
    </div>
</div>

</body>
</html>