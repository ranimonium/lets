<div id="main-content">

    <div class="segment">
        <div class="greeting">
            FAVORS
        </div>
        <div id="favor-filters" style="margin-left:2.5%">
            <a href="<?php echo site_url('favors') ?>">All</a>
            <a href="<?php echo site_url('favors/get/event') ?>">Event</a>
            <a href="<?php echo site_url('favors/get/service') ?>">Service</a>
            <a href="<?php echo site_url('favors/get/good') ?>">Good</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Owner</th>
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
                        <td><?php echo $f->owner ?></td>
                        <td><?php echo $f->type ?></td>
                        <td><?php echo $f->worth ?></td>
                        <td><?php echo $f->description ?></td>
                        <td><?php echo $f->qty ?></td>
                        <td><button>BUY</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>