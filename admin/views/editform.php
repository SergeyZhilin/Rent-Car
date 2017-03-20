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

<div class="container bg-info" style="padding-top: 20px; padding-bottom: 20px;">

    <a href="/main/admin" class="btn btn-info pull-right" role="button">Back</a>

    <h3>Edit</h3>

    <div class="row">
        <div class="col-sm-4">

            <form role="form" action="/main/edit?id=<?= $auto->getId(); ?>" method="post">

                <div class="form-group">
                    <label>Transport Mark</label>
                    <input type="text" name="mark_id" value="<?= $auto->getMark()->mark; ?>" class="form-control">
                    <?php if (isset($err['atitle'])) {
                        echo '<div class="error-message">' . $err['atitle'] . '</div>';
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Transport Type</label>
                    <select name="type" class="form-control">
                        <?php foreach ($types as $type => $name) { ?>
                            <option value="<?= $name; ?>" <?php if ($auto->type == $name) { echo 'selected'; } ?>>
                                <?= $name ?>
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
                    <?php if (isset($err['number'])) {
                        echo $err['number'];
                    }
                    ?>
                </div>

                <div class="form-group">
                    <label>Class</label>
                    <select name="class" class="form-control">
                        <?php foreach ($classes as $class) { ?>
                            <option value="<?= $class ?>" <?php if ($auto->class == $class) { echo 'selected'; } ?>>
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
                            <option value="<?= $body ?>" <?php if ($auto->body == $body) { echo 'selected'; } ?>>
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
                            <option value="<?= $transmission; ?>" <?php if ($auto->transmission == $transmission) { echo 'selected'; } ?>>
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
                    <select name="color_id" class="form-control">
                        <?php
                        /** @var \models\Color $color */
                        foreach ($colors as $color) {
                            $selected = $auto->getColor()->id == $color->id ? 'selected' : '';
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
                    <?php if (isset($err['amount'])) {
                        echo $err['amount'];
                    }
                    ?>
                </div>
                <div class="form-group">
                    <label>Transport Price</label>
                    <input type="text" name="price_id" value="<?= $auto->getPrice()->price ?>" class="form-control">
                    <?php if (isset($err['aprice'])) {
                        echo $err['aprice'];
                    }
                    ?>
                </div>
                <button type="submit" class="btn btn-info btn-block">Edit transport</button>
            </form>
            <div class="col-sm-8">
            </div>

        </div>
    </div>
</div>

</body>
</html>