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

    <a href="/main/create" class="btn btn-info pull-right" role="button">Create</a>

    <h3>Display All Record Table</h3>

    <table class="table">
        <thead>
        <tr>
            <th>Transport Mark</th>
            <th>Transport Type</th>
            <th>Number</th>
            <th>Class Auto</th>
            <th>Transport Body</th>
            <th>Transmission</th>
            <th>Color</th>
            <th>Amount</th>
            <th>Transport Price</th>
            <th>CRUD Action</th>
        </tr>
        </thead>
        <tbody>

        <?php
        /** @var $autos array */
        /** @var \models\Auto $auto */
        foreach ($autos as $auto) { ?>
            <tr>
                <td><?php echo $auto->getMark()->mark; ?></td>
                <td><?php echo $auto->type; ?></td>
                <td><?php echo $auto->number; ?></td>
                <td><?php echo $auto->class; ?></td>
                <td><?php echo $auto->body; ?></td>
                <td><?php echo $auto->transmission; ?></td>
                <td><?php echo $auto->getColor()->color; ?></td>
                <td><?php echo $auto->amount; ?></td>
                <td><?php echo $auto->getPrice()->price . "$"; ?></td>
                <td>
                    <a href="/main/edit?id=<?= $auto->getId(); ?>" class="btn btn-success" role="button">Edit</a>
                    <a href="/main/delete?id=<?= $auto->getId(); ?>" class="btn btn-danger" role="button">Delete</a>
                </td>
            </tr>

        <?php } ?>

        </tbody>
    </table>
</div>
</body>
</html>