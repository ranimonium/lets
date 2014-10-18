<div id="main-content">

    <div class="segment">
        <div class="greeting">
            FAVORS
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Worth</th>
                    <th>Description</th>
                    <th>Quantity</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favors as $f) { ?>
                    <tr>
                        <td><?php echo $f->name ?></td>
                        <td><?php echo $f->type ?></td>
                        <td><?php echo $f->worth ?></td>
                        <td><?php echo $f->description ?></td>
                        <td><?php echo $f->qty ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>