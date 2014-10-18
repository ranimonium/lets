<div id="main-content">

    <div class="segment">
        <div class="greeting">
            MY FAVORS
        </div>
        <div id="favor-filters" style="margin-left:2.5%">
			<a href="<?php echo site_url('favors/my/') ?>">All</a>
            <a href="<?php echo site_url('favors/my/get/event') ?>">Event</a>
            <a href="<?php echo site_url('favors/my/get/service') ?>">Service</a>
            <a href="<?php echo site_url('favors/my/get/good') ?>">Good</a>
        </div>

        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Type</th>
                    <th>Worth</th>
                    <th>Quantity</th>
                    <th>User Requesting</th>
                    <th>Status</th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($favors as $f) { ?>
                    <tr>
                        <td><?php echo $f->name ?></td>
                        <td><?php echo $f->type ?></td>
                        <td><?php echo $f->worth ?></td>
                        <td><?php echo $f->qty ?></td>
                        <td><?php echo $f->requestor ?></td>
                        <td><?php echo $f->status ?></td>
                        <td><button>APPROVE</button></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>